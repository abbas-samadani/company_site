@extends('back.index')

@section('title')
    پنل مدیریت-مدیریت کاربران
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">مدیریت کاربران</h4>
          </div>
        </div>

      </div>
      <!-- Page Title Header Ends-->
      @include('back.messages')
      <div class="d-flex justify-content-center">
        <form action="{{route('admin.profileupdate' , $user->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">نام و نام خانوادگی</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{$user->name}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">ایمیل</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{$user->email}}">
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">موبایل</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    value="{{$user->phone}}">
                @error('phone')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">رمز ورود</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">تکرار رمز ورود</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation">
                @error('password_confirmation')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="title"></label>
                <button type="submit" class="btn btn-success">ویرایش </button>
                <a href="{{ route('admin.users') }}" class="btn btn-warning">انصراف</a>
            </div>

        </form>


    </div>

    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="container-fluid clearfix">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a
            href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
            class="mdi mdi-heart text-danger"></i>
        </span>
      </div>
    </footer>
    <!-- partial -->
  </div>
@endsection

