@extends('layouts.app_admin')

@section('title', 'Add New Payment Method')

@section('content')

<div id="right-panel" class="right-panel">

    <div class="container">
        <h1 style="color: #9b7a52">Add New Payment Method</h1>

        <form action="{{ route('admin.payment_methods.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="method_name">Payment Method Name</label>
                <input type="text" name="method_name" id="method_name" class="form-control" placeholder="Enter payment method name" required>
            </div>

            <button type="submit" class="btn text-light m-3" style="background-color: #b18b5e">Add Payment Method</button>
        </form>
    </div>
</div>

@endsection
