<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-color: #0f172a;
            --sidebar-bg: rgba(30, 41, 59, 0.7);
            --card-bg: rgba(30, 41, 59, 0.6);
            --text-primary: #f8fafc;
            --text-secondary: #94a3b8;
            --accent-primary: #3b82f6;
            --accent-secondary: #8b5cf6;
            --border-color: rgba(255, 255, 255, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-primary);
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
            background: radial-gradient(circle at top left, #1e1b4b, #0f172a 40%, #020617);
        }

        /* Glassmorphism utility */
        .glass {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--border-color);
            border-radius: 16px;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 32px;
            z-index: 100;
            border-right: 1px solid var(--border-color);
            border-radius: 0 24px 24px 0;
            background: linear-gradient(180deg, rgba(30,41,59,0.9) 0%, rgba(15,23,42,0.9) 100%);
            backdrop-filter: blur(20px);
            transition: transform 0.3s ease;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #60a5fa, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .logo i {
            font-size: 1.8rem;
            -webkit-text-fill-color: #60a5fa;
        }

        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 14px 20px;
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(59, 130, 246, 0.1);
            color: var(--text-primary);
            transform: translateX(5px);
        }

        .nav-link.active {
            border-left: 4px solid var(--accent-primary);
            background: linear-gradient(90deg, rgba(59,130,246,0.2) 0%, transparent 100%);
        }

        .nav-link i {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Topbar */
        .topbar {
            height: 80px;
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 8px 16px;
            width: 300px;
            transition: all 0.3s ease;
        }

        .search-bar:focus-within {
            border-color: var(--accent-primary);
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }

        .search-bar i {
            color: var(--text-secondary);
            margin-right: 10px;
        }

        .search-bar input {
            background: transparent;
            border: none;
            color: var(--text-primary);
            outline: none;
            width: 100%;
            font-size: 0.95rem;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .notification {
            position: relative;
            cursor: pointer;
            color: var(--text-secondary);
            transition: color 0.3s ease;
        }

        .notification:hover {
            color: var(--text-primary);
        }

        .notification .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            font-size: 0.65rem;
            font-weight: 700;
            width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .profile-menu {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
        }

        .logout-btn {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-2px);
        }

        /* Dashboard Content */
        .content {
            padding: 40px;
            flex: 1;
        }

        .page-header {
            margin-bottom: 32px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            animation: fadeInDown 0.5s ease;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(to right, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .page-subtitle {
            color: var(--text-secondary);
            margin-top: 8px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .stat-card {
            padding: 24px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeInUp 0.5s ease;
            animation-fill-mode: both;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }

        .stat-icon {
            position: absolute;
            top: 24px;
            right: 24px;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .icon-blue { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
        .icon-purple { background: rgba(139, 92, 246, 0.1); color: #8b5cf6; }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 700;
            margin-top: 16px;
            margin-bottom: 8px;
        }

        .stat-label {
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 0.95rem;
        }

        /* Tables */
        .tables-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        @media (max-width: 1200px) {
            .tables-grid { grid-template-columns: 1fr; }
        }

        .table-container {
            padding: 24px;
            animation: fadeIn 0.8s ease;
            animation-fill-mode: both;
            animation-delay: 0.4s;
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .table-title {
            font-size: 1.2rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-action {
            color: var(--accent-primary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.3s;
        }

        .table-action:hover {
            color: #60a5fa;
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            min-width: 400px;
        }

        th {
            color: var(--text-secondary);
            font-weight: 500;
            padding: 12px 16px;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 0.95rem;
            white-space: nowrap;
        }

        tbody tr {
            transition: background 0.3s ease;
        }

        tbody tr:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-primary);
            flex-shrink: 0;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-active { background: rgba(16, 185, 129, 0.1); color: #10b981; }

        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar glass">
        <div class="logo">
            <i class="fa-solid fa-shield-halved"></i> Guard Admin
        </div>
        
        <nav class="nav-links" style="margin-top: 30px;">
            <a href="#" class="nav-link active">
                <i class="fa-solid fa-chart-pie"></i> Dashboard
            </a>
            <a href="#" class="nav-link">
                <i class="fa-solid fa-users"></i> Users
            </a>
            <a href="#" class="nav-link">
                <i class="fa-solid fa-user-tie"></i> Managers
            </a>
            <a href="#" class="nav-link">
                <i class="fa-solid fa-gear"></i> Settings
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Topbar -->
        <header class="topbar">
            <div class="search-bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search across dashboard...">
            </div>
            
            <div class="topbar-right">
                <div class="notification">
                    <i class="fa-regular fa-bell fa-lg"></i>
                    <span class="badge">3</span>
                </div>
                
                <div class="profile-menu">
                    <div class="avatar">A</div>
                    <div style="margin-right: 15px;">
                        <div style="font-weight: 600; font-size: 0.95rem;">Admin User</div>
                        <div style="color: var(--text-secondary); font-size: 0.8rem;">Administrator</div>
                    </div>
                </div>

                <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="content">
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
                        <a href="#" class="table-action">View All</a>
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
                        <a href="#" class="table-action">View All</a>
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
        </div>
    </main>

    <script>
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                if(this.getAttribute('href') === '#') {
                    e.preventDefault();
                    document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>