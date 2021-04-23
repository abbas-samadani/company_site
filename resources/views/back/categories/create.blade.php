@extends('back.index')

@section('title')
    پنل مدیریت-مدیریت دسته بندی ها
@endsection
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

      <!-- Page Title Header Starts-->
      <div class="row page-title-header">
        <div class="col-12">
          <div class="page-header">
            <h4 class="page-title">مدیریت دسته بندی ها</h4>
          </div>
        </div>

      </div>
      <!-- Page Title Header Ends-->
      @include('back.messages')


      <div class="card">
        <div class="card-body">
          <h4 class="card-title">اضافه کردن دسته بندی جدید</h4>
          <div class="container">



        <div class="d-flex justify-content-center">
            <form action="{{route('admin.categories.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان دسته بندی</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                    @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description"> نام مستعار</label>
                    <input class="form-control @error('title') is-invalid @enderror" name="slug">
                    @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">ذخیره</button>
                </div>

            </form>

            
        </div>
    </div>
        </div>
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



