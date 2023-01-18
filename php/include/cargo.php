<?php

//muestra los cargos que hay en la BD
//se llama desde el index
function cargo(){
    include '../../php/puntos-turista-bd.php';

    //se redireccionara al susario segun su cargo 
    $nombre1 = $_SESSION['Nombre'];
    $consulta = "SELECT *FROM empleados where Nombre='$nombre1'";
    $cons = mysqli_query($ared, $consulta);
    $rows = mysqli_fetch_array($cons);
    if ($rows['Id_cargo'] == 1) {
        echo "Gerente";
        $respuesta="gerente";
        json_encode($respuesta);
    }
    if ($rows['Id_cargo'] == 2) {
        echo "Asesor";
        $respuesta="gerente";
        json_encode($respuesta);
    }
    if ($rows['Id_cargo'] == 3) {
        echo "Contador";
        $respuesta="gerente";
        json_encode($respuesta);
    }
}

function linkPorCargo(){
    include '../php/puntos-turista-bd.php';
    
    //despues del inicio de secion se redireccionara a los usuarios del admin
    $nombre1= $_SESSION['Nombre'];
    $consulta="SELECT Nombre,Id_cargo FROM empleados WHERE Nombre='$nombre1'";
    $resultado= mysqli_query($ared,$consulta) or die(mysqli_error($ared));
    $row=mysqli_fetch_array($resultado);

    //se redireccionara al susario segun su cargo 
    if ($row['Id_cargo'] == 1) {
        header('Location:/usuarios/gerente/editar-perfil.php');
    }
    if ($row['Id_cargo'] == 2) {
        header('Location:/usuarios/asesor/editar-perfil.php');
    }
    if ($row['Id_cargo'] == 3) {
        header('Location:/usuarios/contador/editar-perfil.php');
    }
}

function mensaje(){
    //sesiones de login2.php
    //mensaje: login administradores 
    $A =isset($_SESSION['mensaje'])==1 ? 'Usuario o Contraseña Incorrecta':'';
    echo $A;

    //cerrar el mensaje al recargar
    session_destroy();

}

?>