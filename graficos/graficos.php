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
        $listaSalas=Sala::getSala();               

        include '../model/mobiliario.php';        
        $listaMobiliario=Mobiliario::getMobiliario($salas);
        $listaMobiliario2=Mobiliario::getMobiliarioEst($salas);
    ?>
    
    <!-- Estadisticas Salas -->    
    <canvas id="myChart"></canvas>
    <script src="chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [ <?php foreach ($listaMobiliario2 as $mobiliario) {
                        echo "<td>{$mobiliario['Mid']}</td>"; 
                    } ?> ],
                    backgroundColor: ['#42a5f5', 'red', 'green', 'blue', 'violet'],
                    label: 'Comparacion de navegadores'
                }],
                labels: [<?php foreach($listaMobiliario as $mobiliario){

                    echo "<td>{$mobiliario['numero_mobiliario']}</td>"; 

                } ?> ]
            },
            options: {
                responsive: true
            }
        });
    </script>

    <!-- Estadísticas Mesas -->
    <canvas id="myChart"></canvas>
    <script src="chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [ <?php foreach ($listaMobiliario2 as $mobiliario) {
                        echo "<td>{$mobiliario['Mid']}</td>"; 
                    } ?> ],
                    backgroundColor: ['#42a5f5', 'red', 'green', 'blue', 'violet'],
                    label: 'Comparacion de navegadores'
                }],
                labels: [<?php foreach($listaMobiliario as $mobiliario){

                    echo "<td>{$mobiliario['numero_mobiliario']}</td>"; 

                } ?> ]
            },
            options: {
                responsive: true
            }
        });
    </script>


    
</body>

</html>