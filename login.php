<?php
include __DIR__ . '/php/puntos-turista-bd.php';
include __DIR__ . '/php/include/cargo.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link href="estilos/login.css" rel="stylesheet" type="text/css">
    <title>login</title>
</head>

<body>
    <!--video ejemplo: https://www.youtube.com/watch?v=GHdOSI9hQvc-->
    <div class="caja">
        <div>
            <div class="raya"></div>
            <div class="letra">
                <h1>Espacio exclusivo para <strong>trabajadores</strong></h1>
            </div>
        </div>
        <div class="contenedor">
            <div class="centrar">
                <div class="img-centro">
                    <img src="avatar/logo-360.png">
                </div>
                <form class="formulario" action="../php/login2.php" method="POST">
                    <div class="letra2">
                        <h1>INICIAR SESIÓN</h1>
                    </div>
                    <div class="user">
                        <h2>usuario</h2>
                        <input type="text" pattern="[A-Z,a-z,0-9_-*]{1,15}" required placeholder="" name="username">
                    </div>
                    <div class="password">
                        <h2>contraseña</h2>
                        <input type="password" pattern="[A-Z,a-z,0-9_-*]{1,15}" required placeholder="" name="password">
                    </div>
                    <div class="mensaje">
                        <?php
                        //funcion en cargo.php
                        mensaje();
                        ?>
                    </div>
                    <button type="submit" class="login" name="loguin"><a>Login</a></button>
                </form>
                <script></script>
            </div>
        </div>
    </div>
</body>

</html>