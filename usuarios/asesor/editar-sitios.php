<?php include '../../php/puntos-turista-bd.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/estilos/menu.css" rel="stylesheet" type="text/css">
    <link href="/estilos/editar_sitios.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/4aa94af17d.js" crossorigin="anonymous"></script>

    <title>editar sitios</title>
</head>
<body>
<?php 
session_start();
if ($_SESSION['Id_cargo'] ==2){
?>
<?php include '../../php/include/menu-asesor.php'?>
<?php 
    include '../../php/vista/editar-sitios.php';?>
<?php } else{
    header('Location:/login.php'); 
} ?>
</body>
</html>