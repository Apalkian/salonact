@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Services</h4>
    <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm">Add New Service</a>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-bordered mb-0">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->service_name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->duration }}</td>
                    <td>${{ number_format($service->price, 2) }}</td>
                    <td>
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection