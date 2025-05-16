<header id="header" class="header">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                    <img src="http://localhost:8000/storage/images/logo-light.svg" alt="Logo" class="main-logo">
                </a>
            </div>

            <div class="right-menu">
                <div class="dropdown user-dropdown">
                    @auth
                    <button class="btn btn-link dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'images/admin.jpg' }}" alt="Admin" class="user-avatar rounded-circle" width="40" height="40"> <!-- Decreased size -->
                    </button>
                    <div class="dropdown-menu" aria-labelledby="userDropdown">
                        <div class="px-4 py-2 border-bottom">
                            <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                            <small class="text-muted">{{ Auth::user()->email }}</small>
                        </div>
                        <ul class="list-unstyled p-2">
                            <li class="mb-2">
                                <form action="{{ route('admin.profile') }}" method="GET" class="w-100">
                                    <button type="submit" class="btn btn-light w-100 text-start py-2 px-3 rounded-pill">
                                        <i class="fas fa-user me-2 text-brown"></i> My Profile
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="w-100">
                                    @csrf
                                    <button type="submit" class="btn btn-light w-100 text-start py-2 px-3 rounded-pill">
                                        <i class="fas fa-sign-out-alt me-2 text-danger"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endauth

                    @guest
                    <button class="btn fw-bold" onclick="window.location.href='{{ route('login') }}'" style="color:white; font-size: 20px; font-weight: bold;"> <!-- Decreased font size -->
                        Login
                    </button>                    
                    @endguest
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
    .header {
        background: #9b7a52 !important;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 0.5rem 1.5rem; /* Reduced padding */
        position: fixed;
        width: 100%;
        z-index: 1000;
    }

    .navbar-brand {
        margin-right: 1rem;
        padding-top: 1rem;
    }

    .right-menu {
        display: flex;
        align-items: center;
    }

    .main-logo {
        width: 90px; /* Reduced logo size */
        height: auto;
        margin-bottom: 1rem;
    }

    .dropdown-menu {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .dropdown-item {
        padding: 10px 18px; /* Reduced padding */
        font-size: 1rem; /* Smaller font size */
        transition: background-color 0.3s;
    }

    .dropdown-item:hover {
        background-color: #f0f0f0;
    }

    .dropdown-toggle::after {
        display: none;
    }

    .btn-light {
        color: #333;
        border: 1px solid #ddd;
        background-color: #fff;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-light:hover {
        background-color: #f8f9fa;
        color: #9b7a52;
    }

    .user-avatar {
        border: 3px solid #9b7a52;
        border-radius: 50%;
        padding: 2px;
    }
</style>
