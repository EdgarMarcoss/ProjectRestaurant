<?php
// $sala=$_POST['sala'];
// echo $sala;
class Mobiliario {
    //ATRIBUTOS
    private $id; 
    private $numero_mobiliario;
    private $tipo_mobiliario;
    private $id_sala;
    private $estado_mobiliario;
    

    public function __construct() {
   
    }

 

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of numero_mobiliario
     */ 
    public function getNumero_mobiliario()
    {
        return $this->numero_mobiliario;
    }

    /**
     * Set the value of numero_mobiliario
     *
     * @return  self
     */ 
    public function setNumero_mobiliario($numero_mobiliario)
    {
        $this->numero_mobiliario = $numero_mobiliario;

        return $this;
    }

    /**
     * Get the value of tipo_mobiliario
     */ 
    public function getTipo_mobiliario()
    {
        return $this->tipo_mobiliario;
    }

    /**
     * Set the value of tipo_mobiliario
     *
     * @return  self
     */ 
    public function setTipo_mobiliario($tipo_mobiliario)
    {
        $this->tipo_mobiliario = $tipo_mobiliario;

        return $this;
    }

    /**
     * Get the value of id_sala
     */ 
    public function getId_sala()
    {
        return $this->id_sala;
    }

    /**
     * Set the value of id_sala
     *
     * @return  self
     */ 
    public function setId_sala($id_sala)
    {
        $this->id_sala = $id_sala;

        return $this;
    }

    /**
     * Get the value of estado_mobiliario
     */ 
    public function getEstado_mobiliario()
    {
        return $this->estado_mobiliario;
    }

    /**
     * Set the value of estado_mobiliario
     *
     * @return  self
     */ 
    public function setEstado_mobiliario($estado_mobiliario)
    {
        $this->estado_mobiliario = $estado_mobiliario;

        return $this;
    }

    public static function getMobiliario($salas){  
     

        include 'conexion.php';
        $sql="SELECT m.numero_mobiliario FROM tbl_mobiliario m INNER JOIN tbl_salas s ON m.id_sala=s.id where id_sala=$salas";  
        $listaMobiliario = mysqli_query($conexion, $sql);         
        return $listaMobiliario;

        
    }
}