<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('product.category') }}" class="brand-link">
        <img src="{{ url('web/images/logo.png') }}" alt="AdminLTE Logo">
        {{-- <span class="brand-text font-weight-light">YEENok</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (Auth::check())
                    <img src="{{ Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image"
                        style="width: 40px;height: 40px;">
                @endif

            </div>
            <div class="info" style="line-height: 40px">
                <a href="#" class="d-block" style="font-size: 25px">
                    @if (Auth::check())
                        {{ Auth::user()->name }}
                    @endif
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- @role('admin') --}}
                <li class="nav-item">
                    <a href="{{ route('product.category') }}" class="nav-link">
                        <i class="fas fa-align-justify"></i>
                        <p>Quản lí danh mục sản phẩm </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('post.category') }}" class="nav-link">
                        <i class="fas fa-th"></i>
                        <p>Quản lí danh mục bài viết </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('brand') }}" class="nav-link">
                        <i class="far fa-copyright"></i>
                        <p>Quản lí thương hiệu </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('slide') }}" class="nav-link">
                        <i class="fas fa-sliders-h"></i>
                        <p>Quản lí slide </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product') }}" class="nav-link">
                        <i class="fab fa-product-hunt"></i>
                        <p>Quản lí sản phẩm </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('post') }}" class="nav-link">
                        <i class="fas fa-blog"></i>
                        <p>Quản lí bài viết </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tag') }}" class="nav-link">
                        <i class="fas fa-tags"></i>
                        <p>Quản lí tag </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('newsletter') }}" class="nav-link">
                        <i class="fas fa-envelope-open-text"></i>
                        <p>Quản lí email </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('discount') }}" class="nav-link">
                        <i class="fas fa-percent"></i>
                        <p>Quản lí mã giảm giá </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-border-all"></i>
                        <p>Quản lí khuyến mãi </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-dolly"></i>s
                        <p>Quản lí đơn hàng </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            Phân quyền
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{ route('user') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lí người dùng</p>
                            </a>
                            <a href="{{ route('role') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lí vai trò</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- @endrole --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
