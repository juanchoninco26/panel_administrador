<?php 
include '../php/puntos-turista-bd.php';
session_start();
//eliminar: editar sitios 
if (isset($_GET['Cod_lugar_turistico'])){
    $id=$_GET['Cod_lugar_turistico'];
    
    $query ="DELETE FROM lugares_turisticos WHERE  Cod_lugar_turistico='$id'";
    $resultado = mysqli_query($ared,$query) or die("error:". mysqli_error($ared));
    
    if ($ared-> query($query)==true) {
        /*header( "refresh: /usuarios/gerente/editar-sitios.php" );*/ 
        if($_SESSION['Id_cargo'] ==1){
            header('Location: /usuarios/gerente/editar-sitios.php');
        }
        if($_SESSION['Id_cargo'] ==2){
            header('Location: /usuarios/asesor/editar-sitios.php');
        }
        if($_SESSION['Id_cargo'] ==3){
            header('Location: /usuarios/contador/editar-sitios.php');
        }
    } else {
       die('error:'. $ared ->error);
    }
}

//editar paquete turista
if(isset($_GET['Cod_paquete'])){
    $id=$_GET['Cod_paquete'];

    $elim="DELETE FROM paquetes_turisticos WHERE Cod_paquete = '$id'";
    $resultado=mysqli_query($ared,$elim);
    if($resultado){
        header('Location: /php/vista/editar-paquete-turista.php'); 
    }
}

// eliminar: crear usuario
if(isset($_GET['Id_empleado'])){
        $id=$_GET['Id_empleado'];
    
        $elim="DELETE FROM empleados WHERE Id_empleado = '$id'";
        $resultado = mysqli_query($ared,$elim);
    
        if ($resultado) {
            if($_SESSION['Id_cargo'] ==1){
                header('Location: /usuarios/gerente/crear-usuario.php');   
            }
            if($_SESSION['Id_cargo'] ==2){
                header('Location: /usuarios/asesor/crear-usuario.php');   
            }
            if($_SESSION['Id_cargo'] ==3){
                header('Location: /usuarios/contador/crear-usuario.php');   
            }
        }
        else{
            echo "error";
        }
}

//eliminar: promociones
if (isset($_GET['Id_promocion'])) {
    $id=$_GET['Id_promocion'];

    $elim= "DELETE FROM promociones WHERE Id_promocion ='$id'";
    $resultado = mysqli_query($ared,$elim)or die("error:". mysqli_error($ared));

    if ($resultado) {
        //echo "bien";
        if($_SESSION['Id_cargo'] ==1){
            header('Location: /usuarios/gerente/promociones.php');
        }
        if($_SESSION['Id_cargo'] ==2){
            header('Location: /usuarios/asesor/promociones.php');
        }
        if($_SESSION['Id_cargo'] ==3){
            header('Location: /usuarios/contador/promociones.php');
        }
    }else {
        echo "mal";
    }
}
?>