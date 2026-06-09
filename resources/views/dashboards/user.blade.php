@extends('layouts.user')

@section('title', 'User Dashboard')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard</h1>
            <p class="page-subtitle">Welcome back, {{ auth()->guard('web')->user()->name }}. Here is an overview of your account.</p>
        </div>
        <div style="color: var(--text-secondary); font-size: 0.9rem;">
            <i class="fa-regular fa-calendar" style="margin-right: 8px;"></i>
            {{ date('l, F j, Y') }}
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card glass">
            <div class="stat-icon icon-blue">
                <i class="fa-solid fa-car"></i>
            </div>
            <div class="stat-label">Registered Vehicles</div>
            <div class="stat-value">{{ \App\Models\Vehicle::where('owner_id', auth()->guard('web')->id())->count() }}</div>
        </div>

        <div class="stat-card glass">
            <div class="stat-icon icon-purple">
                <i class="fa-solid fa-id-card"></i>
            </div>
            <div class="stat-label">Account Status</div>
            <div class="stat-value" style="font-size: 1.8rem; margin-top: 24px;">{{ ucfirst(auth()->guard('web')->user()->status) }}</div>
        </div>
    </div>

    <div class="table-container glass" style="margin-top: 20px;">
        <div class="table-header">
            <div class="table-title">
                <i class="fa-solid fa-car-side" style="color: #3b82f6;"></i> Your Vehicles
            </div>
            <a href="{{ route('vehicles.index') }}" class="table-action">Manage Vehicles</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Vehicle Number</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $vehicles = \App\Models\Vehicle::where('owner_id', auth()->guard('web')->id())->latest()->take(3)->get();
                @endphp
                @forelse($vehicles as $vehicle)
                <tr>
                    <td><span style="font-weight: 500;">{{ $vehicle->vehicle_number }}</span></td>
                    <td style="color: var(--text-secondary);">{{ $vehicle->vehicle_type }}</td>
                    <td>
                        <span class="badge {{ $vehicle->status === 'Active' ? 'badge-active' : '' }}" {{ $vehicle->status !== 'Active' ? 'style="background: rgba(239, 68, 68, 0.1); color: #ef4444;"' : '' }}>
                            {{ $vehicle->status }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align: center; color: var(--text-secondary); padding: 30px;">
                        No vehicles registered yet. <a href="{{ route('vehicles.create') }}" style="color: #3b82f6;">Add a vehicle</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection