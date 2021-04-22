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
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">لیست کاربران</h4>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>نام</th>
                <th>ایمیل</th>
                <th>تلفن</th>
                <th>نقش</th>
                <th>وضعیت</th>
                <th>مدیریت</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                  <tr>
                     <td>{{ $item->name }}</td>
                     <td>{{ $item->email }}</td>
                     <td>{{ $item->phone }}</td>
                     @if ($item->role == 1)
                        <td>مدیر</td>
                        @else
                        <td>کاربر</td>
                     @endif

                     @if ($item->status == 1)
                        <td>
                            <a href="" class="badge badge-success">
                                فعال
                            </a>

                        </td>
                        @else
                        <td>
                            <a href="" class="badge badge-danger">
                                غیرفعال
                            </a>

                        </td>
                     @endif


                     <td>
                         <a href="{{ route('admin.profile' , $item->id) }}" class="badge badge-success">
                             ویرایش
                         </a>
                         <a href="{{ route('admin.delete' , $item->id) }}" class="badge badge-danger">
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

