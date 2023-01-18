<?php
include 'php/puntos-turista-bd.php';
//api para ver en el calendario los datos de la bd
if(isset($_GET['datos'])==1){
$query = "SELECT * FROM reservas";
$resultado = mysqli_query($ared, $query);
while ($lista = mysqli_fetch_array($resultado)) {
    $objet= new stdClass(); 

    $objet->title=$lista['id_turista'];
    $objet->start=$lista['reprogramar'];
    $objet->color='#257e4a';

    echo json_encode($objet);
}
}

?>