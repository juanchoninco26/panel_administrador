<?php
include '../../php/include/cargo.php';

$cargo = cargo();
echo "<h3>$cargo</h3>";

if ($nombre = $_SESSION['Nombre']) {
    echo "<p>$nombre</p>";
}
