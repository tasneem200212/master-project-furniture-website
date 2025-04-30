@extends('layouts.app_admin')

@section('title', 'Payment Methods')

@section('content')
<div id="right-panel" class="right-panel">
    <div class="container">
        <h1 class="my-4" style="color: #9b7a52">Payment Methods</h1>

        <!-- Add Payment Method Button -->
        <div class="mb-3">
            <a href="{{ route('admin.payment_methods.create') }}" class="btn text-light" style="background-color: #b18b5e">Add New Payment Method</a>
        </div>

        <!-- Payment Methods Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Method Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paymentMethods as $paymentMethod)
                    <tr>
                        <td>{{ $paymentMethod->id }}</td>
                        <td>{{ $paymentMethod->method_name }}</td>
                        <td>
                            <form action="{{ route('admin.payment_methods.destroy', $paymentMethod->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
