@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Edit Appointment</div>
            <div class="card-body">
                <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Customer Name</label>
                        <input type="text" name="customer_name" class="form-control" value="{{ $appointment->customer_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Contact Info</label>
                        <input type="text" name="contact_info" class="form-control" value="{{ $appointment->contact_info }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Service</label>
                        <select name="service_id" class="form-select" required>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ $appointment->service_id == $service->id ? 'selected' : '' }}>
                                    {{ $service->service_name }} (${{ $service->price }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label small fw-bold">Date</label>
                            <input type="date" name="appointment_date" class="form-control" value="{{ $appointment->appointment_date }}" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label small fw-bold">Time</label>
                            <input type="time" name="appointment_time" class="form-control" value="{{ $appointment->appointment_time }}" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Appointment</button>
                    <a href="{{ route('appointments.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection