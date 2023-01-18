<div class="sec2">
    <div class="otros-user">
        <div class="titulo">
            <h2>Otros Usuarios</h2>
            <a onclick="mostrar()"><img src="/avatar/buscador.svg" alt="logo buscador" id="buscar"></a>
        </div>
        <div id="buscador">
            <div class="centrar">
                <form class="buscar">
                    <input type="search" value="" name="buscarUsuario" id="search">
                    <!-- <a><img src="/imagenes/buscador.svg" alt="" id="buscar1"></a> -->
                    <a onclick="ocultar()"><img src="/avatar/arriba.svg" alt="logo desaparecer" id="esconder"></a>
                </form>
            </div>
        </div>
        <div class="lista">
            <ol>
                <form action="/php/elim_usuario.php" method="GET">
                    <li id="datos"></li>
                </form>
            </ol>
        </div>
    </div>
</div>
<div class="sec3">
    <div class="subcaja3">
        <div id="infoPersona">
            <?php
            //ver en minuto 49,16: https://www.youtube.com/watch?v=fCTd8ilXZGI            
            //ver video:https://www.youtube.com/watch?v=9BLoMGO-XcU
            //el video muestra quien inicia el software
            //session_start() esta en el: php/loguin
            include '../../php/include/cargo.php';
            // $cargo = cargo();
            // echo "<h3>$cargo</h3>";

            // if ($nombre = $_SESSION['Nombre']) {
            //     echo "<p>$nombre</p>";
            // }
            ?>
        </div>
        <div class="perfil">
            <?php
            $nombre1 = $_SESSION['Nombre'];
            $result = $ared->query("SELECT * FROM empleados WHERE Nombre = '$nombre1'");
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <img src="<?php echo $mostrar['Fotografia']; ?>" alt="avatar usuario">
            <?php } ?>
        </div>
    </div>
    <br>
    <div class="agre-user">
        <div class="titulo">
            <p>Agregar Usuario</p>
        </div>
        <?php
        $result = mysqli_query($ared, "SELECT Id_cargo,Nombre_cargo FROM cargo");
        ?>
        <form class="add-user" action="/php/guardar_dat.php" method="POST" enctype="multipart/form-data">
            <p>Nombre</p>
            <input type="text" name="nombre">
            <p>Contraseña</p>
            <input type="password" name="contraseña">
            <p>Fecha de nacumiento</p>
            <input type="date" name="edad">
            <p>telefono</p>
            <input type="text" name="telefono">
            <p>Cargo</p>
            <select name="cargo">
                <?php
                while ($fila = $result->fetch_assoc()) :
                    $id = $fila['Id_cargo'];
                    $nombre = $fila['Nombre_cargo'];
                    echo "<option value=$id>$nombre</option>";
                endwhile;
                ?>
            </select>
            <p>Fotografria</p>
            <input type="file" name="foto" id="seleccionArchivos">
            <br>
            <img id="imagenPrevisualizacion" alt="avatar de usuario">
            <br>
            <div>
                <input type="submit" value="guardar" name="crear_usuario" onclick="guardarUsuario()">
            </div>
        </form>
        <!-- script para mostrar las imagenes-->
        <script src="/script/mostrar.js"></script>
    </div>
</div>