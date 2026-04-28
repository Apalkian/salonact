<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    public function create() {
        return view('services.create');
    }

    public function store(Request $request) {
        $request->validate([
            'service_name' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required'
        ]);

        Service::create($request->all());
        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
{
    return view('services.edit', compact('service'));
}

// Update the service in the database
public function update(Request $request, Service $service)
{
    $request->validate([
        'service_name' => 'required',
        'price' => 'required|numeric',
        'duration' => 'required'
    ]);

    $service->update($request->all());

    return redirect()->route('services.index')->with('success', 'Service updated successfully.');
}

    public function destroy(Service $service) {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted.');
    }
}
