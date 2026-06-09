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
                    <th>Action</th>
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
                    <td>
                        @if($user->status === 'active')
                            <span class="badge badge-active">Active</span>
                        @else
                            <span class="badge" style="background: rgba(239, 68, 68, 0.1); color: #ef4444;">Blocked</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.users.toggleStatus', $user->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="btn {{ $user->status === 'active' ? 'btn-danger' : 'btn-success' }}" style="padding: 6px 12px; font-size: 0.85rem; background: {{ $user->status === 'active' ? 'rgba(239, 68, 68, 0.1)' : 'rgba(16, 185, 129, 0.1)' }}; color: {{ $user->status === 'active' ? '#ef4444' : '#10b981' }}; border: 1px solid {{ $user->status === 'active' ? 'rgba(239, 68, 68, 0.2)' : 'rgba(16, 185, 129, 0.2)' }};">
                                {{ $user->status === 'active' ? 'Block' : 'Unblock' }}
                            </button>
                        </form>
                    </td>
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
