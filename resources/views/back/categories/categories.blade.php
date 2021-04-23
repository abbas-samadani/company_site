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

      <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-2"> اضافه کردن دسته بندی</a>

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">لیست دسته بندی ها</h4>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>نام</th>
                <th>نام مستعار</th>
                <th>مدیریت</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                  <tr>
                     <td>{{ $category->name }}</td>
                     <td>{{ $category->slug }}</td>
                     <td>
                         <a href="{{ route('admin.categories.edit' , $category->id) }}" class="badge badge-success">
                             ویرایش
                         </a>
                         <a href="{{ route('admin.categories.destroy' , $category->id) }}" class="badge badge-danger">
                            حذف
                         </a>
                     </td>
                  </tr>
                @endforeach


            </tbody>
          </table>
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



