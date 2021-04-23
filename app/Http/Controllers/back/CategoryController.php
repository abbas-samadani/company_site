<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','DESC')->get();
        return view('back.categories.categories' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Category $category)
    {

        $category->name = $request->title;
        $category->slug = $request->slug;

        $category->save();
        $msg = 'دسته بندی با موفقیت اضافه انجام شد';
        return redirect('admin/categories')->with('success' ,$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('back.categories.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $messages= [
            'name.required' => 'فیلد نام را وارد کنید',
            'slug.unique' => 'فیلد اسم مستعار نباید تکراری باشد ',
            'slug.required' => 'فیلد اسم مستعار را وارد کنید',
        ];

        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories',
        ], $messages);


        $category->name = $request->title;
        $category->slug = $request->slug;


        try {
            $category->save();
        } catch (Exception $exception) {
            switch ($exception->getCode()) {
                case 23000:
                    $msg = "عنوان وارد شده تکراری است";
                    break;
            }
            return redirect()->back()->with('warning' , $exception->getCode());
        };
        $msg = 'ویرایش با موفقیت انجام شد';
        return redirect('admin/categories')->with('success' ,$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $msg = 'دسته بندی با موفقیت حذف گردید';
        return redirect('admin/categories')->with('success' ,$msg);
    }
}
