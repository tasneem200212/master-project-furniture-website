<aside id="left-panel" class="left-panel" style="width: 21vw; background: #f8f9fa;">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav flex-column w-100">
                <!-- Dashboard Link -->
                <li class="nav-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <i class="menu-icon fa fa-laptop mr-2"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>

                <!-- Products Management -->
                <li class="nav-item {{ Route::currentRouteName() == 'admin.products.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.products.index') }}">
                        <i class="menu-icon fa fa-cube mr-2"></i>
                        <span class="menu-title">Products</span>
                    </a>
                </li>

                <!-- Orders Management -->
                <li class="nav-item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.orders.index') }}">
                        <i class="menu-icon fa fa-list mr-2"></i>
                        <span class="menu-title">Orders</span>
                    </a>
                </li>

                <!-- Customer Management -->
                <li class="nav-item {{ Route::currentRouteName() == 'admin.users.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.users.index') }}">
                        <i class="menu-icon fa fa-users mr-2"></i>
                        <span class="menu-title">Customers</span>
                    </a>
                </li>

                <!-- Category Management -->
                <li class="nav-item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.categories.index') }}">
                        <i class="menu-icon fa fa-cogs mr-2"></i>
                        <span class="menu-title">Categories</span>
                    </a>
                </li>

                <!-- Review Management -->
                <li class="nav-item {{ Route::currentRouteName() == 'admin.reviews.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.reviews.index') }}">
                        <i class="menu-icon fa fa-star mr-2"></i>
                        <span class="menu-title">Reviews</span>
                    </a>
                </li>

                <!-- Cupon Management -->
                <li class="nav-item {{ Route::currentRouteName() == 'admin.cupon.index' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.cupon.index') }}">
                        <i class="menu-icon fa fa-tags mr-2"></i>  <!-- Changed the icon -->
                        <span class="menu-title">Cuopons</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </nav>
</aside>

<style>
.left-panel {
    min-height: 100vh;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s;
    position: fixed;
    z-index: 999;
}

.navbar-nav {
    width: 100%;
    padding: 15px 0;
}

.nav-item {
    margin: 5px 0;
    border-radius: 4px;
    transition: all 0.3s;
}

.nav-link {
    color: #6c757d !important;
    padding: 12px 20px !important;
    display: flex !important;
    align-items: center;
    transition: all 0.3s;
    border-left: 3px solid transparent;
}

.nav-link:hover {
    color: #9b7a52 !important;
    background-color: rgba(155, 122, 82, 0.1) !important;
    border-left-color: #9b7a52;
}

.nav-link:hover .menu-icon {
    color: #9b7a52 !important;
    transform: scale(1.1);
    transition: all 0.3s ease;
}

.nav-item.active .nav-link .menu-icon {
    color: #9b7a52 !important;
    transform: scale(1.1);
}

.nav-item.active {
    background-color: rgba(155, 122, 82, 0.15);
}

.nav-item.active .nav-link {
    color: #9b7a52 !important;
    font-weight: 600;
    border-left-color: #9b7a52;
    background-color: rgba(155, 122, 82, 0.1) !important;
}

.menu-icon {
    width: 20px;
    text-align: center;
    font-size: 1.1rem;
    margin-right: 12px;
    color: #9b7a52;
}

.nav-item.active .menu-icon {
    color: #9b7a52;
}

.nav-link:focus {
    outline: none;
    box-shadow: 0 0 0 2px rgba(155, 122, 82, 0.3);
}

.menu-title {
    font-size: 0.9rem;
    letter-spacing: 0.3px;
}
</style>