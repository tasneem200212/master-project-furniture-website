@extends('layouts.app_admin')

@section('content')
    <div id="right-panel" class="right-panel">

        <h1 style="color: #9b7a52">All Cupons</h1>

        <div class="mb-3">
            <a href="{{ route('admin.cupon.create') }}" class="btn text-light" style="background-color: #b18b5e">Add New Cupon</a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Discount Percentage</th>
                    <th>Expiry Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cupons as $cupon)
                    <tr>
                        <td>{{ $cupon->id }}</td>
                        <td>{{ $cupon->code }}</td>
                        <td>{{ $cupon->discount_percentage }}%</td>
                        <td>{{ \Carbon\Carbon::parse($cupon->expiry_date)->format('d M, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.cupon.edit', $cupon->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.cupon.destroy', $cupon->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $cupon->id }}">
                                @csrf
                                @method('DELETE')
                                <!-- Add the onclick event for confirmation -->
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $cupon->id }})">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Function to show the confirm dialog
        function confirmDelete(cuponId) {
            // Display confirm dialog
            if (confirm('Are you sure you want to delete this cupon?')) {
                // Submit the form if confirmed
                document.getElementById('delete-form-' + cuponId).submit();
            }
        }
    </script>
@endsection
