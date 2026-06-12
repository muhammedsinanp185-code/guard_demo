@extends('layouts.user')

@section('title', 'Add Vehicle')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Add Vehicle</h1>
            <p class="page-subtitle">Register a new vehicle to your account.</p>
        </div>
        <a href="{{ route('vehicles.index') }}" class="btn" style="background: rgba(255, 255, 255, 0.1); color: white;">
            <i class="fa-solid fa-arrow-left"></i> Back to Vehicles
        </a>
    </div>

    <div class="form-container glass" style="margin-top: 30px; max-width: 800px;">
        <form action="{{ route('vehicles.store') }}" method="POST">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label class="form-label">Vehicle Number</label>
                    <input type="text" name="vehicle_number" class="form-control" required placeholder="e.g. KL-07-AB-1234">
                </div>

                <div class="form-group">
                    <label class="form-label">Vehicle Type</label>
                    <select name="vehicle_type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="Car">Car</option>
                        <option value="Bike">Bike</option>
                        <option value="Truck">Truck</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label class="form-label">Brand</label>
                    <select name="brand" class="form-control" required>
                        <option value="">Select Brand</option>
                        <option value="Maruti Suzuki">Maruti Suzuki</option>
                        <option value="Hyundai">Hyundai</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Honda">Honda</option>
                        <option value="Ford">Ford</option>
                        <option value="BMW">BMW</option>
                        <option value="Tesla">Tesla</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control" placeholder="e.g. Civic">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Color</label>
                <input type="text" name="color" class="form-control" placeholder="e.g. Red, Black, White">
            </div>

            <div class="form-group" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
                    <i class="fa-solid fa-save"></i> Save Vehicle
                </button>
            </div>
        </form>
    </div>
@endsection
