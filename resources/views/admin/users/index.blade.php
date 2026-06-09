@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Users</h1>
            <p class="page-subtitle">Manage all registered users in the system.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Create User
        </a>
    </div>

    <div class="table-container glass" style="margin-top: 30px;">
        <div class="table-header">
            <div class="table-title">
                <i class="fa-solid fa-users" style="color: #3b82f6;"></i> All Users
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Info</th>
                    <th>Email</th>
                    <th>Joined Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td style="color: var(--text-secondary);">#{{ $user->id }}</td>
                    <td>
                        <div class="user-info">
                            <div class="user-avatar" style="background: linear-gradient(135deg, #f59e0b, #ef4444);">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <span style="font-weight: 500;">{{ $user->name }}</span>
                        </div>
                    </td>
                    <td style="color: var(--text-secondary);">{{ $user->email }}</td>
                    <td>{{ $user->created_at ? $user->created_at->format('M d, Y') : 'N/A' }}</td>
                    <td><span class="badge badge-active">Active</span></td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: var(--text-secondary); padding: 30px;">
                        No users registered yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
