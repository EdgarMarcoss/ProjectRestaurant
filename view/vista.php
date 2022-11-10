


<?php
echo "<td><a type='button' class='btn btn-danger' href='../view/crearreservavista.php'>Crear</a></td>";
?>
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
    <tbody>
        <?php 
            require_once '../model/reserva.php'; 
            $listaReserva=Reserva::getReserva();

            foreach ($listaReserva as $reserva){
                echo "<tr>";  
                    echo "<td>{$reserva['id']}</td>";                   
                    echo "<td>{$reserva['fecha_reserva']}</td>";            
                    echo "<td>{$reserva['fecha_desocupacion']}</td>"; 
                    echo "<td>{$reserva['nombre_sala']}</td>"; 
                    echo "<td>{$reserva['numero_mobiliario']}</td>"; 
                    echo "<td>{$reserva['nombre_usuario']}</td>";  
                    
                    echo "<td><a type='button' class='btn btn-danger' href='../controller/eliminarreserva.php?id={$reserva['id']}'>Eliminar</a></td>";
                                                
                    
                echo "</tr>";                                        
                        
            }  
            
        ?>                 
    </tbody>
</table>