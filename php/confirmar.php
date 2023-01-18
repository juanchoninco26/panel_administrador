<?php 
include '../php/puntos-turista-bd.php';
session_start();

//reservaciones:confirmar
if (isset($_GET['confirmar'])){
    $id=$_GET['confirmar'];
    
        $confirmar=1;
        $reservas=$_SESSION['id-turista'];
        $query ="UPDATE reservas SET confirmar='$confirmar' WHERE id_turista='$reservas'";
        $resultado = mysqli_query($ared,$query) or die("error:". mysqli_error($ared));

        if ($ared-> query($query)==true) {
            if ($_SESSION['Id_cargo'] ==1){
                header('Location: /usuarios/gerente/reservaciones.php');
            }
            if ($_SESSION['Id_cargo'] ==2){
                header('Location: /usuarios/asesor/reservaciones.php');
            }
            if ($_SESSION['Id_cargo'] ==3){
                header('Location: /usuarios/contador/reservaciones.php');
            }
        } else {
           die('error:'. $ared ->error);
        }
}

//editar paquete turista
if(isset($_GET['Cod_paquete'])){
    $id=$_GET['Cod_paquete'];
    $id_turista=$_SESSION['id_turist'];
    //$query="UPDATE paquetes_turisticos SET Id_turista='$id_turista'WHERE  Cod_paquete='$id'";
    $consult = "SELECT * FROM paquetes_turisticos WHERE Cod_paquete='$id'";
    $resultado=mysqli_query($ared,$consult);
    if ($resultado) {
        while($ver=mysqli_fetch_array($resultado)){
            $_SESSION['paquetestur']=$ver['Cod_paquete'];
            $_SESSION['paquetestur2']=$ver['Nombre'];
            $_SESSION['paquetestur3']=$ver['Rutas'];
            $_SESSION['paquetestur4']=$ver['Costo'];
            $_SESSION['paquetestur5']=$ver['Punto_paquete'];
            $_SESSION['paquetestur6']=$ver['Descripcion'];
            header('Location:/php/vista/editar-turista.php');
        }
    }
    
}

//reprogramar 
if (isset($_GET['reprogramar'])){
    $id=$_GET['reprogramar'];
    $query ="DELETE FROM reservas WHERE  reprogramar='$id'";
    $resultado = mysqli_query($ared,$query) or die("error:". mysqli_error($ared));
    
    if ($ared-> query($query)==true) {
        if ($_SESSION['Id_cargo'] ==1){
            header('Location: /usuarios/gerente/reservaciones.php');
        }
        if ($_SESSION['Id_cargo'] ==2){
            header('Location: /usuarios/asesor/reservaciones.php');
        }
        if ($_SESSION['Id_cargo'] ==3){
            header('Location: /usuarios/contador/reservaciones.php');
        }
    } else {
       die('error:'. $ared ->error);
    }
    //puntos: user-externo 
    if (isset($_POST['Enviar'])){
        $sitios=$_POST['sitio'];
        $paquete=$_POST['paquetes'];
    }
}

?>