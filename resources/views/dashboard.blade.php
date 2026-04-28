@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 class="mb-4">System Overview</h3>
    </div>
    <div class="col-md-4">
        <div class="card text-center mb-3">
            <div class="card-body">
                <h5 class="card-title text-muted">Services</h5>
                <h2 class="display-6">{{ \App\Models\Service::count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center mb-3">
            <div class="card-body">
                <h5 class="card-title text-muted">Total Appointments</h5>
                <h2 class="display-6">{{ \App\Models\Appointment::count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center mb-3">
            <div class="card-body">
                <h5 class="card-title text-muted">Revenue (Paid)</h5>
                <h2 class="display-6">${{ number_format(\App\Models\Payment::where('payment_status', 'Paid')->sum('amount'), 2) }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection