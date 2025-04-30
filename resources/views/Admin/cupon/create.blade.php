@extends('layouts.app_admin')


<div id="right-panel" class="right-panel">
@section('content')
    <h1 style="color: #9b7a52">Add New Cupon</h1>

    <form action="{{ route('admin.cupon.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="code">Cupon code</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="Enter Cupon name" required>
        </div>

        <div class="form-group">
            <label for="discount_percentage">Discount Percentage</label>
            <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" placeholder="Enter discount percentage" required>
        </div>

        <div class="form-group">
            <label for="expiry_date">Expiry Date</label>
            <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
        </div>

        <button type="submit" class="btn" style="background-color: #9b7a52; color: white;">Add Cupon</button>
    </form>
</div>
@endsection
