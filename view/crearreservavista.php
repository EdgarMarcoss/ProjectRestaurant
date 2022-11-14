<?php
// include 'cabezera.html';  

session_start();
if(empty($_SESSION['user'])){

   echo "<script>location.href='../index.php'</script>";
   
}
  
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.2/axios.js" integrity="sha512-alPPV0FSr6mYlSRf3QgbZmEqL7o99K5e30hGX+FrqDwMhnTngIeshurUAuKFDG28IzPSCSWTwmEfN0wBjg19KQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="form-group align-items-center">
<form action="../controller/crearreserva.php" method="POST">
 
   <label for="sala">Sala</label> 
   <select name="sala" id="sala" onchange="calcular()">  
   <?php 
   
   include '../model/sala.php';
 
   
   $listaSalas=Sala::getSala();
      
      foreach($listaSalas as $sala){ 
              
         echo "<option value='{$sala['id']}'>{$sala['nombre_sala']}</option>";                            
      
      }
      ?>  

   </select>
   
   <p id="resul"></p>
   <label for="mobiliario">Mesa</label>
   <select name="mobiliario" >  
   <?php
   include '../model/mobiliario.php';  
   ?>
   
   <?php

      foreach($listaMobiliario as $mobiliario){   

         echo "<option value='mobiliario'>{$mobiliario['numero_mobiliario']}</option>";  
      
      }
      ?>
   </select>

   <input type="submit" class="btn btn-success" value="Enviar">
</form>

<script> 
  const selectElement = document.getElementById('sala');

   selectElement.addEventListener('change', (event) => {

      tipo=event.target.value
      alert(tipo)
      calcular()


   })

   const calcular = async ()=>{
      var tipo = document.getElementById('sala').value      
      var bodyFormData= new FormData();
      bodyFormData.append('sala',tipo)     
      const resul = await axios({
                        method: 'post',
                        url: '../controller/mob.php',
                        data: bodyFormData
                    });;
      document.getElementById('resul').innerHTML = resul.data;
      
   }

   
</script>






</div>