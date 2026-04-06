<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('banner.index') }}"
                        class="nav-link {{ request()->routeIs('banner.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Banner</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ads.index') }}"
                        class="nav-link {{ request()->routeIs('ads.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Ads</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('coupon.index') }}"
                        class="nav-link {{ request()->routeIs('coupon.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>Coupon</p>
                    </a>
                </li>
                <li
                    class="nav-item has-treeview {{ request()->routeIs('category.*') || request()->routeIs('subcategory.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('category.*') || request()->routeIs('subcategory.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Manage Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Category -->
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}"
                                class="nav-link {{ request()->routeIs('category.*') ? 'active' : '' }}"
                                style="padding-left: 30px;">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <!-- SubCategory -->
                        <li class="nav-item">
                            <a href="{{ route('subcategory.index') }}"
                                class="nav-link {{ request()->routeIs('subcategory.*') ? 'active' : '' }}"
                                style="padding-left: 30px;">
                                <i class="far fa-dot-circle nav-icon"></i>
                                <p>Manage SubCategory</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('brand.index') }}"
                        class="nav-link {{ request()->routeIs('brand.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Manage Brand</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('color.index') }}"
                        class="nav-link {{ request()->routeIs('color.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-palette"></i>
                        <p>Color</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('unit.index') }}"
                        class="nav-link {{ request()->routeIs('unit.*') ? 'active' : '' }}">
                        <i class="fas fa-cube"></i>
                        <p>Unit</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('size.index') }}"
                        class="nav-link {{ request()->routeIs('size.*') ? 'active' : '' }}">
                        <i class="fas fa-list"></i>
                        <p>Size</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.index') }}"
                        class="nav-link {{ request()->routeIs('product.*') ? 'active' : '' }}">
                        <i class="fas fa-box"></i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('flash-sale.index') }}"
                        class="nav-link {{ request()->routeIs('flash-sale.*') ? 'active' : '' }}">
                        <i class="fas fa-bolt"></i>
                        <p>Flash Sales</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
