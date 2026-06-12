<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicle::where('owner_id', Auth::id());

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('vehicle_number', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%")
                  ->orWhere('color', 'like', "%{$search}%");
            });
        }

        if ($request->filled('type')) {
            $query->where('vehicle_type', $request->type);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $vehicles = $query->latest()->get();

        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $owners = User::all();

        return view('vehicles.create', compact('owners'));
    }

    public function store(Request $request)
    {
        Vehicle::create([
            'owner_id' => Auth::id(),
            'vehicle_number' => $request->vehicle_number,
            'vehicle_type' => $request->vehicle_type,
            'brand' => $request->brand,
            'color' => $request->color,
            'model' => $request->model,
            'status' => $request->status ?? 'Active'
        ]);

        return redirect('/vehicles')->with('success', 'Vehicle added successfully!');
    }

    public function edit(Vehicle $vehicle)
    {
        if ($vehicle->owner_id !== Auth::id()) {
            abort(403);
        }
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        if ($vehicle->owner_id !== Auth::id()) {
            abort(403);
        }

        $vehicle->update([
            'vehicle_number' => $request->vehicle_number,
            'vehicle_type' => $request->vehicle_type,
            'brand' => $request->brand,
            'color' => $request->color,
            'model' => $request->model,
            'status' => $request->status
        ]);

        return redirect('/vehicles')->with('success', 'Vehicle updated successfully!');
    }
}