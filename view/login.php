
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kely | Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
*{margin:0;padding:0;box-sizing:border-box}
body{
 font-family:'Inter',sans-serif;
 min-height:100vh;
 display:flex;
 justify-content:center;
 align-items:center;
 background:radial-gradient(circle at top,#1f2937,#020617);
 color:#fff
}
.login-card{
 width:380px;
 height:220px;
 position:relative;
 border-radius:22px;
 background:#0f172a;
 overflow:hidden;
 box-shadow:0 25px 60px rgba(0,0,0,.6);
 transition:height .7s cubic-bezier(.68,-0.55,.27,1.55)
}
/* borde animado */
.login-card::before{
 content:"";
 position:absolute;
 inset:0;
 padding:2px;
 border-radius:22px;
 background:linear-gradient(120deg,#22d3ee,#ec4899,#22d3ee);
 background-size:300% 300%;
 animation:borderGlow 6s linear infinite;
 -webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);
 -webkit-mask-composite:xor;
 mask-composite:exclude
}
@keyframes borderGlow{
 0%{background-position:0% 50%}
 50%{background-position:100% 50%}
 100%{background-position:0% 50%}
}
/* LOGIN inicial */
.login-button{
 height:100%;
 width:100%;
 background:none;
 border:none;
 color:#ec4899;
 font-size:26px;
 font-weight:600;
 letter-spacing:4px;
 cursor:pointer;
 transition:opacity .4s ease
}
/* formulario */
.login-form{
 position:absolute;
 inset:0;
 padding:32px 28px;
 display:flex;
 flex-direction:column;
 justify-content:center;
 opacity:0;
 pointer-events:none;
 transform:translateY(25px);
 transition:all .6s cubic-bezier(.68,-0.55,.27,1.55)
}
/* hover */
.login-card:hover{height:420px}
.login-card:hover .login-button{opacity:0}
.login-card:hover .login-form{
 opacity:1;
 pointer-events:auto;
 transform:translateY(0)
}
.form-title{
 text-align:center;
 color:#22d3ee;
 font-size:22px;
 margin-bottom:18px;
 letter-spacing:2px
}
label{font-size:13px;color:#cbd5f5;margin-bottom:6px;display:block}
input{
 width:100%;
 padding:12px 16px;
 border-radius:20px;
 border:1px solid #334155;
 background:#020617;
 color:#fff;
 margin-bottom:14px
}
input:focus{outline:none;border-color:#22d3ee;box-shadow:0 0 0 2px rgba(34,211,238,.3)}
.btn-signin{
 margin-top:10px;
 padding:12px;
 border-radius:22px;
 border:none;
 background:linear-gradient(135deg,#22d3ee,#3b82f6);
 font-weight:600;
 cursor:pointer
}
.btn-signin:hover{filter:brightness(1.15)}
.form-links{
 display:flex;
 justify-content:space-between;
 margin-top:12px;
 font-size:12px
}
.form-links a{color:#ec4899;text-decoration:none}
.form-links a:hover{text-decoration:underline}
.footer-note{
 position:absolute;
 bottom:14px;
 width:100%;
 text-align:center;
 font-size:11px;
 color:#94a3b8
}
</style>

  <script>
    const base_url = '<?= BASE_URL; ?>';
  </script>
</head>
<body>

  <div class="login-card" id="loginCard">

    <!-- LOGIN INICIAL -->
    <button class="login-button" id="loginToggle">LOGIN</button>

    <!-- FORMULARIO -->
    <div class="login-form" id="loginForm">
      <div class="form-title">LOGIN</div>

      <form id="frm_login">
        <label for="username">Usuario</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>

        <button type="button" class="btn-signin" onclick="iniciar_sesion();">Iniciar sesión</button>

        <div class="form-links">
          <a href="#">Forgot password</a>
          <a href="#">Sign up</a>
        </div>
      </form>
    </div>

    <div class="footer-note">© 2025 Kely — Seguridad y elegancia</div>
  </div>

  <script>
    const base_url = '<?= BASE_URL; ?>';

    const card = document.getElementById('loginCard');
    const toggle = document.getElementById('loginToggle');

    // Mobile & click support
    toggle.addEventListener('click', () => {
      card.classList.toggle('active');
    });

    // Close when clicking outside (mobile)
    document.addEventListener('click', e => {
      if (!card.contains(e.target)) {
        card.classList.remove('active');
      }
    });
  </script>

  <script src="<?= BASE_URL; ?>view/function/user.js"></script>
</body>
</html>

