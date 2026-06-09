@extends('layouts.admin')

@section('title', 'Create Manager')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Create Manager</h1>
            <p class="page-subtitle">Add a new manager to the system.</p>
        </div>
        <a href="{{ route('admin.managers.index') }}" class="btn" style="border: 1px solid var(--border-color); color: var(--text-primary);">
            <i class="fa-solid fa-arrow-left"></i> Back to Managers
        </a>
    </div>

    <div class="form-container glass" style="margin-top: 30px;">
        @if ($errors->any())
            <div class="alert" style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); color: #ef4444;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.managers.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required placeholder="e.g. John Smith">
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required placeholder="e.g. john@example.com">
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="Minimum 8 characters">
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required placeholder="Must match password">
            </div>

            <div style="margin-top: 30px; text-align: right;">
                <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, #8b5cf6, #6366f1); box-shadow: 0 4px 15px rgba(139, 92, 246, 0.4);">
                    <i class="fa-solid fa-user-plus"></i> Create Manager
                </button>
            </div>
        </form>
    </div>
@endsection
