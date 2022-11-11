<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once './cabezera.html';
    session_start();
    ?>
</head>
<body>
        <table class="table" style="text-align:center ;">
        <thead>
        <form id="filter" class="d-flex" role="search">
          <tr>
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
            </thead>
    <div class="btn-group">
    <button type="button" value="activa" id="activa" class="btn btn-default">Reservas activas</button>
    <button type="button" value="finalizar" id="finalizar" class="btn btn-default">Reservas finalizadas</button>
    </div>
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
    }
    </script>
     </table>
</body>
</html>