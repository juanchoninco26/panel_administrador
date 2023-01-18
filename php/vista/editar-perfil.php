<div class="body">
    <div class="sec2">
        <div class="sub-sec2">
            <div class="p">
                <p>Perfil Actual:</p>
            </div>

        </div>

        <div class="subcaja3">
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
                <div class="img">
                    <form action="/php/guardar_dat.php" enctype="multipart/form-data">
                        <?php
                        include '../../php/puntos-turista-bd.php';
                        $nombre1 = $_SESSION['Nombre'];
                        $result = $ared->query("SELECT * FROM empleados WHERE Nombre = '$nombre1'");
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <img src="<?php echo $row['Fotografia']; ?>">
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="sec3">
        <div class="caj">
            <?php
            //youtube.com/watch?v=Ct6K4wRjlQQ
            //www.youtube.com/watch?v=0WJ_qFxeWCg
            include '../../php/puntos-turista-bd.php';
            $nombre1 = $_SESSION['Nombre'];
            $consulta = "SELECT *FROM empleados where Nombre='$nombre1'";
            $cons = mysqli_query($ared, $consulta);
            while ($rows = mysqli_fetch_array($cons)) {
            ?>
                <form class="mod-datos" action="/php/guardar_dat.php" method="post" enctype="multipart/form-data">
                    <div class="dat">
                        <div class="texto">
                            <p>Modificar Datos</p>
                        </div>
                        <p>Nombre</p>
                        <input type="text" name="nombre"  value="<?php echo $rows['Nombre']; ?>">
                        <p>Cedula</p>
                        <input type="text" name="cedula"  value="<?php echo $rows['Id_empleado']; ?>" readonly>
                        <p>Contraseña</p>
                        <input type="password" name="contraseña"  value="">
                        <p>Repetir Contraseña</p>
                        <input type="password" name="repcontraseña"  value="">
                        <p>Fecha de nacimiento</p>
                        <input type="text" name="edad"  value="<?php echo $rows['Fecha_nacimiento']; ?>">
                        <div>
                            <input type="submit" value="Actualizar" name="editar_perfil" onclick="alert('datos actualizados');">
                        </div>
                    </div>
                    <div class="min-dat">
                        <p>Telefono</p>
                        <input type="number" name="telefono"  value="<?php echo $rows['Telefono']; ?>">
                        <p>Correo</p>
                        <input type="text" name="correo"  value="<?php echo $rows['correo']; ?>">
                        <p>Cargo</p>
                        <input type="text" name="cargo"  value="<?php echo cargo(); ?>" disabled>
                        <p>Foto</p>
                        <input type="file" name="foto" id="seleccionArchivos">
                        <br>
                        <img id="imagenPrevisualizacion">
                        <br>
                        <p>* al actualizar los datos tendra que iniciar <br>sesion nuevamente</p>
                    </div>

                </form>
            <?php }   ?>
            <script src="/script/mostrar.js"></script>
        </div>
    </div>
</div>