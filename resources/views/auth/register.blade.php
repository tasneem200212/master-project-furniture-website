@extends('layouts.app')

@section('content')
<style>


body{

}
    .register-container {
        min-height: 100vh;
        background: url('https://media.istockphoto.com/id/2150319965/photo/home-interior-with-vintage-furniture.webp?a=1&b=1&s=612x612&w=0&k=20&c=xrRdUZtfDWjAesW7bb2rwUFoDmMobikURbhXrxMggnU=') no-repeat center center/cover; /* صورة خلفية */
        background-size: cover;
        background-position: center;

    }

    .register-card {
        max-width: 700px;
        border: none;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        background-color: rgba(255, 255, 255, 0.9); /* إضافة لون خلفية خفيف لزيادة وضوح النموذج */
    }

    .register-header {
        background-color: #b18b5e;
        color: white;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        padding: 30px 20px;
        text-align: center;
    }

    .register-header h3 {
        color: #ffffff !important;
    }

    .register-btn {
        background-color: #b18b5e;
        border: none;
        transition: background-color 0.3s ease;
    }
    .register-btn:hover {
        background-color: #9e7b51;
    }
</style>

<div class="  register-container d-flex justify-content-center align-items-center">
    <div class="card register-card w-100 my-5">
        <div class="register-header">
            <h3>Create a New Account</h3>
        </div>
        <div class="card-body px-5 py-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group mb-3">
                    <label for="name" class="font-weight-bold">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" 
                           value="{{ old('name') }}" required autofocus>
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="font-weight-bold">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" 
                           value="{{ old('email') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="phone" class="font-weight-bold">Phone Number</label>
                    <input type="text" name="phone" id="phone" class="form-control" 
                           value="{{ old('phone') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="address" class="font-weight-bold">Address</label>
                    <input type="text" name="address" id="address" class="form-control" 
                           value="{{ old('address') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="font-weight-bold">Password</label>
                    <input type="password" name="password" id="password" 
                           class="form-control" required>
                </div>

                <div class="form-group mb-4">
                    <label for="password_confirmation" class="font-weight-bold">Confirm Password</label>
                    <input type="password" name="password_confirmation" 
                           id="password_confirmation" class="form-control" required>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn register-btn px-5 py-3 text-white" style="font-size: 1.2rem;">
                        Register
                    </button>
                </div>
                
            </form>
        </div>
        <div class="card-footer rounded-4 text-center bg-white border-top-0 pb-4">
            <small>Already have an account? <a href="{{ route('login') }}">Login here</a></small>
        </div>
    </div>
</div>
@endsection
