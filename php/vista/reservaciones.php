<div class="clendario">
    <div class="calen-google">
        <div id='calendar'></div>
    </div>
</div>
<script>
    //https://fullcalendar.io/
    //se requiere comprar el paquete premium para usar envios por json
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {

            locale: 'es',
            height: '100%',
            headerToolbar: {
                right: 'prev,next today',
                center: 'title',
                left: ''
            },
            events: [{
                <?php
                $query = "SELECT * FROM reservas";
                $resultado = mysqli_query($ared, $query);
                while ($lista = mysqli_fetch_array($resultado)) :
                ?>
                    title: '<?php echo $lista['reprogramar']; ?>',
                    start: '<?php echo $lista['reprogramar']; ?>',
                    constraint: 'businessHours',
                    background: '#257e4a',

                <?php endwhile ?>
            }]
        });
        calendar.render();
    });
</script>

<div class="administrador">
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
    <div class="reservas">
        <div class="subreservas">
            <div>
                <h3>reservas pendientes</h3>
            </div>
            <?php
            $consult = "SELECT * FROM reservas";
            $resultados = mysqli_query($ared, $consult);

            while ($mostrar = mysqli_fetch_array($resultados)) {;
                //$_SESSION['reservas']=$mostrar['id_reservas'];

            ?>
                <form action="/php/guardar_dat.php" method="POST">
                    <div id="buscador">
                        <input type="date" name="reprogramar" id=""><button>enviar</button><button onclick="ocultar()">X</button>
                        <br>
                        <input type="hidden" name="reserva" value="<?php $_SESSION['idReserva'] = $mostrar['reprogramar'];
                                                                    echo $mostrar['id_reservas']; ?>">
                        <br>
                    </div>
                </form>
                <ol>
                    <form action="/php/guardar_dat.php" method="POST" class="form">
                        <li name="clik">
                            <p onclick="cargardato(<?php $h = $mostrar['id_turista'];
                                                    echo $h ?>)" class="tx"><?php $_SESSION['turista'] = $mostrar['id_turista'];
                                                                            echo $mostrar['id_reservas']; ?></p><a href="/php/confirmar.php?confirmar=<?php echo $mostrar['confirmar']; ?>">Confirmar</a><a onclick="mostrar()">Reprogramar</a>
                        </li>
                    </form>
                </ol>
            <?php } ?>
            <script>
                //click para mostrar info de la persona seleccionada
                //https://www.youtube.com/watch?v=Pf2gwnNyq1g
                //se envia el id optenido a php\id.php
                function cargardato(id) {
                    var url = '/php/id.php';
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: 'id=' + id,
                        success: function(response) {
                            document.location.reload();
                        }
                    });
                }
            </script>
        </div>
    </div>
    <div class="informacion">
        <div class="letras">
            <h3> Informacion</h3>
        </div>
        <div class="subinformacion">
            <div class="cajita">
                <p>ruta del cafe</p>
            </div>
            <?php
            //el id se escuentra en: php/id.php
            if (empty($_SESSION['id-turista'])) {
                $_SESSION['id-turista'] = 1;
            }
            $id = $_SESSION['id-turista'];
            $reserva = $_SESSION['idReserva'];
            $consult = $ared->query("SELECT * FROM registro_turista t INNER JOIN reservas r ON t.id_turista=r.id_turista WHERE t.id_turista='$id'");
            while ($mostrar = $consult->fetch_array()) {
            ?>
                <div class="letras">
                    <p><b>Id reserva:</b><?php echo $mostrar['id_reservas']; ?></p>
                    <p><b>Nombre:</b><?php echo $mostrar['Nombre']; ?></p>
                    <p><b>N. Identificacion:</b><?php echo $_SESSION['id-turista']; ?></p>
                    <p><b>N. Telefono:</b><?php echo $mostrar['Telefono']; ?></p>
                    <p><b>Fecha:</b><?php echo $mostrar['reprogramar']; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="/script/mostrar.js"></script>