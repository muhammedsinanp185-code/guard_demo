@extends('layouts.user')

@section('title', 'My Vehicles')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">My Vehicles</h1>
            <p class="page-subtitle">Manage all your registered vehicles.</p>
        </div>
        <a href="{{ route('vehicles.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Add Vehicle
        </a>
    </div>

    <div class="table-container glass" style="margin-top: 30px;">
        <div class="table-header">
            <div class="table-title">
                <i class="fa-solid fa-car" style="color: #3b82f6;"></i> All Vehicles
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Vehicle Number</th>
                    <th>Type</th>
                    <th>Model</th>
                    <th>Color</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($vehicles as $vehicle)
                <tr>
                    <td><span style="font-weight: 600;">{{ $vehicle->vehicle_number }}</span></td>
                    <td style="color: var(--text-secondary);">{{ $vehicle->vehicle_type }}</td>
                    <td style="color: var(--text-secondary);">{{ $vehicle->model ?? 'N/A' }}</td>
                    <td>
                        @if($vehicle->color)
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <div style="width: 16px; height: 16px; border-radius: 50%; background-color: {{ strtolower($vehicle->color) }}; border: 1px solid rgba(255,255,255,0.2);"></div>
                                {{ $vehicle->color }}
                            </div>
                        @else
                            <span style="color: var(--text-secondary);">N/A</span>
                        @endif
                    </td>
                    <td>
                        <span class="badge {{ $vehicle->status === 'Active' ? 'badge-active' : '' }}" {{ $vehicle->status !== 'Active' ? 'style="background: rgba(239, 68, 68, 0.1); color: #ef4444;"' : '' }}>
                            {{ $vehicle->status }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: var(--text-secondary); padding: 30px;">
                        No vehicles registered yet. Click "Add Vehicle" to register one.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection