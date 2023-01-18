<?php
include '../../php/puntos-turista-bd.php';


$busqueda = isset($_GET['buscarUsuario']);

//hacemos la consulta para la lista de crear usuario y mostrarlo
$crear_usuario = "WHERE Nombre LIKE '%" . $busqueda . "%'";

$consult = $consult = "SELECT Nombre,Id_empleado FROM empleados $crear_usuario ORDER BY Nombre ASC";

$author = array();
$error = ['data' => false ];

$getAutor = $ared->query($consult);
if ($getAutor->num_rows > 0) {
    while ($data = $getAutor->fetch_assoc()) {
        $author[] = $data;
    }
    echo json_encode($author);
} else {
    json_last_error($error);
}