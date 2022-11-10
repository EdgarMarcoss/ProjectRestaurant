<?php
require_once './cabezera.html';
?>
<div class="btn-group">
  <button type="button" value="activa" id="activa" class="btn btn-default" onclick="ver(this.value)">Reservas activas</button>
  <button type="button" value="finalizar" id="finalizar" class="btn btn-default" onclick="ver(this.value)">Reservas finalizadas</button>
</div>
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>fecha_reserva</th>
            <th>fecha_desocupacion</th>      
            <th>Sala</th>   
            <th>Mesa</th> 
            <th>Camarero</th>  
            <th>Eliminar</th>            
        </tr>
    </thead>
    <tbody id="tablaVer">
                    
    </tbody>
</table>
<script>
const ver = async (str) =>{

var ver = document.getElementById(str).value;

var bodyFormData = new FormData();

bodyFormData.append('ver', ver);

const resul = await axios({
                method: 'post',
                url: '../controller/tabla.php',
                data: bodyFormData
            });;

    data = document.getElementById('tablaVer')
    data.innerHTML = ''
    for (let i = 0; i < resul.data.length; i++) {
        data.innerHTML += `
        <tr>
        <td>${resul.data[i]['id']}</td>
        <td>${resul.data[i]['fecha_reserva']}</td>
        <td>${resul.data[i]['fecha_desocupacion']}</td>
        <td>${resul.data[i]['nombre_sala']}</td>
        <td>${resul.data[i]['numero_mobiliario']}</td>
        <td>${resul.data[i]['nombre_usuario']}</td>
        <td><a type='button' class='btn btn-danger' href='../controller/eliminarreserva.php?id={$reserva['id']}'>Eliminar</a></td>
        </tr>
        `
    }
}
</script>