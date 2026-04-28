<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
     public function index() {
        $payments = Payment::with('appointment')->get();
        return view('payments.index', compact('payments'));
    }

    public function updateStatus($id) {
        $payment = Payment::findOrFail($id);
        $payment->update([
            'payment_status' => 'Paid',
            'payment_date' => now()
        ]);
        return back()->with('success', 'Payment marked as Paid.');
    }
}