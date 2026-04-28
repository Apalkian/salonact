<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Payment;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
   public function index() {
        $appointments = Appointment::with('service', 'payment')->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create() {
        $services = Service::all();
        return view('appointments.create', compact('services'));
    }

    public function store(Request $request) {
        $request->validate([
            'customer_name' => 'required',
            'service_id' => 'required',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        $service = Service::find($request->service_id);

        $appointment = Appointment::create([
            'customer_name' => $request->customer_name,
            'contact_info' => $request->contact_info,
            'service_id' => $request->service_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'price' => $service->price,
        ]);

        // Auto-create payment record as Unpaid
        Payment::create([
            'appointment_id' => $appointment->id,
            'amount' => $service->price,
            'payment_status' => 'Unpaid'
        ]);

        return redirect()->route('appointments.index')->with('success', 'Booking successful.');
    }
    public function edit(Appointment $appointment)
{
    $services = Service::all();
    return view('appointments.edit', compact('appointment', 'services'));
}

public function update(Request $request, Appointment $appointment)
{
    $request->validate([
        'customer_name' => 'required',
        'service_id' => 'required',
        'appointment_date' => 'required|date',
        'appointment_time' => 'required',
    ]);

    // Fetch the service to update the price in case the service was changed
    $service = Service::find($request->service_id);

    $appointment->update([
        'customer_name' => $request->customer_name,
        'contact_info' => $request->contact_info,
        'service_id' => $request->service_id,
        'appointment_date' => $request->appointment_date,
        'appointment_time' => $request->appointment_time,
        'price' => $service->price,
    ]);

    return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
}

    public function destroy(Appointment $appointment) {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment canceled.');
    }
}