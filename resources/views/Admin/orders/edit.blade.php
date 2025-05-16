@extends('layouts.app_admin')

@section('title', 'Edit Order')

@section('content')
<div id="right-panel" class="right-panel">
    <div class="container py-5">
        <div class="card shadow" style="border-radius: 10px; border: none;">
            <div class="card-header py-3" style="background: linear-gradient(135deg, #9b7a52 0%, #b5946c 100%);">
                <h4 class="mb-0 text-white">
                    <i class="fas fa-edit mr-2"></i> Edit Order #{{ $order->id }}
                </h4>
            </div>
            
            <div class="card-body p-4" style="background-color: #f8f9fa;">
                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-4">
                        <label for="status" class="font-weight-bold mb-3" style="color: #5a4a3a; font-size: 1.05rem;">
                            <i class="fas fa-clipboard-check mr-2"></i> Order Status
                        </label>
                        <div class="position-relative">
                            <select name="status" id="status" class="form-control pl-3 pr-5 py-2" 
                                    style="border: 2px solid #d1c7b7; border-radius: 6px; 
                                           background-color: white; color: #5a4a3a;
                                           height: 46px; font-size: 1rem;
                                           box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                                           appearance: none;">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                    <span class="badge badge-warning p-2">Pending</span>
                                </option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                    <span class="badge badge-success p-2">Completed</span>
                                </option>
                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                    <span class="badge badge-info p-2">Processing</span>
                                </option>
                                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>
                                    <span class="badge badge-danger p-2">Canceled</span>
                                </option>
                            </select>
                            <div class="position-absolute" style="top: 50%; right: 15px; transform: translateY(-50%); pointer-events: none;">
                                <i class="fas fa-chevron-down" style="color: #9b7a52;"></i>
                            </div>
                        </div>
                        <small class="form-text d-block mt-2" style="color: #6c757d;">
                            <i class="fas fa-info-circle mr-1"></i> Select the new status for this order
                        </small>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-4 mt-3 border-top">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-light px-4 py-2" style="border: 1px solid #9b7a52; color: #9b7a52;">
                            <i class="fas fa-arrow-left mr-2"></i> Back to Orders
                        </a>
                        <button type="submit" class="btn px-4 py-2 text-white" 
                                style="background: linear-gradient(135deg, #9b7a52 0%, #b5946c 100%); 
                                       border: none; transition: all 0.3s;">
                            <i class="fas fa-save mr-2"></i> Update Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    select:focus {
        border-color: #9b7a52 !important;
        box-shadow: 0 0 0 0.2rem rgba(155, 122, 82, 0.25) !important;
        outline: none;
    }
    .badge {
        font-size: 0.85rem;
        font-weight: 500;
        border-radius: 4px;
    }
</style>

@if(config('app.select2'))
@section('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap4',
            minimumResultsForSearch: Infinity,
            templateResult: formatState,
            templateSelection: formatState
        });
        
        function formatState(state) {
            if (!state.id) return state.text;
            return $(state.element).html();
        }
    });
</script>
@endsection
@endif
@endsection