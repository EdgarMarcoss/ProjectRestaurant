<?php
session_start();
if(empty($_SESSION['user'])){
    echo "<script>location.href='../index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once './cabezera.html'; ?>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <script src="../js/carga.js"></script>
</head>
<body>
    <div class="loader-page"></div>

    <div class="btn-group">
        <div class="nav-norm">
            <button type="button" value="activa" id="activa" class="btn btn-default">Reservas activas</button>
            <button type="button" value="finalizar" id="finalizar" class="btn btn-default">Reservas finalizadas</button>
            <button type="button" name="estadis" value="estadis" id="estadis" class="btn btn-default">Estadísticas</button>
        </div>
        <ul class="nav-resp">
            <li><a href="#desplegable"><i class="fa-solid fa-bars"></i></a>
                <div class="desp-prin-div" id="desplegable">
                    <ul class="desp-prin">
                        <li class="cerrar-desp"><a href="#"><i class="fa-solid fa-xmark"></i></a></li>
                        <li><a href="#"><button type="button" value="activa" id="activa2" class="btn btn-default">Reservas activas</button></a></li>
                        <li><a href="#"><button type="button" value="finalizar" id="finalizar2" class="btn btn-default">Reservas finalizadas</button></a></li>
                        <li><a href="#"><button type="button" name="estadis" value="estadis" id="estadis2" class="btn btn-default">Estadísticas</button></a></li>
                        <li><a href="./restaurante.php"><button class="btn btn-default">Salir</button></a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <a href="./restaurante.php" class="log nav-norm"><i class="fa-regular fa-circle-left"></i></a>

    <div class="background b-reserva">
        <div class="contenido tabla-res">
            <table class="table" style="text-align: center;" id="test">
                <thead>

                    <tr>
                        <form id="filter" class="d-flex" role="search">
                            <th scope="col"><input class="form-control me-2" type="search" id="id" placeholder="Id" aria-label="Search"></th>
                            <th scope="col"><input class="form-control me-2" type="search" id="fecha_res" placeholder="Fecha reserva" aria-label="Search"></th>
                            <th scope="col"><input class="form-control me-2" type="search" id="fecha_des" placeholder="Fecha desocupación" aria-label="Search"></th>
                            <th scope="col"><input class="form-control me-2" type="search" id="nombre_reserva" placeholder="Nombre reserva" aria-label="Search"></th>
                            <th scope="col"><input class="form-control me-2" type="search" id="sala" placeholder="Sala" aria-label="Search"></th>
                            <th scope="col"><input class="form-control me-2" type="search" id="mesa" placeholder="Mesa" aria-label="Search"></th>
                            <th scope="col"><input class="form-control me-2" type="search" id="camarero" placeholder="Camarero" aria-label="Search"></th>
                        </form>
                        <th scope="col" colspan="2"><button onclick="filtrar()"  class="btn btn-info">Buscar</button></th>
                    </tr>
                    
                    <tr>
                        <th>id</th>
                        <th>Fecha reserva</th>
                        <th>Fecha desocupacion</th>
                        <th>Nombre reserva</th>       
                        <th>Sala</th>   
                        <th>Mesa</th> 
                        <th>Camarero</th>            
                    </tr>
                </thead>
                <tbody id="tablaVer">
                                
                </tbody>
        
            <script>
                const filtrar = async () =>{

                    var id = document.getElementById('id').value;
                    var fecha_res = document.getElementById('fecha_res').value;
                    var fecha_des = document.getElementById('fecha_des').value;
                    var nombre_reserva = document.getElementById('nombre_reserva').value;
                    var sala = document.getElementById('sala').value;
                    var mesa = document.getElementById('mesa').value;
                    var camarero = document.getElementById('camarero').value;
                    var bodyFormData = new FormData();

                    bodyFormData.append('id', id);
                    bodyFormData.append('fecha_res', fecha_res);
                    bodyFormData.append('fecha_des', fecha_des);
                    bodyFormData.append('nombre_reserva', nombre_reserva);
                    bodyFormData.append('sala', sala);
                    bodyFormData.append('mesa', mesa);
                    bodyFormData.append('camarero', camarero);
                    

                    const resul = await axios({
                        method: 'post',
                        url: '../controller/filtrado.php',
                        data: bodyFormData
                    });

                    data = document.getElementById('tablaVer');
                    data.innerHTML = '';
                    for (let i = 0; i < resul.data.length; i++) {
                        data.innerHTML += `
                        <tr>
                        <td>${resul.data[i]['id']}</td>
                        <td>${resul.data[i]['fecha_reserva']}</td>
                        <td>${resul.data[i]['fecha_desocupacion']}</td>
                        <td>${resul.data[i]['nombre_reserva']}</td>
                        <td>${resul.data[i]['nombre_sala']}</td>
                        <td>${resul.data[i]['numero_mobiliario']}</td>
                        <td>${resul.data[i]['nombre_usuario']}</td>
                        </tr>
                        `
                    }
                    document.getElementById('filter').reset();
                }
                
                const ver = async (str) =>{

                    var ver = document.getElementById(str).value;
                    var bodyFormData = new FormData();

                    bodyFormData.append('ver', ver);

                    const resul = await axios({
                        method: 'post',
                        url: '../controller/tabla.php',
                        data: bodyFormData
                    });

                    data = document.getElementById('test');
                    data.innerHTML = `
                    <thead>

                        <tr>
                            <form id="filter" class="d-flex" role="search">
                                <th scope="col"><input class="form-control me-2" type="search" id="id" placeholder="Id" aria-label="Search"></th>
                                <th scope="col"><input class="form-control me-2" type="search" id="fecha_res" placeholder="Fecha reserva" aria-label="Search"></th>
                                <th scope="col"><input class="form-control me-2" type="search" id="fecha_des" placeholder="Fecha desocupación" aria-label="Search"></th>
                                <th scope="col"><input class="form-control me-2" type="search" id="nombre_reserva" placeholder="Nombre reserva" aria-label="Search"></th>
                                <th scope="col"><input class="form-control me-2" type="search" id="sala" placeholder="Sala" aria-label="Search"></th>
                                <th scope="col"><input class="form-control me-2" type="search" id="mesa" placeholder="Mesa" aria-label="Search"></th>
                                <th scope="col"><input class="form-control me-2" type="search" id="camarero" placeholder="Camarero" aria-label="Search"></th>
                            </form>
                            <th scope="col" colspan="2"><button onclick="filtrar()"  class="btn btn-info">Buscar</button></th>
                        </tr>
                        
                        <tr>
                            <th>id</th>
                            <th>Fecha reserva</th>
                            <th>Fecha desocupacion</th>
                            <th>Nombre reserva</th>       
                            <th>Sala</th>   
                            <th>Mesa</th> 
                            <th>Camarero</th>            
                        </tr>
                    </thead>
                    <tbody id="tablaVer">
                            
                    </tbody>
                    `;

                    console.log(ver);
                    if (ver != 'estadis') {
                        data = document.getElementById('tablaVer');
                        data.innerHTML = '';
                        // console.log(bodyFormData);

                        for (let i = 0; i < resul.data.length; i++) {
                            data.innerHTML += `
                            <tr>
                            <td>${resul.data[i]['id']}</td>
                            <td>${resul.data[i]['fecha_reserva']}</td>
                            <td>${resul.data[i]['fecha_desocupacion']}</td>
                            <td>${resul.data[i]['nombre_reserva']}</td>
                            <td>${resul.data[i]['nombre_sala']}</td>
                            <td>${resul.data[i]['numero_mobiliario']}</td>
                            <td>${resul.data[i]['nombre_usuario']}</td>
                            </tr>
                            `;
                        }
                    } else {
                        
                        data = document.getElementById('test');
                        data.innerHTML = '';

                        var newElement = document.createElement('div');
                        
                        <?php require_once '../model/sala.php';
                        $listaSalas=Sala::getSalaEst();               

                        require_once '../model/mobiliario.php';     
                        $listaMobiliario=Mobiliario::getMobiliarioEst(); ?>

                        newElement.innerHTML = `<div class="grafico-canvas"><canvas id="myChart"></canvas></div>`;
                        data.appendChild(newElement);

                        var ctx = document.getElementById('myChart').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                datasets: [{
                                    data: [ <?php foreach ($listaSalas as $salas) {
                                        echo $salas['Mid'];
                                        echo  ",";
                                    } ?> ],
                                    backgroundColor: ['#03071e', '#d00000', '#fcbf49', '#6a040f', '#e85d04', '#0a9396', '#bb3e03', '#ae2012'],
                                    label: 'Reservas'
                                }],
                                labels: [<?php foreach($listaSalas as $salas){
                                        echo "'{$salas['nombre_sala']}',";                        

                                } ?> ]
                            },
                            options: {
                                responsive: true,
                                indexAxis: 'y',
                                x: {
                                    ticks: {
                                        stepSize: 1
                                    }
                                }

                            }
                        });  
                        var cont = 0;
                        
                        <?php $Chart = 0;
                        foreach ($listaSalas as $salas) {?>
                        var otra = document.createElement('div');

                        otra.innerHTML += `<?php echo $salas['nombre_sala'];echo "<br>"; ?>`;

                            otra.innerHTML += `<div class="grafico-canvas"><canvas id="myChart<?php echo $Chart; ?>"></canvas></div>`;

                            data.appendChild(otra);

                            var ctx = document.getElementById('myChart'+cont).getContext('2d');
                            var chart2 = new Chart(ctx, {
                                type: 'doughnut',
                                data: {
                                    datasets: [{
                                        data: [<?php foreach ($listaMobiliario as $mobiliario) {
                                            if ($salas['id_sala']==$mobiliario['id_sala']) {
                                                echo "{$mobiliario['Mid']},";
                                            }
                                        } ?>],
                                        backgroundColor: ['#3a0ca3', '#4361ee', '#4cc9f0', '#7209b7', '#f72585'],
                                        label: 'Comparacion de navegadores'
                                    }],
                                    labels: [<?php foreach($listaMobiliario as $mobiliario){

                                        if ($salas['id_sala']==$mobiliario['id_sala']) {
                                            echo "'Mesa {$mobiliario['numero_mobiliario']}',";
                                        }                  

                                    } ?>]
                                },
                                options: {
                                    responsive: true
                                }
                            });

                        cont++;

                        <?php $Chart++; } ?>;

                    }
                }
            </script>
            </table>
        </div>
    </div>
</body>
</html>