<?php

require_once 'utility/ConexionDB.php';

class DefaultModel {

    private $conn;
    private $conexion;

    public function __construct() {      
        //Se obtienen los datos   
        $this->conexion = new ConexionDB();        
        //Se establece la conexión con la base de datos
        $this->conn = $this->conexion->conectar();                
    }

    public function obtenerEstilosRecintos() {
        //Se ejecuta el procedimiento 
        $procedimiento = "call sp_obtener_estilos_recintos";
        $query = mysqli_query($this->conn, $procedimiento);
        $estilos = array();
        //Se obtienen los datos de la base de datos y se almacenan en un arreglo
        while ($data = mysqli_fetch_assoc($query)) {
            array_push($estilos, $data);
        }        
        return $estilos;
    }

    public function obtenerRecinto() {
        //Se ejecuta el procedimiento
        $procedimiento = "call sp_obtener_recinto";
        $query = mysqli_query($this->conn, $procedimiento);
        $recintos = array();
        //Se obtienen los datos de la base de datos y se almacenan en un arreglo
        while ($data = mysqli_fetch_assoc($query)) {
            array_push($recintos, $data);
        }        
        return $recintos;
    }

    public function obtenerIndiceProfesores () {
        //Se ejecuta el procedimiento                
        $procedimiento = "call sp_obtener_indice_profesores";
        $query = mysqli_query($this->conn, $procedimiento);        
        $indiceProfesores = array();        
        //Se obtienen los datos de la base de datos y se almacenan en un arreglo

        while ($data = mysqli_fetch_assoc($query)) {            
            array_push($indiceProfesores, $data);
        }                        
        $this->conn = $this->conexion->reconectar();
        return $indiceProfesores;
    }

    public function obtenerProfesores ($A, $B, $C, $D, $E, $F, $G, $H) {
        //Se ejecuta el procedimiento
        //$procedimiento = "call sp_obtener_profesores";        
        $procedimiento = "call sp_calcular_profesor('$A', '$B', '$C', '$D', '$E', '$F', '$G', '$H')";
        $query = mysqli_query($this->conn, $procedimiento);        
        $profesores = array();
        //Se obtienen los datos de la base de datos y se almacenan en un arreglo
        while ($data = mysqli_fetch_assoc($query)) {
            array_push($profesores, $data);
        }        
        return $profesores;
    }

    public function obtenerRedes() {
        //Se ejecuta el procedimiento
        $procedimiento = "call sp_obtener_redes";
        $query = mysqli_query($this->conn, $procedimiento);
        $profesores = array();
        //Se obtienen los datos de la base de datos y se almacenan en un arreglo
        while ($data = mysqli_fetch_assoc($query)) {
            array_push($profesores, $data);
        }        
        return $profesores;
    }
}
