<?php

class Sala {
    //ATRIBUTOS
    private $id; 
    private $nombre_sala;
    

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
     * Get the value of nombre_sala
     */ 
    public function getNombre_sala()
    {
        return $this->nombre_sala;
    }

    /**
     * Set the value of nombre_sala
     *
     * @return  self
     */ 
    public function setNombre_sala($nombre_sala)
    {
        $this->nombre_sala = $nombre_sala;

        return $this;
    }

    public static function getSala(){

        include 'conexion.php';
        $sql="SELECT s.id, s.nombre_sala, count(m.id) as `Mid` FROM tbl_salas s INNER JOIN tbl_mobiliario m ON s.id=m.id_sala GROUP BY s.id";  
        $listaSalas = mysqli_query($conexion, $sql);
        return $listaSalas; 
    }

    public static function getMesaLibre() {
        include 'conexion.php';
        // $sql="SELECT s.id, s.nombre_sala, count(m.id) as `Mid` FROM tbl_salas s INNER JOIN tbl_mobiliario m ON s.id=m.id_sala WHERE m.estado_mobiliario = 'libre' GROUP BY s.id";
        $sql="SELECT s.nombre_sala, COUNT(m.id) as `Mid`, m.estado_mobiliario FROM tbl_salas s INNER JOIN tbl_mobiliario m ON s.id=m.id_sala GROUP BY s.id, m.estado_mobiliario HAVING m.estado_mobiliario = 'libre';";
        $listaSalas = mysqli_query($conexion, $sql);
        return $listaSalas->fetch_all(MYSQLI_ASSOC);
    }

    public static function getMesaMantenimiento() {
        include 'conexion.php';
        // $sql="SELECT s.id, s.nombre_sala, count(m.id) as `Mid` FROM tbl_salas s INNER JOIN tbl_mobiliario m ON s.id=m.id_sala WHERE m.estado_mobiliario = 'libre' GROUP BY s.id";
        $sql="SELECT s.nombre_sala, COUNT(m.id) as `Mid`, m.estado_mobiliario FROM tbl_salas s INNER JOIN tbl_mobiliario m ON s.id=m.id_sala GROUP BY s.id, m.estado_mobiliario HAVING m.estado_mobiliario = 'mantenimiento';";
        $listaSalas = mysqli_query($conexion, $sql);
        return $listaSalas->fetch_all(MYSQLI_ASSOC);
    }


    public static function getSalaEst(){

        include 'conexion.php';
        $sql="SELECT id_sala,count(s.id) as `Mid`,s.nombre_sala,m.id_sala FROM tbl_salas s INNER JOIN tbl_mobiliario m ON s.id = m.id_sala INNER JOIN tbl_reserva r ON m.id = r.id_mobiliario Group by id_sala";  
        $listaSalas = mysqli_query($conexion, $sql);
        return $listaSalas; 
    }
}