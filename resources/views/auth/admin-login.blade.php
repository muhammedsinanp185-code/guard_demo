<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            animation: slideUp 0.5s ease-out;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .role-badge {
            display: inline-block;
            padding: 5px 12px;
            background: rgba(244, 63, 94, 0.2);
            color: #f43f5e;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        h2 { margin-top: 0; font-weight: 600; text-align: center; margin-bottom: 25px; }
        .error {
            color: #fca5a5;
            background: rgba(248, 113, 113, 0.2);
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            text-align: center;
        }
        form { display: flex; flex-direction: column; }
        label { margin-bottom: 8px; font-size: 0.9rem; color: #cbd5e1; }
        input {
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            border-radius: 8px;
            outline: none;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }
        input:focus {
            border-color: #f43f5e;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 3px rgba(244, 63, 94, 0.2);
        }
        .btn {
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            width: 100%;
            background: linear-gradient(90deg, #f43f5e, #be123c);
            color: white;
            box-shadow: 0 4px 15px rgba(244, 63, 94, 0.3);
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(244, 63, 94, 0.5);
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s;
        }
        .back-link:hover { color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div style="text-align: center;"><span class="role-badge">Administrator</span></div>
        <h2>Admin Portal</h2>
        
        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
        @endif

        <form method="POST" action="/admin/login">
            @csrf
            <label>Admin Email</label>
            <input type="email" name="email" required placeholder="admin@company.com">
            
            <label>Security Key (Password)</label>
            <input type="password" name="password" required placeholder="••••••••">
            
            <button type="submit" class="btn">Access Dashboard</button>
        </form>
        
        <a href="/login" class="back-link">← Back to selection</a>
    </div>
</body>
</html>