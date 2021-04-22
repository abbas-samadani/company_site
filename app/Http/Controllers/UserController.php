<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        $pageTitle = 'پنل کاربری';
        return view('front.auth.profile', compact('pageTitle','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $messages= [
            'name.required' => 'فیلد نام را وارد کنید',
            'email.required' => 'فیلد ایمیل را وارد کنید',
            'phone.required' => 'فیلد تلفن همراه را وارد کنید'
        ];
        if(!empty($request->password)){
            $validateData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'password' => 'min:8',
                'password_confirmation' => 'min:8'
            ],$messages);
            $password = Hash::make($request->password);
            $user->password = $password;
        }else{
            $validateData = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',

            ],$messages);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        try {
            $user->save();
        } catch (Exception $exception) {
            switch ($exception->getCode()) {}
            return redirect()->back()->with('warning' , $exception->getCode());
        };
        $msg = 'ویرایش با موفقیت انجام شد';
        return redirect(route('main'))->with('success' ,$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
