<header id="header" class="header" style="height: 8vh">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    <img src="http://localhost:8000/storage/images/logo-light.svg" alt="Logo" class="main-logo">
                </a>
            </div>

            <div class="right-menu">
                <div class="dropdown user-dropdown">
                    <button class="btn btn-link dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'images/admin.jpg' }}" alt="Admin" class="user-avatar rounded-circle">
                    </button>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        @auth
                        <div class="px-4 py-2 border-bottom">
                            <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                            <small class="text-muted">{{ Auth::user()->email }}</small>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <form action="{{ route('admin.profile') }}" method="GET" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="furniture-clr-hover btn btn-link w-100 text-left" style="background-color: #b18b5e; color: white;">
                                        <i class="fas fa-user mr-2"></i> My Profile
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="furniture-clr-hover btn btn-link w-100 text-left text-black">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                        @endauth
                        
                        @guest
                        <ul class="list-unstyled">
                            <li><a class="furniture-clr-hover dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="furniture-clr-hover dropdown-item" href="{{ route('register') }}">Register</a></li>
                        </ul>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
    /* Header Styles */
    .header {
    background: #9b7a52 !important;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 0.8rem 1.5rem;
    position: fixed;
    width: 100%;
    z-index: 1000;
}


    
    .navbar-brand {
        margin-right: 1.5rem;
    }
    
    
    .menu-toggle {
        font-size: 1.25rem;
        color: #495057;
    }
    .furniture-clr-hover {
    text-decoration: none;
}

.furniture-clr-hover:hover {
    text-decoration: none;
}

    
    .right-menu {
        display: flex;
        align-items: center;
    }
    .main-logo {
    width: 100px;
    height: auto;
    margin-bottom: 1rem;
}

    
    .dropdown-toggle {
        color: #495057;
        position: relative;
    }
    
    .badge {
        position: absolute;
        top: -5px;
        right: -5px;
        font-size: 0.6rem;
    }
    
    .user-avatar {
        width: 36px;
        height: 36px;
        object-fit: cover;
    }
    
    .dropdown-menu {
        border: none;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        left: auto !important;
        right: 0 !important;
    }
    
    .dropdown-item {
        padding: 0.5rem 1.5rem;
    }
    
    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .dropdown-header {
    padding: 0.5rem 1.5rem;
    color: #9b7a52;
    font-weight: 600;
}

.dropdown-divider {
    border-color: rgba(155, 122, 82, 0.2);
}

.user-info {
    padding: 0.75rem 1.5rem;
    background: rgba(155, 122, 82, 0.05);
}

.user-info h6 {
    margin-bottom: 0.25rem;
    color: #9b7a52;
}

.user-info small {
    font-size: 0.75rem;
}
</style>
