@extends('layouts.app_admin')



<div id="right-panel" class="right-panel">


@section('content')
    <h1 style="color: #9b7a52">Edit Cupon</h1>

    <form action="{{ route('admin.cupon.update', $cupon->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="code">Cupon code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{old('code',$cupon->code)}}" required>
        </div>

        <div class="form-group">
            <label for="discount_percentage">Discount Percentage</label>
            <input type="number" class="form-control" id="discount_percentage" name="discount_percentage" value="{{ old('discount_percentage', $cupon->discount_percentage) }}" required>
        </div>

        <div class="form-group">
            <label for="expiry_date">Expiry Date</label>
            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ old('expiry_date', $cupon->expiry_date) }}" required>
        </div>
        
        <div class="form-group">
            <label for="max_usage">Max Usage</label>
            <input type="number" class="form-control" id="max_usage" name="max_usage" value="{{old('max_usage',$cupon->max_usage)}}" required>
        </div>
        

        <button type="submit" class="btn" style="background-color: #9b7a52; color: white;">Update Cupon</button>
        <a href="{{ route('admin.cupon.index') }}" class="btn btn-secondary ml-3">Cancel</a>

    </form>
</div>
@endsection
