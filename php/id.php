<?php 
session_start();
/*
 se optiene el id turista con ajax script de la funcion cargar dato
 que esta ubicado en php\vista\reservaciones.php

*/
$_SESSION['id-turista']=$_POST['id'];

$_SESSION['codigoDescuento']=$_POST['ed'];





?>