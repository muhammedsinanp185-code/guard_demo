<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
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
            padding: 50px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            text-align: center;
            animation: zoomIn 0.5s ease-out;
        }
        @keyframes zoomIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        .role-badge {
            display: inline-block;
            padding: 6px 15px;
            background: rgba(16, 185, 129, 0.2);
            color: #10b981;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        h1 { margin-top: 0; font-weight: 600; font-size: 2.2rem; }
        p { color: #cbd5e1; font-size: 1.1rem; margin-bottom: 40px; }
        .btn {
            padding: 12px 30px;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: white;
            background: transparent;
        }
        .btn:hover {
            background: white;
            color: #0f2027;
        }
    </style>
</head>
<body>
    <div class="container">
        <span class="role-badge">User</span>
        <h1>User Dashboard</h1>
        <p>You have successfully logged into your account.</p>
        <a href="/" class="btn">Logout / Home</a>
    </div>
</body>
</html>