<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống QLSV</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/PMNM_68PM4_NgoThiAiNhi_0020868/public/css/style.css">
    <style>
        body { 
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 40px 32px;
            text-align: center;
        }
        .login-card h2 {
            margin-top: 0;
            margin-bottom: 8px;
            color: var(--primary-color);
            font-size: 1.75rem;
        }
        .login-card p {
            color: var(--text-muted);
            margin-bottom: 32px;
            font-size: 0.95rem;
        }
        .login-form {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="card login-card">
        <h2>Hệ thống QLSV</h2>
        <p>Vui lòng đăng nhập để tiếp tục</p>
        
        <form class="login-form" action="/PMNM_68PM4_NgoThiAiNhi_0020868/public/auth/login" method="POST">
            <div class="form-group">
                <label class="form-label">Tài khoản</label>
                <input type="text" name="username" class="form-control" placeholder="Nhập username..." required>
            </div>
            <div class="form-group" style="margin-bottom: 32px;">
                <label class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu..." required>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; font-size: 1rem;">Đăng nhập</button>
        </form>
    </div>
</body>
</html>