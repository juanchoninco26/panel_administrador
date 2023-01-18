<?php 
//ver video:https://www.youtube.com/watch?v=pn2v9lPakHQ
$ared = new mysqli(
    "localhost", //link
    "root",      //usuario
    "",          //contraseña
    "ared",      //base de datos
    2526         //puerto
);

$ared -> set_charset ("utf8");

if (!isset($ared)){
    echo 'no se puede realizar la conexion';
}

ob_start();
?>