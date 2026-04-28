@extends('layouts.app')

@section('content')
<h4 class="mb-3">Payment Management</h4>

<div class="card">
    <table class="table table-bordered mb-0">
        <thead class="table-light">
            <tr>
                <th>Customer</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->appointment->customer_name }}</td>
                <td>${{ number_format($payment->amount, 2) }}</td>
                <td>
                    <span class="badge {{ $payment->payment_status == 'Paid' ? 'bg-success' : 'bg-warning text-dark' }}">
                        {{ $payment->payment_status }}
                    </span>
                </td>
                <td>
                    @if($payment->payment_status == 'Unpaid')
                    <form action="{{ route('payments.update', $payment->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-dark">Mark as Paid</button>
                    </form>
                    @else
                        <small class="text-muted">Completed</small>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection