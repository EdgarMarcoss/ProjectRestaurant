<?php

class Incidencia {
    //ATRIBUTOS
    private $id; 
    private $fecha_incidencia;
    private $fecha_final_incidenca;
    private $motivo_incidencia;
    private $id_usuario;
    private $id_mobiliario;    

    public function __construct($id, $fecha_incidencia, $fecha_final_incidenca,$motivo_incidencia,$id_usuario,$id_mobiliario) {
        $this->id = $id; //1º id referencia a atr, 2º a contructor
        $this->fecha_incidencia = $fecha_incidencia;
        $this->fecha_final_incidenca = $fecha_final_incidenca;
        $this->motivo_incidencia = $motivo_incidencia;
        $this->id_usuario = $id_usuario;       
        $this->id_mobiliario = $id_mobiliario;     
        
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
     * Get the value of fecha_incidencia
     */ 
    public function getFecha_incidencia()
    {
        return $this->fecha_incidencia;
    }

    /**
     * Set the value of fecha_incidencia
     *
     * @return  self
     */ 
    public function setFecha_incidencia($fecha_incidencia)
    {
        $this->fecha_incidencia = $fecha_incidencia;

        return $this;
    }

    /**
     * Get the value of fecha_final_incidenca
     */ 
    public function getFecha_final_incidenca()
    {
        return $this->fecha_final_incidenca;
    }

    /**
     * Set the value of fecha_final_incidenca
     *
     * @return  self
     */ 
    public function setFecha_final_incidenca($fecha_final_incidenca)
    {
        $this->fecha_final_incidenca = $fecha_final_incidenca;

        return $this;
    }

    /**
     * Get the value of motivo_incidencia
     */ 
    public function getMotivo_incidencia()
    {
        return $this->motivo_incidencia;
    }

    /**
     * Set the value of motivo_incidencia
     *
     * @return  self
     */ 
    public function setMotivo_incidencia($motivo_incidencia)
    {
        $this->motivo_incidencia = $motivo_incidencia;

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
     * Get the value of id_mobiliario
     */ 
    public function getId_mobiliario()
    {
        return $this->id_mobiliario;
    }

    /**
     * Set the value of id_mobiliario
     *
     * @return  self
     */ 
    public function setId_mobiliario($id_mobiliario)
    {
        $this->id_mobiliario = $id_mobiliario;

        return $this;
    }

    

    public static function getIncidenciaActual(){     
        $where = "";
        require_once "conexion.php";
        $sql="SELECT i.id,i.fecha_incidencia,i.fecha_final_incidencia,s.nombre_sala,u.nombre_usuario,m.numero_mobiliario FROM tbl_incidencia i INNER JOIN tbl_usuarios u ON i.id_usuario=u.id INNER JOIN tbl_mobiliario m ON m.id=i.id_mobiliario INNER JOIN tbl_salas s ON m.id_sala=s.id where i.fecha_final_incidencia = ''  $where";  
        $listaReserva = mysqli_query($conexion, $sql);
        $listaReserva=$listaReserva->fetch_all(MYSQLI_ASSOC);  
        return $listaReserva;      
    }          
    


    public static function crearIncidencia($correo,$motivo_incidencia, $id_mesa){

        require_once "conexion.php";
        $sql1="SELECT id FROM tbl_usuarios WHERE email_usuario = '$correo'";
        $id=mysqli_query($conexion,$sql1);
        $id=$id->fetch_all(MYSQLI_ASSOC)[0]['id'];

        $sql="INSERT INTO tbl_incidencia (motivo_incidencia,id_usuarios,id_mobiliario) VALUES (?,?,?)";
        $stmt=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"sii",$motivo_incidencia,$id, $id_mesa);
        mysqli_stmt_execute($stmt);

        $sql =("UPDATE `tbl_mobiliario` SET `estado_mobiliario` = 'mantenimiento' WHERE `id`=?");
        $stmt=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"i",$id_mesa);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        
    }


    public static function eliminarIncidencia($id_mesa){     
      
        require_once 'conexion.php';
        $sql =("UPDATE `tbl_incidencia` SET `fecha_final_incidencia` = now() WHERE `id_mobiliario`=? and `fecha_final_incidencia` = ''");
        $stmt=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"i",$id_mesa);  
        mysqli_stmt_execute($stmt); 

        $sql =("UPDATE `tbl_mobiliario` SET `estado_mobiliario` = 'libre' WHERE `id`=?");
        $stmt=mysqli_stmt_init($conexion);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"i",$id_mesa);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);       
    } 

    
}