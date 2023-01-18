<div class="graficocentro">
    <div class="graficos">
        <div id="graficouno"></div>
    </div>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart', 'bar']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('timeofday', 'Time of Day');
            data.addColumn('number', 'Motivation Level');
            

            data.addRows([
        [{v: [8, 0, 0], f: '8 am'}, 1],
        [{v: [9, 0, 0], f: '9 am'}, 2],
        [{v: [10, 0, 0], f:'10 am'}, 3],
        [{v: [11, 0, 0], f: '11 am'}, 4],
        [{v: [12, 0, 0], f: '12 pm'}, 5],
        [{v: [13, 0, 0], f: '1 pm'}, 6],
        [{v: [14, 0, 0], f: '2 pm'}, 7],
        [{v: [15, 0, 0], f: '3 pm'}, 8],
        [{v: [16, 0, 0], f: '4 pm'}, 9],
        [{v: [17, 0, 0], f: '5 pm'}, 10],
        ]);

            // Set chart options
            var options = {
        title: 'Cantidad de visitas',
        colors: ['#9575cd'],
        hAxis: {
          title: 'Meses',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'porcentaje %'
        }
      };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.ColumnChart(document.getElementById('graficouno'));
            chart.draw(data, options);
        }
    </script>
    <div class="graficos">
        <div id="graficodos"></div>
    </div>
    <script type="text/javascript">
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart']
        });

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Mushrooms', 3],
                ['Onions', 1],
                ['Olives', 1],
                ['Zucchini', 1],
                ['Pepperoni', 2]
            ]);

            // Set chart options
            var options = {
                'title': 'Paquete más comprado',
                'width': 350,
                'height': 200,
                pieHole: 0.4,
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('graficodos'));
            chart.draw(data, options);
        }
    </script>
    <div class="graficos">
        <div id="graficotres"></div>
        <script type="text/javascript">
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart']
            });

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                // Create the data table.
                var data = google.visualization.arrayToDataTable([
                    ['Year', 'Sales', 'Expenses'],
                    ['2013',  1000,      400],
                    ['2014',  1170,      460],
                    ['2015',  660,       1120],
                    ['2016',  1030,      540] // CSS-style declaration
                ]);

                // Set chart options
                var options = {
                    title: 'Cantidad de visistas',
                    width: 350,
                    height: 200,
                    hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
                    vAxis: {minValue: 0}
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.AreaChart(document.getElementById('graficotres'));
                chart.draw(data, options);
            }
        </script>
    </div>
</div>

<div class="grafico-derecho">
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
    <div class="graficos">
        <div id="graficocuatro"></div>
        <script type="text/javascript">
            google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Dogs');

      data.addRows([
        [0, 0],   [1, 10],  [2, 23],  [3, 17],  [4, 18],  [5, 9],
        [6, 11],  [7, 27],  [8, 33],  [9, 40],  [10, 32], [11, 35],
        [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
        [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
        [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
        [30, 55], [31, 60], [32, 61], [33, 59], [34, 62], [35, 65],
        [36, 62], [37, 58], [38, 55], [39, 61], [40, 64], [41, 65],
        [42, 63], [43, 66], [44, 67], [45, 69], [46, 69], [47, 70],
        [48, 72], [49, 68], [50, 66], [51, 65], [52, 67], [53, 70],
        [54, 71], [55, 72], [56, 73], [57, 75], [58, 70], [59, 68],
        [60, 64], [61, 60], [62, 65], [63, 67], [64, 68], [65, 69],
        [66, 70], [67, 72], [68, 75], [69, 80]
      ]);

      var options = {
        hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Popularity'
        },
        backgroundColor: '#f1f8e9'
      };

      var chart = new google.visualization.LineChart(document.getElementById('graficocuatro'));
      chart.draw(data, options);
    }
        </script>
    </div>
    <div class="graficos">
        <div id="graficocinco"></div>
        <script type="text/javascript">
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {
                'packages': ['corechart']
            });

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                // Create the data table.
                var data = google.visualization.arrayToDataTable([
                    ['Element', 'Density', {
                        role: 'style'
                    }],
                    ['Copper', 8.94, '#b87333'], // RGB value
                    ['Silver', 10.49, 'silver'], // English color name
                    ['Gold', 19.30, 'gold'],

                    ['Platinum', 21.45, 'color: #e5e4e2'], // CSS-style declaration
                ]);

                // Set chart options
                var options = {
                    title: 'Red social mas direccionada',
                    width: 350,
                    height: 200,
                    bar: {
                        groupWidth: "95%"
                    },
                };

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.PieChart(document.getElementById('graficocinco'));
                chart.draw(data, options);
            }
        </script>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="/script/graficBarras.js"></script>
<script src="/script/graficRadar.js"></script>