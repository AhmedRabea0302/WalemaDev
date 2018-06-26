<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li @if(Request::route()->getName() == 'admin.home') class="active" @endif class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{ trans('trans.dashboard') }}</span>
                </a>
            </li>

            <li @if(Request::route()->getName() == 'admin.settings') class="active" @endif class="nav-item">
                <a href="{{ route('admin.settings') }}" class="nav-link nav-toggle">
                    <i class="fa fa-gear"></i>
                    <span class="title">{{ trans('trans.settings') }}</span>
                </a>
            </li>

            <li @if(Request::route()->getName() == 'admin.users') class="active" @endif class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">المديرين</span>
                </a>
            </li>

            <li @if(Request::route()->getName() == 'admin.cities_and_types') class="active" @endif class="nav-item">
                 <a href="{{ route('admin.cities_and_types') }}" class="nav-link nav-toggle">
                    <i class="fa fa-map"></i>
                    <span class="title">المدن وأنواع المطاعم</span>
                </a>
            </li>

            {{--<li @if(Request::route()->getName() == 'admin.static_pages') class="active" @endif class="nav-item">--}}
                {{--<a href="{{ route('admin.static_pages') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="fa fa-slack"></i>--}}
                    {{--<span class="title">الصفحات الثابتة</span>--}}
                    {{--<span class="arrow"></span>--}}
                {{--</a>--}}

            {{--</li>--}}


            {{--<li @if(Request::route()->getName() == 'admin.about') class="active" @endif class="nav-item">--}}
                {{--<a href="{{ route('admin.about') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="fa fa-list"></i>--}}
                    {{--<span class="title">{{ trans('trans.about') }}</span>--}}
                {{--</a>--}}
            {{--</li>--}}


            {{--<li @if(Request::route()->getName() == 'admin.testimonials') class="active" @endif class="nav-item">--}}
                {{--<a href="{{ route('admin.testimonials') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="fa fa-flag"></i>--}}
                    {{--<span class="title">{{ trans('trans.testimonials') }}</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li @if(Request::route()->getName() == 'admin.services') class="active" @endif class="nav-item">--}}
                {{--<a href="{{ route('admin.services') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="fa fa-th-large"></i>--}}
                    {{--<span class="title">{{ trans('trans.services')}}</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li @if(Request::route()->getName() == 'admin.services_features') class="active" @endif class="nav-item">--}}
                {{--<a href="{{ route('admin.services_features') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="fa fa-binoculars "></i>--}}
                    {{--<span class="title">{{ trans('trans.services_features')}}</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li @if(Request::route()->getName() == 'admin.blog') class="active" @endif class="nav-item">--}}
                {{--<a href="{{ route('admin.blog') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="fa fa-rss"></i>--}}
                    {{--<span class="title">{{ trans('trans.blog')}}</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li @if(Request::route()->getName() == 'admin.doctors') class="active" @endif class="nav-item">--}}
                {{--<a href="{{ route('admin.doctors') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="fa fa-chef-md"></i>--}}
                    {{--<span class="title">الأطباء</span>--}}
                {{--</a>--}}
            {{--</li>--}}


            {{--<li @if(Request::route()->getName() == 'admin.categories') class="active" @endif class="nav-item">--}}
                {{--<a href="{{ route('admin.categories') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="fa fa-puzzle-piece"></i>--}}
                    {{--<span class="title">أقسام</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li @if(Request::route()->getName() == 'admin.gallery') class="active" @endif class="nav-item">--}}
                {{--<a href="{{ route('admin.gallery') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="fa fa-picture-o"></i>--}}
                    {{--<span class="title">المعرض</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li @if(Request::route()->getName() == 'admin.contacts') class="active" @endif class="nav-item">--}}
                {{--<a href="{{ route('admin.contacts') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="fa fa-envelope"></i>--}}
                    {{--<span class="title">الرسائل ومعلومات التواصل</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li @if(Request::route()->getName() == 'admin.subscribe') class="active" @endif class="nav-item">--}}
                {{--<a href="{{ route('admin.subscribe') }}" class="nav-link nav-toggle">--}}
                    {{--<i class="fa fa-bullhorn"></i>--}}
                    {{--<span class="title">المشاركين</span>--}}
                {{--</a>--}}
            {{--</li>--}}


        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
