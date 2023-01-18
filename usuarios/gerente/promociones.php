<?php include '../../php/puntos-turista-bd.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/estilos/menu.css" rel="stylesheet" type="text/css">
    <link href="/estilos/promociones.css" rel="stylesheet" type="text/css">
    <title>promociones</title>
</head>
<body>
<?php 
session_start();
if ($_SESSION['Id_cargo'] ==1){
?>

<?php include '../../php/include/menu.php';?>
<?php include '../../php/vista/promociones.php';?>

<?php } else{
    header('Location:/login.php'); 
} ?>

</body>
</html>