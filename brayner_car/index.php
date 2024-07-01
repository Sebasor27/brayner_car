<?php
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="button-group">
                <button type="button" onclick="login()">Entrar</button>
                <button type="button" onclick="register()">Registrarse</button>
            </div>
        </form>
    </div>

    <script>
        function login() {
            window.location.href = 'login.html';  // Aquí puedes poner la ruta a tu página de login
        }

        function register() {
            window.location.href = 'register.html';  // Aquí puedes poner la ruta a tu página de registro
        }
    </script>
</body>
</html>
