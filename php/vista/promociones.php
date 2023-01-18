<div class="promocion">
    <div>
        <div class="mes">
            <p><b>Promocion</b> del mes</p>
        </div>

        <div class="caja1">
            <form class="subcaja1" action="/php/guardar_dat.php" method="post" enctype="multipart/form-data">
                <p>Titulo</p>
                <input type="text" name="titulo">
                <p>Porcentaje de descuento</p>
                <input type="number" name="%desc" id="">
                <p>Descripcion corta</p>
                <input type="text" name="desc-corta">
                <p>Descripcion larga</p>
                <textarea name="desc-larga" id="" cols="30" rows="3"></textarea>
                <p>Fotografia de referencia</p>
                <input type="file" name="foto" id="">
                <p>Selección rutas</p>
                <input type="file" name="rutas" id="">
                <input type="submit" value="guardar" name="promociones">
            </form>
        </div>
    </div>
</div>
<div class="prom-anterior">
    <div class="subcaja2">
        <div>
            <?php
            //ver en minuto 49,16: https://www.youtube.com/watch?v=fCTd8ilXZGI       
            //ver video:https://www.youtube.com/watch?v=9BLoMGO-XcU
            //el video muestra quien inicia el software
            //session_start() esta en el: php/loguin

            include '../../php/include/cargo.php';
            $cargo = cargo();
            echo "<h3>$cargo</h3>";

            if ($nombre = $_SESSION['Nombre']) {
                echo "<p>$nombre</p>";
            }
            ?>
        </div>
        <div class="perfil">
            <?php
            $nombre1 = $_SESSION['Nombre'];
            $result = $ared->query("SELECT * FROM empleados WHERE Nombre = '$nombre1'");
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <img src="<?php echo $mostrar['Fotografia']; ?>" alt="">
            <?php } ?>
        </div>
    </div>
    <div class="anteriores">
        <div class="txt-prom">
            <p>Promociones anteriores</p>
            <a onclick="mostrar()"><img src="/avatar/buscador.svg" alt="" id="buscar"></a>
        </div>
        <div id="buscador">
            <form action="" method="GET">
                <div class="centrar">
                    <input type="search" name="promociones" id="search">
                    <a href=""><img src="/avatar/buscador.svg" alt="" id="buscar1"></a>
                    <a onclick="ocultar()"><img src="/avatar/arriba.svg" alt="" id="esconder"></a>
                </div>
            </form>
        </div>
        <script src="/script/mostrar.js"></script>
        <?php
        $promociones = "";
        if (isset($_GET['promociones'])) {
            $busqueda = $_GET['promociones'];
            $promociones = "WHERE Titulo LIKE'%" . $busqueda . "%'";
        }
        ?>
        <div class="lista">
            <ol>
                <!-- mostrar datos de la BD -->
                <?php
                $consult = "SELECT * FROM promociones $promociones;";
                $resutados = mysqli_query($ared, $consult);

                while ($mostrar = mysqli_fetch_array($resutados)) { ?>


                    <li>
                        <p><?php echo $mostrar['Titulo']; ?></p><button><a onclick="return confirm('estas seguro de eliminar este dato?')" href="/php/eliminar.php?Id_promocion=<?php echo $mostrar['Id_promocion']; ?>">x Quitar</a></button>
                    </li>
                <?php } ?>

            </ol>
        </div>
    </div>
</div>