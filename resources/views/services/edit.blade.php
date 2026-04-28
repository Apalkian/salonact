@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Edit Service</div>
            <div class="card-body">
                <!-- IMPORTANT: Method must be POST with @method('PUT') -->
                <form action="{{ route('services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Service Name</label>
                        <input type="text" name="service_name" class="form-control" value="{{ $service->service_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Price ($)</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ $service->price }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Duration</label>
                        <input type="text" name="duration" class="form-control" value="{{ $service->duration }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Description</label>
                        <textarea name="description" class="form-control" rows="2">{{ $service->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Service</button>
                    <a href="{{ route('services.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection