<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kely</title>
</head>
<style>
    body {
        background-color: khaki;
    }

    .container {
        background-color: #fdc3f7;
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 10px;
    }
</style>
<script>
    const base_url = '<?= BASE_URL;?>';
</script>

<body>
    <div class="container">
        <center>
            <img src="https://i.pinimg.com/originals/e7/2e/1b/e72e1b76a864b49d49995b1294ba529e.gif" alt="100PX" height="100PX">
            <br>
            <form id="frm_login">
                <br>
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" required>
                <br>
                <br>
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
                <br>
                <br>
                <button type="button" style="background-color:rgb(151, 196, 244);" onclick="iniciar_secion();"> Iniciar sesión </button>
            </form>
        </center>
    </div>
    <script src="<?= BASE_URL; ?>view/function/user.js"></script>
</body>

</html>