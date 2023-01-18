<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos/editar-turista.css">
    <title>Document</title>
</head>

<body>
    <div class="formul">
        <form action="/php/guardar_dat.php" method="post">
            <div class="div">
                <div class="subcajaUno">
                    <input type="hidden" name="id" value="<?php print_r($_SESSION['paquetestur']); ?>"> 
                    <p>Nombre: <input class="input" type="text" name="nombre" value="<?php print_r($_SESSION['paquetestur2']); ?>"></p>
                    <p>Rutas: <input class="input" type="text" name="rutas" value="<?php print_r($_SESSION['paquetestur3']); ?>"></p>
                    <p>Precio: <input class="input" type="text" name="precio" value="<?php print_r($_SESSION['paquetestur4']); ?>"></p>
                    <p>Punto paquete: <input class="input" type="text" name="puntos" value="<?php print_r($_SESSION['paquetestur5']); ?>"></p>
                    <p>Descripción:</p>
                    <textarea class="textarea" name="descripcion" id="" cols="30" rows="10" placeholder=""><?php print_r($_SESSION['paquetestur6']); ?></textarea>
                </div>
                <div class="boton_">
                    <input class="boton" type="submit" value="Editar" name="paquetes">
                    <input class="boton2" type="submit" value="volver" name="link">
                    <?php ///php/vista/editar-paquete-turista.php?>
                    
                </div>
            </div>
        </form>
    </div>
</body>

</html>