@extends('layouts.admin')

@section('title', 'Admin Dashboard Overview')

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Overview</h1>
            <p class="page-subtitle">Welcome back, Admin. Here's what's happening today.</p>
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
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="stat-label">Total Users</div>
            <div class="stat-value">{{ $userCount ?? 0 }}</div>
            <div style="color: #10b981; font-size: 0.85rem; font-weight: 500;">
                <i class="fa-solid fa-arrow-up"></i> +12% from last month
            </div>
        </div>

        <div class="stat-card glass">
            <div class="stat-icon icon-purple">
                <i class="fa-solid fa-user-tie"></i>
            </div>
            <div class="stat-label">Total Managers</div>
            <div class="stat-value">{{ $managerCount ?? 0 }}</div>
            <div style="color: #10b981; font-size: 0.85rem; font-weight: 500;">
                <i class="fa-solid fa-arrow-up"></i> +5% from last month
            </div>
        </div>
        
        <div class="stat-card glass">
            <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                <i class="fa-solid fa-shield-check"></i>
            </div>
            <div class="stat-label">System Status</div>
            <div class="stat-value" style="font-size: 1.8rem; margin-top: 24px;">Optimal</div>
            <div style="color: var(--text-secondary); font-size: 0.85rem; margin-top: 5px;">
                All services running smoothly
            </div>
        </div>
    </div>

    <!-- Tables Area -->
    <div class="tables-grid">
        
        <!-- Users Table -->
        <div class="table-container glass">
            <div class="table-header">
                <div class="table-title">
                    <i class="fa-solid fa-users" style="color: #3b82f6;"></i> Recent Users
                </div>
                <a href="{{ route('admin.users.index') }}" class="table-action">View All</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>User Info</th>
                        <th>Email</th>
                        <th>Joined Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($users) && $users->count() > 0)
                        @foreach($users->take(5) as $user)
                        <tr>
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
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" style="text-align: center; color: var(--text-secondary); padding: 30px;">
                                No users registered yet.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Managers Table -->
        <div class="table-container glass">
            <div class="table-header">
                <div class="table-title">
                    <i class="fa-solid fa-user-tie" style="color: #8b5cf6;"></i> Recent Managers
                </div>
                <a href="{{ route('admin.managers.index') }}" class="table-action">View All</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Manager Info</th>
                        <th>Email</th>
                        <th>Joined Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($managers) && $managers->count() > 0)
                        @foreach($managers->take(5) as $manager)
                        <tr>
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
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" style="text-align: center; color: var(--text-secondary); padding: 30px;">
                                No managers registered yet.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection