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

    public function obtenerIndiceRecintoEstilo (){
        //Se ejecuta el procedimiento                
        $procedimiento = "call sp_indice_recinto_estilo";
        $query = mysqli_query($this->conn, $procedimiento);        
        $indiceEstiloRedes = array();        
        //Se obtienen los datos de la base de datos y se almacenan en un arreglo

        while ($data = mysqli_fetch_assoc($query)) {            
            array_push($indiceEstiloRedes, $data);
        }                        
        $this->conn = $this->conexion->reconectar();
        return $indiceEstiloRedes;
   }

    public function obtenerEstilosRecintos($ca, $ec, $ea, $or) {
        //Se ejecuta el procedimiento 
        $procedimiento = "call sp_calcular_recinto_estilo('$ca', '$ec', '$ea', '$or')";
        $query = mysqli_query($this->conn, $procedimiento);
        $estilos = array();
        //Se obtienen los datos de la base de datos y se almacenan en un arreglo
        while ($data = mysqli_fetch_assoc($query)) {
            array_push($estilos, $data);
        }        
        return $estilos;
    }

    public function obtenerSexo($recinto, $promedio, $tipoAprendizaje) {
        $procedimiento = "CALL sp_calcular_sexo('$recinto', '$promedio', '$tipoAprendizaje')";
        $query = mysqli_query($this->conn, $procedimiento);
        $sexo = array();

        while ($data = mysqli_fetch_assoc($query)){
            array_push($sexo, $data);
        }
        return $sexo;
    }

    public function obtenerIndiceSexoRecintoPromedio() {
        //Se ejecuta el procedimiento                
        $procedimiento = "call sp_obtener_indice_sexo_promedio_recinto";
        $query = mysqli_query($this->conn, $procedimiento);        
        $indiceSexoRecintoPromedio = array();        
        //Se obtienen los datos de la base de datos y se almacenan en un arreglo
        while ($data = mysqli_fetch_assoc($query)) {            
            array_push($indiceSexoRecintoPromedio, $data);
        }                        
        $this->conn = $this->conexion->reconectar();
        return $indiceSexoRecintoPromedio;       
    }

    public function obtenerRecinto($sexo, $promedio, $tipoAprendizaje) {
        //Se ejecuta el procedimiento
        $procedimiento = "call sp_calcular_recinto('$sexo','$promedio','$tipoAprendizaje')";
        $query = mysqli_query($this->conn, $procedimiento);
        $recintos = array();
        //Se obtienen los datos de la base de datos y se almacenan en un arreglo
        while ($data = mysqli_fetch_assoc($query)) {
            array_push($recintos, $data);
        }        
        return $recintos;
    }

    public function obtenerEstilo($sexo, $recinto, $promedio){
        //Se ejecuta el procedimiento
        $procedimiento = "call sp_obtener_estilo('$sexo', '$recinto', '$promedio')";
        $query = mysqli_query($this->conn, $procedimiento);
        $estilos = array();
        //Se obtienen los datos de la base de datos y se almacenan en un arreglo
        while ($data = mysqli_fetch_assoc($query)) {
            array_push($estilos, $data);
        }
        return $estilos;
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

    public function obtenerIndiceRedes () {
        //Se ejecuta el procedimiento                
        $procedimiento = "call sp_obtener_indice_redes";
        $query = mysqli_query($this->conn, $procedimiento);        
        $indiceRedes = array();        
        //Se obtienen los datos de la base de datos y se almacenan en un arreglo

        while ($data = mysqli_fetch_assoc($query)) {            
            array_push($indiceRedes, $data);
        }                        
        $this->conn = $this->conexion->reconectar();
        return $indiceRedes;
    }

    public function obtenerRedes($relability, $numberOfLinks, $capacity, $costo) {
        //Se ejecuta el procedimiento
        //$procedimiento = "call sp_obtener_redes";
        $procedimiento = "call sp_calcular_red ('$relability', '$numberOfLinks', '$capacity', '$costo')";
        $query = mysqli_query($this->conn, $procedimiento);
        $redes = array();
        //Se obtienen los datos de la base de datos y se almacenan en un arreglo
        while ($data = mysqli_fetch_assoc($query)) {
            array_push($redes, $data);
        }        
        return $redes;
    }    
}
