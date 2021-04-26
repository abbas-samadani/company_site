<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Exception;
//use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id','DESC')->get();
        return view('back.articles.articles' , compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name' , 'id');
        return view('back.articles.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages= [
            'name.required' => 'فیلد نام را وارد کنید',
            'slug.unique' => 'فیلد اسم مستعار نباید تکراری باشد ',
            'slug.required' => 'فیلد اسم مستعار را وارد کنید',
        ];

        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:articles',
        ], $messages);

        $article = new Article();

        try {
            $article = $article->create($request->all());
            //dd($article);
            $article->categories()->attach($request->categories);
        } catch (Exception $exception) {
            switch ($exception->getMessage()) {
                case 23000:
                    $msg = "عنوان وارد شده تکراری است";
                    break;
            }
            return redirect()->back()->with('warning' , $exception->getMessage());
        };
        $msg = ' مطلب جدید با موفقیت اضافه شد';
        return redirect('admin/articles')->with('success' ,$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::all()->pluck('name' , 'id');
        return view('back.articles.edit' , compact('article' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $messages= [
            'name.required' => 'فیلد نام را وارد کنید',
            'slug.unique' => 'فیلد اسم مستعار نباید تکراری باشد ',
            'slug.required' => 'فیلد اسم مستعار را وارد کنید',
        ];

        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:articles',
        ], $messages);



        try {
            $article->update($request->all());
            $article->categories()->sync($request->categories);
        } catch (Exception $exception) {
            switch ($exception->getMessage()) {
                case 23000:
                    $msg = "عنوان وارد شده تکراری است";
                    break;
            }
            return redirect()->back()->with('warning' , $exception->getMessage());
        };
        $msg = ' ویرایش با موفقیت انجام گردید';
        return redirect('admin/articles')->with('success' ,$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        $msg = 'مطلب با موفقیت حذف گردید';
        return redirect('admin/articles')->with('success' ,$msg);
    }

    public function updateStatus(Article $article){
        if($article->status==0){
            $article->status=1;
        }else{
            $article->status=0;
        }
        $article->save();
        $msg = 'بروزرسانی با موفقیت انجام شد';
        return redirect('admin/articles')->with('success' ,$msg);
    }
}
