<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="graficos.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
</head>

<body>


    <?php
        session_start();
        include '../model/sala.php';
        $listaSalas=Sala::getSalaEst();               

        include '../model/mobiliario.php';     
        $listaMobiliario=Mobiliario::getMobiliarioEst();
    ?>
    
    <!-- Estadisticas Salas -->  
    <script>var chart;</script>
    
    <canvas id="myChart"></canvas>
    <!-- <script src="chart.js"></script> -->
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [ <?php foreach ($listaSalas as $salas) {
                        echo $salas['Mid'];
                        echo  ",";
                    } ?> ],
                    backgroundColor: ['#42a5f5', 'red', 'green', 'blue', 'violet'],
                    label: 'Comparacion de navegadores'
                }],
                labels: [<?php foreach($listaSalas as $salas){

                        echo "'{$salas['nombre_sala']}',";
                        

                } ?> ]
            },
            options: {
                responsive: true
            }
        });  
        // chart.destroy();
    </script>

  


    <!-- Estadísticas Mesas -->
    <?php
    // foreach ($listaSalas as $salas) {
         ?>
    <!-- <canvas id="myChart"></canvas> -->
    <!-- <script src="chart.js"></script> -->
    <script>
        // chart.clear();
        // chart.destroy();
        ctx = document.getElementById('myChart').getContext('2d');
        chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [ <?php foreach ($listaMobiliario as $mobiliario) {
                         echo $mobiliario['Mid'];
                         echo  ",";
                    } ?> ],
                    backgroundColor: ['#42a5f5', 'red', 'green', 'blue', 'violet'],
                    label: 'Comparacion de navegadores'
                }],
                labels: [<?php foreach($listaMobiliario as $mobiliario){

                        echo "'{$mobiliario['numero_mobiliario']}',";

                } ?> ]
            },
            options: {
                responsive: true
            }
        });
    </script>
    <?php
    // }
    ?>    
</body>

</html>