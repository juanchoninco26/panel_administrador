<?php
include '../../php/puntos-turista-bd.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../estilos/editar-paquete-turista.css" rel="stylesheet" type="text/css">
    <title>Editar paquete</title>
</head>

<body>
    <?php
    session_start();
    if ($_SESSION['Id_cargo'] == 1 or $_SESSION['Id_cargo'] == 2) {
    ?>
        <div class="volver">
            <form action="/php/guardar_dat.php" method="POST">
                <input type="submit" value="volver" name="volverSitios">
            </form>
            <div class="agregar">
                <div onclick="desplegar_paquete()">agregar</div>
            </div>
        </div>
        <div class="displayCaja" id="cajaInicial">
            <form class="formulario" action="/php/guardar_dat.php" method="post">
                <div class="div">
                    <div class="subcajaUno">
                        <div class="contenido">
                            <label for="nombre">Nombre:</label>
                            <input class="input" type="text" name="nombre" value="">
                        </div>

                        <div class="contenido">
                            <label for="rutas">Rutas:</label>
                            <input class="input" type="text" name="rutas" value="">
                        </div>

                        <div class="contenido">
                            <label for="precio">Precio:</label>
                            <input class="input" type="text" name="precio">
                        </div>
                    </div>
                    <div class="subcajaDos">
                        <div class="contenido">
                            <label for="puntos">Punto paquete:</label>
                            <input class="input" type="text" name="puntos" value="">
                        </div>
                        <div class="contenido">
                            <lavel for="descripcion">Descripción:</lavel>
                            <textarea class="textarea" name="descripcion" id="" cols="20" rows="4" placeholder=""></textarea>
                        </div>
                    </div>
                </div>
                <div class="boton_">
                    <input class="boton" type="submit" value="guardar" name="paquetes">
                </div>
            </form>
        </div>
        <div class="tablas">
            <table>
                <thead>
                    <tr>
                        <th>&nbspNombre&nbsp</th>
                        <th>&nbspRutas&nbsp</th>
                        <th>&nbsp&nbspPrecio&nbsp&nbsp</th>
                        <th>&nbsp&nbspPunto&nbsp&nbsp</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $consult = 'SELECT*FROM paquetes_turisticos';
                    $result = mysqli_query($ared, $consult);

                    while ($ver = mysqli_fetch_array($result)) {
                        $_SESSION['id_turist'] = $ver['Id_turista'];
                    ?>
                        <tr>
                            <td><?php echo $ver['Nombre']; ?></td>
                            <td><?php echo $ver['Rutas']; ?></td>
                            <td><?php echo $ver['Precio']; ?></td>
                            <td><?php echo $ver['Punto_paquete']; ?></td>
                            <td><?php echo $ver['Descripcion']; ?></td>

                            <td class="acciones">
                                <button class="editar"><a href="/php/confirmar.php?Cod_paquete=<?php echo $ver['Cod_paquete']; ?>">editar</a></button>
                                <br>
                                <button class="eliminar"><a onclick="return confirm('estas seguro de eliminar este dato?')" href="/php/eliminar.php?Cod_paquete=<?php echo $ver['Cod_paquete']; ?>">eliminar</a></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } else {
        header('Location:/login.php');
    } ?>

    <script src="../../script/menu.js"></script>
</body>

</html>