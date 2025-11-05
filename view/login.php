<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Kely</title>
    <!-- Bootstrap CSS -->
    <link href="<?= BASE_URL ?>programacion_aplicaciones/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6e45e2, #88d3ce);
            --card-bg: rgba(255, 255, 255, 0.95);
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            --border-radius: 20px;
        }

        body {
            background: var(--primary-gradient);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .login-card {
            background-color: var(--card-bg);
            width: 100%;
            max-width: 400px;
            padding: 35px 30px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .avatar {
            width: 80px;
            height: 80px;
            background: #e0e0e0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: #888;
            font-size: 2rem;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px 12px 45px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #6e45e2;
            box-shadow: 0 0 5px rgba(110, 69, 226, 0.3);
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0;
            font-size: 0.875rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-me input[type="checkbox"] {
            margin-right: 8px;
        }

        .forgot-password {
            color: #6e45e2;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #6e45e2, #88d3ce);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 15px;
            color: white;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #5a3abf, #7ac7c4);
            transform: scale(1.03);
        }

        .alert {
            margin-top: 15px;
            display: none;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="avatar">
            <i class="bi bi-person-fill"></i>
        </div>
        <h2 class="mb-4">Iniciar Sesión</h2>

        <!-- Mensaje de error/success -->
        <div id="msgAlert" class="alert alert-danger" role="alert"></div>

        <form id="frm_login">
            <div class="form-group">
                <span class="input-icon"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" id="username" name="username" placeholder="Email ID" required>
            </div>
            <div class="form-group">
                <span class="input-icon"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="remember-forgot">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="#" class="forgot-password">Forgot Password?</a>
            </div>
            <button type="button" class="btn-login" onclick="iniciar_sesion();">LOGIN</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="<?= BASE_URL ?>programacion_aplicaciones/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Script de login -->
    <script src="<?= BASE_URL ?>view/function/user.js"></script>
</body>

</html>