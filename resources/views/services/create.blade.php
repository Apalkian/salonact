@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Add New Service</div>
            <div class="card-body">
                <form action="{{ route('services.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Service Name</label>
                        <input type="text" name="service_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Price ($)</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Duration</label>
                        <input type="text" name="duration" class="form-control" placeholder="e.g. 30 mins" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Description</label>
                        <textarea name="description" class="form-control" rows="2"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Service</button>
                    <a href="{{ route('services.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection