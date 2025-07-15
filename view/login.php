
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kely - Iniciar Sesión</title>
    <style>
        body {
            background: linear-gradient(to bottom right, khaki, #ffe9c6);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .container {
            background-color: #fdc3f7;
            width: 100%;
            max-width: 420px;
            padding: 35px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .container img {
            height: 100px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .container h2 {
            font-size: 26px;
            color: #2c63eb;
            margin-bottom: 15px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
            text-align: left;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #7f45b2;
            box-shadow: 0 0 5px rgba(127, 69, 178, 0.3);
        }

        button {
            margin-top: 25px;
            padding: 12px 25px;
            background-color: rgb(151, 196, 244);
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
            font-size: 15px;
            color: #fff;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: rgb(130, 176, 230);
            transform: scale(1.03);
        }
    </style>
    <script>
        const base_url = '<?= BASE_URL; ?>';
    </script>
</head>

<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <img src="https://i.pinimg.com/originals/e7/2e/1b/e72e1b76a864b49d49995b1294ba529e.gif" alt="Logo de Kely">
        <form id="frm_login">
            <label for="username">Usuario</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>

            <button type="button" onclick="iniciar_secion();">Iniciar sesión</button>
        </form>
    </div>

    <script src="<?= BASE_URL; ?>view/function/user.js"></script>
</body>

</html>

