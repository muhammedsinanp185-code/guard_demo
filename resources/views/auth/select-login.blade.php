<!DOCTYPE html>
<html>
<head>
    <title>Select Login</title>
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
            max-width: 400px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            text-align: center;
            animation: fadeIn 0.6s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        h2 {
            margin-top: 0;
            font-weight: 600;
            font-size: 1.8rem;
        }
        p {
            color: #cbd5e1;
            margin-bottom: 30px;
        }
        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .btn {
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 1.05rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            color: white;
            display: block;
            width: 100%;
            box-sizing: border-box;
        }
        .btn-user {
            background: linear-gradient(90deg, #10b981, #047857);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
        .btn-admin {
            background: linear-gradient(90deg, #f43f5e, #be123c);
            box-shadow: 0 4px 15px rgba(244, 63, 94, 0.3);
        }
        .btn-manager {
            background: linear-gradient(90deg, #38bdf8, #2563eb);
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }
        .btn:hover {
            transform: translateY(-3px);
        }
        .btn-user:hover { box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5); }
        .btn-admin:hover { box-shadow: 0 6px 20px rgba(244, 63, 94, 0.5); }
        .btn-manager:hover { box-shadow: 0 6px 20px rgba(37, 99, 235, 0.5); }
    </style>
</head>
<body>
    <div class="container">
        <h2>Select Login Type</h2>
        <p>Choose your role to continue</p>
        <div class="btn-group">
            <a href="/user/login" class="btn btn-user">User Login</a>
            <a href="/admin/login" class="btn btn-admin">Admin Login</a>
            <a href="/manager/login" class="btn btn-manager">Manager Login</a>
        </div>
    </div>
</body>
</html>