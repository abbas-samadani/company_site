<header id="header">

    <div id="topbar">
      <div class="container">
        <div class="social-links">
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="#intro" class="scrollto"><span>Rapid</span></a></h1>
      </div>
      
      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">خانه</a></li>
          <li><a href="#about">درباره ما</a></li>
          <li><a href="#services">سرویس ها</a></li>
          <li><a href="#portfolio">نمونه کارها</a></li>
          <li><a href="#team">تیم ما</a></li>
          <li class="drop-down"><a href="">مدیریت کاربران</a>
            <ul>
              <li><a href="#">ورود</a></li>              
              <li><a href="{{route('register')}}">ثبت نام</a></li>
              <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn btn-primary">خروج</button>
              </form>
              

            </ul>
          </li>
          <li><a href="#footer">تماس با ما</a></li>
        </ul>
      </nav>

    </div>
  </header>