@extends('layouts.user')

@section('title', 'Edit Vehicle')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Edit Vehicle</h1>
            <p class="page-subtitle">Update your vehicle details.</p>
        </div>
        <a href="{{ route('vehicles.index') }}" class="btn" style="background: rgba(255, 255, 255, 0.1); color: white;">
            <i class="fa-solid fa-arrow-left"></i> Back to Vehicles
        </a>
    </div>

    <div class="form-container glass" style="margin-top: 30px; max-width: 800px;">
        <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label class="form-label">Vehicle Number</label>
                    <input type="text" name="vehicle_number" class="form-control" required value="{{ old('vehicle_number', $vehicle->vehicle_number) }}" placeholder="e.g. KL-07-AB-1234">
                </div>

                <div class="form-group">
                    <label class="form-label">Vehicle Type</label>
                    <select name="vehicle_type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="Car" {{ (old('vehicle_type', $vehicle->vehicle_type) == 'Car') ? 'selected' : '' }}>Car</option>
                        <option value="Bike" {{ (old('vehicle_type', $vehicle->vehicle_type) == 'Bike') ? 'selected' : '' }}>Bike</option>
                        <option value="Truck" {{ (old('vehicle_type', $vehicle->vehicle_type) == 'Truck') ? 'selected' : '' }}>Truck</option>
                        <option value="Other" {{ (old('vehicle_type', $vehicle->vehicle_type) == 'Other') ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label class="form-label">Brand</label>
                    <select name="brand" class="form-control" required>
                        <option value="">Select Brand</option>
                        <option value="Maruti Suzuki" {{ (old('brand', $vehicle->brand) == 'Maruti Suzuki') ? 'selected' : '' }}>Maruti Suzuki</option>
                        <option value="Hyundai" {{ (old('brand', $vehicle->brand) == 'Hyundai') ? 'selected' : '' }}>Hyundai</option>
                        <option value="Toyota" {{ (old('brand', $vehicle->brand) == 'Toyota') ? 'selected' : '' }}>Toyota</option>
                        <option value="Honda" {{ (old('brand', $vehicle->brand) == 'Honda') ? 'selected' : '' }}>Honda</option>
                        <option value="Ford" {{ (old('brand', $vehicle->brand) == 'Ford') ? 'selected' : '' }}>Ford</option>
                        <option value="BMW" {{ (old('brand', $vehicle->brand) == 'BMW') ? 'selected' : '' }}>BMW</option>
                        <option value="Tesla" {{ (old('brand', $vehicle->brand) == 'Tesla') ? 'selected' : '' }}>Tesla</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control" value="{{ old('model', $vehicle->model) }}" placeholder="e.g. Civic">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Color</label>
                <input type="text" name="color" class="form-control" value="{{ old('color', $vehicle->color) }}" placeholder="e.g. Red, Black, White">
            </div>

            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="Active" {{ (old('status', $vehicle->status) == 'Active') ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ (old('status', $vehicle->status) == 'Inactive') ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
                    <i class="fa-solid fa-save"></i> Update Vehicle
                </button>
            </div>
        </form>
    </div>
@endsection
