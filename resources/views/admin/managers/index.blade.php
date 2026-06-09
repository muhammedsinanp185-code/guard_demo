@extends('layouts.admin')

@section('title', 'Manage Managers')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Managers</h1>
            <p class="page-subtitle">Manage all managers in the system.</p>
        </div>
        <a href="{{ route('admin.managers.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Create Manager
        </a>
    </div>

    <div class="table-container glass" style="margin-top: 30px;">
        <div class="table-header">
            <div class="table-title">
                <i class="fa-solid fa-user-tie" style="color: #8b5cf6;"></i> All Managers
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Manager Info</th>
                    <th>Email</th>
                    <th>Joined Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($managers as $manager)
                <tr>
                    <td style="color: var(--text-secondary);">#{{ $manager->id }}</td>
                    <td>
                        <div class="user-info">
                            <div class="user-avatar" style="background: linear-gradient(135deg, #10b981, #3b82f6);">
                                {{ substr($manager->name, 0, 1) }}
                            </div>
                            <span style="font-weight: 500;">{{ $manager->name }}</span>
                        </div>
                    </td>
                    <td style="color: var(--text-secondary);">{{ $manager->email }}</td>
                    <td>{{ $manager->created_at ? $manager->created_at->format('M d, Y') : 'N/A' }}</td>
                    <td><span class="badge badge-active">Active</span></td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: var(--text-secondary); padding: 30px;">
                        No managers registered yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
