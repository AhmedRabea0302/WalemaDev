
<!-- =================== Navbar Section ============ -->
<section class="header-part">
    <nav class="navbar navbar-default">
        <div class="container">

            <div class="col-md-9 col-xs-12">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('site.home') }}">الرئيسية <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">المطابخ</a></li>
                        <li><a href="#">من نحن</a></li>
                        <li><a href="#">المدونة</a></li>
                        @if(auth()->guard('chef')->user())<li><a href="{{ route('site.getLogout') }}">تسجيل الخروج</a></li>@endif
                        @if(!auth()->guard('chef')->user())<li><a href="{{ route('site.getRegister') }}">تسجيل الدخول</a></li>@endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>

            <div class="col-md-3 col-xs-12">
                <div class="logo-wrapper">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="" href="{{ route('site.home') }}">
                            <img class="center-block img-responsive" src="{{asset('assets/site/images/logo.png')}}" alt="Walema Logo">
                        </a>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </nav>

</section><!-- End Header-part -->