@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Book Appointment</div>
            <div class="card-body">
                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Customer Name</label>
                        <input type="text" name="customer_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Contact Info</label>
                        <input type="text" name="contact_info" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Service</label>
                        <select name="service_id" class="form-select" required>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->service_name }} (${{ $service->price }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label small fw-bold">Date</label>
                            <input type="date" name="appointment_date" class="form-control" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label small fw-bold">Time</label>
                            <input type="time" name="appointment_time" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection