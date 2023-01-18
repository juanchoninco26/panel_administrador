<?php include './php/puntos-turista-bd.php';

//eliminar paquete
if (isset($_GET['Cod_paquete'])) {
    $id=$_GET['Cod_paquete'];

    $elim= "DELETE FROM paquetes_turisticos  WHERE Cod_paquete ='$cod'";
    $resultado = mysqli_query($ared,$elim)or die("error:". mysqli_error($ared));

    header('Location: ../PaginaPrincipal/Pago.php');
    }  
     else {
        echo "mal";
    }


?>