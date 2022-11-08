<?php

class Reserva {
    //ATRIBUTOS
    private $id; 
    private $fecha_reserva;
    private $fecha_desocupacion;
    private $id_usuario;
    private $id_salas;   

    public function __construct($id, $fecha_reserva, $fecha_desocupacion,$id_usuario, $id_salas) {
        $this->id = $id; //1º id referencia a atr, 2º a contructor
        $this->fecha_reserva = $fecha_reserva;
        $this->fecha_desocupacion = $fecha_desocupacion;
        $this->id_usuario = $id_usuario;       
        $this->id_salas = $id_salas;      
        
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
     * Get the value of fecha_reserva
     */ 
    public function getFecha_reserva()
    {
        return $this->fecha_reserva;
    }

    /**
     * Set the value of fecha_reserva
     *
     * @return  self
     */ 
    public function setFecha_reserva($fecha_reserva)
    {
        $this->fecha_reserva = $fecha_reserva;

        return $this;
    }

    /**
     * Get the value of fecha_desocupacion
     */ 
    public function getFecha_desocupacion()
    {
        return $this->fecha_desocupacion;
    }

    /**
     * Set the value of fecha_desocupacion
     *
     * @return  self
     */ 
    public function setFecha_desocupacion($fecha_desocupacion)
    {
        $this->fecha_desocupacion = $fecha_desocupacion;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of id_salas
     */ 
    public function getId_salas()
    {
        return $this->id_salas;
    }

    /**
     * Set the value of id_salas
     *
     * @return  self
     */ 
    public function setId_salas($id_salas)
    {
        $this->id_salas = $id_salas;

        return $this;
    }

    /**
    * Esta funcion te devuelve la lista de reserva y no le pasa ningun parametro
    */

    public static function getReserva(){     
        $where = "";
        require_once "conexion.php";
        $sql="SELECT r.id,r.fecha_reserva,r.fecha_desocupacion,s.nombre_sala,u.nombre_usuario,m.numero_mobiliario FROM tbl_reserva r INNER JOIN tbl_usuarios u ON r.id_usuario=u.id INNER JOIN tbl_mobiliario m ON m.id=r.id_mobiliario INNER JOIN tbl_salas s ON m.id_sala=s.id   $where";  
        $listaReserva = mysqli_query($conexion, $sql);  
        return $listaReserva;      
    }     
    
    public function crearReserva($id_usuario, $id_salas){

        require_once "conexion.php";
           
        $sql="INSERT INTO tbl_reserva (id,fecha_reserva,fecha_desocupacion,id_usuario,id_salas) VALUES (?,?,?,?,?)";
        $stmt=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"issii",$id, $fecha_reserva, $fecha_desocupacion,$id_usuario, $id_salas);         
        mysqli_stmt_execute($stmt);  
        
    }

    public static function eliminarReserva($id){     
      
        require_once 'conexion.php';
        $sql =("DELETE FROM `tbl_reserva` WHERE `id`=?");
        $stmt=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"i",$id);  
        mysqli_stmt_execute($stmt);        
    } 


}