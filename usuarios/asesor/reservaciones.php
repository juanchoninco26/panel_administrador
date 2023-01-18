<?php include '../../php/puntos-turista-bd.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/estilos/menu.css" rel="stylesheet" type="text/css">
    <link href="/estilos/reservaciones.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src='/fullcalendar/dist/index.global.js'></script>
    <script src="fullcalendar/packages/core/locales/es-us.global.js"></script>

    <title>reservaciones</title>
</head>
<body>
    <?php
    session_start();
    if ($_SESSION['Id_cargo'] == 2) {
    ?>
        <?php include '../../php/include/menu-asesor.php'; ?>
        <?php include '../../php/vista/reservaciones.php'; ?>
    <?php } else {
        header('Location:/login.php');;
    } ?>
</body>

</html>