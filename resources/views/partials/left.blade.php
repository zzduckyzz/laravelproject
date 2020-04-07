 <div class="page-sidebar navbar-collapse collapse">      
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper hide">
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler"> </div>
            <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        <li class="sidebar-search-wrapper"> 
           <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        <li class="nav-item start">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-home"></i>
                <span class="title">Thống kê</span>
                <span class="selected"></span>
                <span class="arrow open"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item start active open">
                    <a href="{{ url('admin/') }}" class="nav-link ">
                        <i class="icon-bar-chart"></i>
                        <span class="title1">Hóa đơn</span>
                        <span class="selected"></span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="glyphicon glyphicon-sort"></i>
                <span class="title">Quản lý bán hàng</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('admin/order') }}" class="nav-link ">
                        <i class="glyphicon glyphicon-pencil"></i>
                        <span class="title1">Hóa đơn</span>
                    </a>
                </li>
                <!-- <li class="nav-item   ">
                    <a href="{{ url('admin/customer') }}" class="nav-link ">
                        <i class="glyphicon glyphicon-user"></i>
                        <span class="title1">Khách hàng</span>
                    </a>
                </li> -->
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="glyphicon glyphicon-list-alt"></i>
                <span class="title">Quản lý sản phẩm</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('admin/category') }}" class="nav-link ">
                        <i class="glyphicon glyphicon-th-list"></i>
                        <span class="title1">Danh mục</span>
                    </a>
                </li>
                 <li class="nav-item  ">
                    <a href="{{ url('admin/typewood') }}" class="nav-link ">
                        <i class="glyphicon glyphicon-th"></i>
                        <span class="title1">Loại gỗ</span>
                    </a>
                </li>
                 <li class="nav-item  ">
                    <a href="{{ url('admin/product') }}" class="nav-link ">
                        <i class="glyphicon glyphicon-align-left"></i>
                        <span class="title1">Sản phẩm</span>
                    </a>
                </li>
                 <li class="nav-item  ">
                    <a href="{{ url('admin/image') }}" class="nav-link ">
                        <i class="glyphicon glyphicon-picture"></i>
                        <span class="title1">Hình ảnh</span>
                    </a>
                </li>          
            </ul>
        </li>
        @if(Auth::user()->level == 1)
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="icon-settings"></i>
                <span class="title">Quản lý tài khoản</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item ">
                    <a href="{{ url('admin/user') }}" class="nav-link ">
                         <i class="glyphicon glyphicon-user"></i>
                        <span class="title1">Người dùng</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="glyphicon glyphicon-phone-alt"></i>
                <span class="title">Quản lý liên hệ</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item  ">
                    <a href="{{ url('admin/contact') }}" class="nav-link ">
                       <i class="glyphicon glyphicon-earphone"></i>
                        <span class="title1">Liên hệ</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="glyphicon glyphicon-equalizer"></i>
                <span class="title">Quản lý nội dung</span>
                <span class="arrow"></span>
            </a> 
            <ul class="sub-menu">
                <li class="nav-item ">
              
                    <a href="{{ url('admin/slide') }}" class="nav-link ">
                    <i class="glyphicon glyphicon-option-horizontal"></i>
                        <span class="title1">Slide</span>
                     </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ url('admin/new') }}" class="nav-link ">
                     <i class="glyphicon glyphicon-envelope"></i>
                       <span class="title1">Tin tức</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
<!-- END SIDEBAR MENU -->
<!-- END SIDEBAR MENU -->
</div>