@extends('layouts.admin')

@section('title', 'Admin Settings')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Settings</h1>
            <p class="page-subtitle">Manage system configuration and preferences.</p>
        </div>
    </div>

    <div class="table-container glass" style="margin-top: 30px; padding: 40px; text-align: center;">
        <i class="fa-solid fa-gear" style="font-size: 3rem; color: var(--text-secondary); margin-bottom: 20px;"></i>
        <h2>Settings Area</h2>
        <p style="color: var(--text-secondary); margin-top: 10px;">
            Configuration options will be available here in a future update.
        </p>
    </div>
@endsection
