<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::where('owner_id', Auth::id())->get();

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
            'color' => $request->color,
            'model' => $request->model,
            'status' => $request->status ?? 'Active'
        ]);

        return redirect('/vehicles');
    }
}