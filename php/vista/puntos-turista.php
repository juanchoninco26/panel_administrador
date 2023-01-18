<div class="sec2">
    <div class="pun-habilt">
        <div class="titulo">
            <p>Puntos habilitados</p>
            <a onclick="mostrar()"><img src="/avatar/buscador.svg" alt="" id="buscar"></a>
        </div>
        <div id="buscador">
            <form action="" method="GET">
                <div class="centrar">
                    <input type="search" name="puntos_trista" id="search">
                    <a href=""><img src="/avatar/buscador.svg" alt="" id="buscar1"></a>
                    <a onclick="ocultar()"><img src="/avatar/arriba.svg" alt="" id="esconder"></a>
                </div>
            </form>
            <script src="/script/mostrar.js"></script>
        </div>
        <?php
        $puntos_trista = "";
        if (isset($_GET['puntos_trista'])) {
            $busqueda = $_GET['puntos_trista'];
            $puntos_trista = "WHERE Id_turista LIKE'%" . $busqueda . "%'";
        }
        ?>
        <div class="lista">
            <ol>
                <?php
                $consult = "SELECT * FROM generarpuntos $puntos_trista";
                $resutados = mysqli_query($ared, $consult);

                while ($mostrar = mysqli_fetch_array($resutados)) { ?>
                    <li>
                        <?php echo $mostrar['puntos_manualmente']; ?><p><?php echo $mostrar['Id_turista']; ?></p><button><a onclick="return confirm('estas seguro de eliminar este dato?')" href="/php/elim-punt-turist.php?id=<?php echo $mostrar['Cod_descuento']; ?>">x Quitar</a></button>
                    </li>
                <?php } ?>
            </ol>

        </div>
    </div>
</div>
<div class="sec3">
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
    <div class="valor-desc">
        <!-- se envian los datos mediante un action con metodo post-->
        <form action="/php/guardar_dat.php" method="post">
            <p>Usuario:</p>
            <input type="text" name="usuario">
            <p>Generar puntos manualmente:</p>
            <input type="text" name="puntos">
            <p>Valor Descuento:</p>
            <input type="text" name="desc">
            <p>Valor Des. Acomulado:</p>
            <input type="text" name="acom">
            <div>
                <input type="submit" value="guardar" name="guardar_punt">
            </div>
        </form>
    </div>
    <div class="punt-gen">
        <p>Puntos generados/Sem</p>
        <p>1.200</p>
        <p>Puntos generados/Mes</p>
        <p>1.200</p>
        <p>Puntos generados/Año</p>
        <p>1.200</p>
    </div>
</div>