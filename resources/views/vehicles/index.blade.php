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

    <div class="glass" style="margin-top: 30px; padding: 20px; border-radius: 12px;">
        <form action="{{ route('vehicles.index') }}" method="GET" style="display: flex; gap: 15px; align-items: flex-end; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 200px;">
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary); font-size: 0.9rem;">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search number, model, color..." style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border-color); background: rgba(15, 23, 42, 0.6); color: white;">
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary); font-size: 0.9rem;">Vehicle Type</label>
                <select name="type" style="padding: 10px; border-radius: 8px; border: 1px solid var(--border-color); background: rgba(15, 23, 42, 0.6); color: white; min-width: 150px;">
                    <option value="">All Types</option>
                    <option value="Car" {{ request('type') == 'Car' ? 'selected' : '' }}>Car</option>
                    <option value="Bike" {{ request('type') == 'Bike' ? 'selected' : '' }}>Bike</option>
                    <option value="Truck" {{ request('type') == 'Truck' ? 'selected' : '' }}>Truck</option>
                    <option value="Other" {{ request('type') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div>
                <label style="display: block; margin-bottom: 8px; color: var(--text-secondary); font-size: 0.9rem;">Status</label>
                <select name="status" style="padding: 10px; border-radius: 8px; border: 1px solid var(--border-color); background: rgba(15, 23, 42, 0.6); color: white; min-width: 150px;">
                    <option value="">All Statuses</option>
                    <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ request('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary" style="padding: 10px 20px;">Filter</button>
                <a href="{{ route('vehicles.index') }}" class="btn" style="padding: 10px 20px; background: rgba(255, 255, 255, 0.1); color: white;">Clear</a>
            </div>
        </form>
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
                    <th>Action</th>
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
                    <td>
                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn" style="padding: 6px 12px; font-size: 0.85rem; background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                            <i class="fa-solid fa-pen-to-square"></i> Edit
                        </a>
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