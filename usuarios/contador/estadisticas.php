<?php include '../../php/puntos-turista-bd.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/estilos/menu.css" rel="stylesheet" type="text/css">
    <link href="/estilos/estadisticas.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>estadisticas</title>
</head>
<body>
<?php 
session_start();
if ($_SESSION['Id_cargo'] ==3 ){
?>
    <?php  
    include '../../php/include/menu-contador.php';
    ?>
    <?php  
    include '../../php/vista/estadisticas.php';
    ?>
<?php } else{
    header('Location:/login.php'); 
} ?>
</body>
</html>