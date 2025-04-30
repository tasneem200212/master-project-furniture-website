@extends('layouts.app_Login')

<style>
    .login-background {
        background: url('https://media.istockphoto.com/id/2150319965/photo/home-interior-with-vintage-furniture.webp?a=1&b=1&s=612x612&w=0&k=20&c=xrRdUZtfDWjAesW7bb2rwUFoDmMobikURbhXrxMggnU=') no-repeat center center/cover;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        
    }

    .register-btn {
        background-color: #b18b5e;
        border: none;
        font-size: 1.2rem;
        transition: background-color 0.3s ease;
    }

    .register-btn:hover {
        background-color: #9f7a4f;
    }

    .container {
        margin-bottom: 3rem;
    }

    .card {
        width: 90%;
        max-width: 500px;
        margin: 0 auto;
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 30px;
    }

    .card-header {
        padding: 20px;
    }

    .card-body {
        padding: 30px;
    }

    .form-control {
        width: 100%;
        border-radius: 5px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .register-link {
        display: block;
        text-align: center;
        margin-top: 20px;
        font-size: 1.3rem;
    }

    .register-link a {
        color: #b18b5e;
        font-weight: bold;
    }

    .text-danger {
        font-size: 0.9rem;
    }
</style>

@section('content')
<div class="login-background">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card rounded-4 shadow-lg">
                    <div class=" text-center" >
                        <h3 class="font-weight-bold" style="color: #b18b5e;">Login</h3>
                    </div>

                    <div class="card-body">
                        {{-- Session error message --}}
                        @if (session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       required value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


<button type="submit" class="btn btn-lg register-btn text-white py-3" style="font-size: 1.2rem; background-color: #b18b5e; width: 100%; text-align: center;">
    Login
</button>

                        </form>

                        <div class="register-link">
                            <span>Don't have an account?</span>
                            <a href="{{ route('register') }}">Register here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
