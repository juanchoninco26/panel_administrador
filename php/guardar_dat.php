<?php
include '../php/puntos-turista-bd.php';
include '../php/include/cargo.php';
session_start();
//ver video:https://www.youtube.com/watch?v=pn2v9lPakHQ


/* reservaciones:reservas pendientes */
/************************************/
if (isset($_POST['reprogramar'])) {
    $reprogramar = $_POST['reprogramar'];
    $reserva = $_POST['reserva'];

    $lista = "UPDATE reservas SET reprogramar='$reprogramar' WHERE id_turista	 = '" . $_SESSION['id-turista'] . "'";
    $resultado = mysqli_query($ared, $lista) or die("error:" . mysqli_error($ared));

    if ($resultado) {
        if ($_SESSION['Id_cargo'] == 1) {
            header('Location: /usuarios/gerente/reservaciones.php');
        }
        if ($_SESSION['Id_cargo'] == 2) {
            header('Location: /usuarios/asesor/reservaciones.php');
        }
        if ($_SESSION['Id_cargo'] == 3) {
            header('Location: /usuarios/contador/reservaciones.php');
        }
    } else {
        echo 'mal';
    }
}
if (isset($_POST['click'])) {
    $lista = "UPDATE reservas SET reprogramar='$reprogramar' WHERE id_reservas = '$reserva'";
    $resultado = mysqli_query($ared, $lista) or die("error:" . mysqli_error($ared));
}

//guardar: editar sitios 
/************************************/

if (isset($_POST['editar-sitios'])) {
    $nombre =$ared->real_escape_string($_POST['nombre']);
    $desc1 = $ared->real_escape_string($_POST['desc-corta']);
    $desc2 = $ared->real_escape_string($_POST['desc-larga']);
    $punto = $ared->real_escape_string($_POST['Punto_lugar']);
    $precio = $ared->real_escape_string ($_POST['precio']);
    $ubicacion = $ared->real_escape_string($_POST['ubicacion']);

    //insertar datos en la tabla
    $lista = "INSERT INTO lugares_turisticos (Cod_lugar_turistico, Nombre, Descripcion_corta , Descripcion_larga , Precio, Ubicacion , Punto_lugar , Id_turista) 
    VALUES (NULL,'$nombre','$desc1','$desc2','$precio',/*POINT ''*/NULL,'$punto',NULL)";
    $resultado = mysqli_query($ared, $lista) or die("error:" . mysqli_error($ared));

    //comprobamos que el resulatado sea correcto para recargar la pagina con header 
    if ($resultado) {
        if ($_SESSION['Id_cargo'] == 1) {
            header('Location: /usuarios/gerente/editar-sitios.php');
        }
        if ($_SESSION['Id_cargo'] == 2) {
            header('Location: /usuarios/asesor/editar-sitios.php');
        }
        if ($_SESSION['Id_cargo'] == 3) {
            header('Location: /usuarios/contador/editar-sitios.php');
        }
    } else {
        echo 'mal';
    }
    mysqli_close($ared);
}

//guardar: editar sitios -> editar paquetes
/************************************/

if (isset($_POST['paquetes'])) {
    $id = $_POST['id'];
    $nombre = $ared->real_escape_string($_POST['nombre']);
    $rutas = $ared->real_escape_string($_POST['rutas']);
    $costo = $ared->real_escape_string($_POST['precio']);
    $descripcion = $ared->real_escape_string($_POST['descripcion']);
    $puntos = $ared->real_escape_string($_POST['puntos']);

    $lista = "UPDATE paquetes_turisticos SET Nombre='$nombre', Rutas='$rutas', Costo='$costo',Descripcion='$descripcion',Punto_paquete='$puntos' WHERE Cod_paquete='$id'";
    $resultado = mysqli_query($ared, $lista) or die("error:" . mysqli_error($ared));
    if ($resultado) {
        header('Location: /php/vista/editar-paquete-turista.php');
    }
}

if (isset($_POST['link'])) {
    header('Location: /php/vista/editar-paquete-turista.php');
}

if (isset($_POST['volverSitios'])) {
    switch ($_SESSION['Id_cargo']) {
        case 1:
            header("Location:/usuarios/gerente/editar-sitios.php");
            break;
        case 2:
            header("Location:/usuarios/asesor/editar-sitios.php");
            break;
        default:
            header('Location:/login.php');
            break;
    }
}

//guardar:promociones
/************************************/

if (isset($_POST['promociones'])) {

    $Titulo = $ared->real_escape_string($_POST['titulo']);
    $Descripcion_corta = $ared->real_escape_string($_POST['desc-corta']);
    $Descripcion_larga = $ared->real_escape_string($_POST['desc-larga']);
    $Rutas = $ared->real_escape_string($_POST['rutas']);
    $fotografia = $_POST['foto'];
    $Porcentaje_descuento = $ared->real_escape_string($_POST['%desc']);

    $file = $_FILES['foto'];
    $name = $file['name'];
    $tipo = $file['type'];
    $tamano = $file['size'];
    $ruta = $file["tmp_name"];
    $dimension = getimagesize($ruta);
    $width = $dimension[0];
    $height = $dimension[1];
    $carpeta = "../imagenes";
    $carpeta2 = "/imagenes";
    if ($tipo != "image/jpg" && $tipo != "image/JPG" && $tipo != "image/jpeg" && $tipo != "image/png") {
        echo "el archivo subido no es una foto";
    } else if ($tamano > 3 * 1024 * 1024) {
        echo "el tamaño debe ser menor a 3MB";
    } else {
        $src = "$carpeta/$name";
        move_uploaded_file($ruta, $src);
        $fotografia = "$carpeta2/$name";
    }

    $lista = "INSERT INTO promociones(Id_promocion, Titulo, Descripcion_corta, Descripcion_larga, Fotografia_referencia, Rutas, Foto, Id_empleado, id_turista, porcentaje) 
    VALUES(NULL,'$Titulo','$Descripcion_corta','$Descripcion_larga','$fotografia','$Rutas',NULL,NULL,NULL,'$Porcentaje_descuento')";
    $resultado = mysqli_query($ared, $lista) or die("error:" . mysqli_error($ared));

    if ($resultado) {
        if ($_SESSION['Id_cargo'] == 1) {
            header('Location: /usuarios/gerente/promociones.php');
        }
        if ($_SESSION['Id_cargo'] == 2) {
            header('Location: /usuarios/asesor/promociones.php');
        }
        if ($_SESSION['Id_cargo'] == 3) {
            header('Location: /usuarios/contador/promociones.php');
        }
    } else {
        echo "mal";
    }
}

//guardar:puntos turista
/************************************/

if (isset($_POST['guardar_punt'])) {
    $turista = $ared->real_escape_string($_POST['usuario']);
    $puntos = $ared->real_escape_string($_POST['puntos']);
    $desc = $ared->real_escape_string($_POST['desc']);
    $acom = $ared->real_escape_string($_POST['acom']);
    $empleado = "1056702531";


    //insertar datos en la tabla generarpuntos
    $lista = "INSERT INTO generarpuntos(Cod_descuento,Id_turista,Cantidad,Id_empleado,puntos_manualmente) 
    VALUES ('$desc','$turista','$acom','$empleado','$puntos')";
    $resultado = mysqli_query($ared, $lista) or die("error:" . mysqli_error($ared));

    //comprobamos que el resulatado sea correcto para recargar la pagina con header 
    if ($resultado) {
        if ($_SESSION['Id_cargo'] == 1) {
            header('Location: /usuarios/gerente/puntos-turista.php');
        }
        if ($_SESSION['Id_cargo'] == 2) {
            header('Location: /usuarios/asesor/puntos-turista.php');
        }
        if ($_SESSION['Id_cargo'] == 3) {
            header('Location: /usuarios/contador/puntos-turista.php');
        }
    } else {
        echo 'mal';
    }
}

//guardar:crear usuario
/************************************/

if (isset($_POST['crear_usuario'])) {
    $nombre = $ared->real_escape_string($_POST['nombre']);
    $contraseña = $ared->real_escape_string($_POST['contraseña']);
    $nacimiento = $ared->real_escape_string($_POST['edad']);
    $telefono = $ared->real_escape_string($_POST['telefono']);
    $cargo = $ared->real_escape_string($_POST['cargo']);
    $fotografia = "";

    if (isset($_FILES['foto'])) {
        //como subir foto al servidor: https://www.youtube.com/watch?v=zFqOFTTQs20
        $file = $_FILES['foto'];
        $name = $file['name'];
        $tipo = $file['type'];
        $tamano = $file['size'];
        $ruta = $file["tmp_name"];
        $dimension = getimagesize($ruta);
        $width = $dimension[0];
        $height = $dimension[1];
        $carpeta = "../avatar";
        $carpeta2 = "/avatar";
        if ($tipo != "image/jpg" && $tipo != "image/JPG" && $tipo != "image/jpeg" && $tipo != "image/png") {
            echo "el archivo subido no es una foto";
        } else if ($tamano > 3 * 1024 * 1024) {
            echo "el tamaño debe ser menor a 3MB";
        } else {
            $src = "$carpeta/$name";
            move_uploaded_file($ruta, $src);
            $fotografia = "$carpeta2/$name";
        }
    }

    $lista = "INSERT INTO empleados(Id_empleado, Nombre, Contraseña, Fecha_nacimiento, Telefono, Fotografia, Id_cargo) 
    VALUES ('', '$nombre', '$contraseña', '$nacimiento', '$telefono', '$fotografia', '$cargo')";
    $resultado = mysqli_query($ared, $lista) or die("error: " . mysqli_error($ared));

    if ($resultado) {
        $nombre1 = $_SESSION['Nombre'];
        $consulta = "SELECT *FROM empleados where Nombre='$nombre1'";
        $cons = mysqli_query($ared, $consulta);
        $rows = mysqli_fetch_array($cons);
        if ($rows['Id_cargo'] == 1) {
            header('Location: /usuarios/gerente/crear-usuario.php');
        }
        if ($rows['Id_cargo'] == 2) {
            header('Location: /usuarios/asesor/crear-usuario.php');
        }
        if ($rows['Id_cargo'] == 3) {
            header('Location: /usuarios/contador/crear-usuario.php');
        }
    }
}

//editar perfil
/************************************/

if (isset($_POST['editar_perfil'])) {
    $nombre = $ared->real_escape_string($_POST['nombre']);
    $cedula = $ared->real_escape_string($_POST['cedula']);
    $contraseña = $ared->real_escape_string($_POST['contraseña']);
    $contraseña2 = $ared->real_escape_string($_POST['repcontraseña']);
    $fecha = $ared->real_escape_string($_POST['edad']);
    $telefono = $ared->real_escape_string($_POST['telefono']);
    $correo = $ared->real_escape_string($_POST['correo']);
    $fotografia = $_POST['foto'];
    //youtube.com/watch?v=Ct6K4wRjlQQ

    //como subir foto al servidor: https://www.youtube.com/watch?v=zFqOFTTQs20
    $file = $_FILES['foto'];
    $name = $file['name'];
    $tipo = $file['type'];
    $tamano = $file['size'];
    $ruta = $file["tmp_name"];
    $dimension = getimagesize($ruta);
    $width = $dimension[0];
    $height = $dimension[1];
    $carpeta = "../avatar";
    $carpeta2 = "/avatar";
    if ($tipo != "image/jpg" && $tipo != "image/JPG" && $tipo != "image/jpeg" && $tipo != "image/png") {
        echo "el archivo subido no es una foto";
    } else if ($tamano > 3 * 1024 * 1024) {
        echo "el tamaño debe ser menor a 3MB";
    } else {
        $src = "$carpeta/$name";
        move_uploaded_file($ruta, $src);
        $fotografia = "$carpeta2/$name";
    }
    //si no existe $fotografia queda como estaba 
    if (empty($fotografia)) {
        $nombre1 = $_SESSION['Nombre'];
        $lista = "UPDATE empleados SET Nombre = '$nombre', Contraseña=Contraseña, Fecha_nacimiento='$fecha', Telefono='$telefono', Fotografia=Fotografia, correo='$correo' WHERE  Id_empleado = '$cedula'";
        $resultado = mysqli_query($ared, $lista) or die("error: " . mysqli_error($ared));

        if ($resultado) {
            session_unset();
            session_destroy();
            header("location:/login.php");
        } else {
            echo "error" . mysqli_error($ared);
        }
    };

    //si existe la fotografia se guarda en el servidor
    if ($fotografia) {
        $nombre1 = $_SESSION['Nombre'];
        $lista = "UPDATE empleados SET Nombre = '$nombre', Contraseña=Contraseña, Fecha_nacimiento='$fecha', Telefono='$telefono', Fotografia='$fotografia', correo='$correo' WHERE  Id_empleado = '$cedula'";
        $resultado = mysqli_query($ared, $lista) or die("error: " . mysqli_error($ared));

        if($resultado){
            //la funcion se encuentra en cargo.php
            //la funcion redirecciona por cargo
            linkPorCargo();
        }
    }

    $hash_contraseña=password_hash($contraseña,PASSWORD_BCRYPT);

    if (empty($contraseña) and empty($contraseña2)) {
        $nombre1 = $_SESSION['Nombre'];
        $lista = "UPDATE empleados SET Nombre = '$nombre', Contraseña=Contraseña, Fecha_nacimiento='$fecha', Telefono='$telefono', Fotografia=Fotografia, correo='$correo' WHERE  Id_empleado = '$cedula'";
        $resultado = mysqli_query($ared, $lista) or die("error: " . mysqli_error($ared));
        $row=mysqli_fetch_array($resultado);

        if($resultado){
            //la funcion se encuentra en cargo.php
            //la funcion redirecciona por cargo
            linkPorCargo();
        }

    }elseif($contraseña!==$contraseña2){
        $nombre1 = $_SESSION['Nombre'];
        $consulta = "SELECT *FROM empleados where Nombre='$nombre1'";
        $cons = mysqli_query($ared, $consulta);

        if ($cons) {
            //la funcion se encuentra en cargo.php
            //la funcion redirecciona por cargo
            linkPorCargo();
        }

    } else {
        $nombre1 = $_SESSION['Nombre'];
        $lista = "UPDATE empleados SET Nombre = '$nombre', Contraseña='$hash_contraseña', Fecha_nacimiento='$fecha', Telefono='$telefono', Fotografia='$fotografia', correo='$correo' WHERE  Id_empleado = '$cedula'";
        $resultado = mysqli_query($ared, $lista) or die("error: " . mysqli_error($ared));

        if ($resultado) {
            //la funcion se encuentra en cargo.php
            //la funcion redirecciona por cargo
            linkPorCargo();
        }


    }
}


