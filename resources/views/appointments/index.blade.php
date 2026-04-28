@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Appointments</h4>
    <a href="{{ route('appointments.create') }}" class="btn btn-success btn-sm">Create Booking</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-striped table-bordered mb-0">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Date/Time</th>
                    <th>Status</th>
                    <th width="100">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $app)
                <tr>
                    <td>{{ $app->customer_name }}</td>
                    <td>{{ $app->service->service_name }}</td>
                    <td>{{ $app->appointment_date }} {{ $app->appointment_time }}</td>
                    <td>
                        @if($app->payment->payment_status == 'Paid')
                            <span class="badge bg-success">Paid</span>
                        @else
                            <span class="badge bg-secondary">Unpaid</span>
                        @endif
                    </td>
                    <td>
    <a href="{{ route('appointments.edit', $app->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

         <form action="{{ route('appointments.destroy', $app->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to cancel this appointment?')">Cancel</button>
                        </form>
                    </td>
                </tr>
</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection