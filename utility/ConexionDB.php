<?php

include 'DataBase.php';

class ConexionDB {

    private $conn;
    private $DBInfo;

    public function __construct() {        
        $this->DBInfo=new DataBase();
        $db=$this->DBInfo->infoDB();        
        $this->conn=  mysqli_connect($db['host'], $db['user'], $db['pass']);
        if (!$this->conn) {            
            echo "Conexión no se pudo establecer.<br />"; 
            exit();           
        }
        mysqli_select_db($this->conn, $db['database']);
    }

    public function conectar() {
        return $this->conn;
    }

    public function desconcetar() {
        $this->conexion->close();
        $this->conn = mysqli_connect($this->infoDB->getServerName(), $this->infoDB->getInfoDB());

        if ($conn) {
            echo "Conexión establecida.<br />";
        } else {
            echo "Conexión no se pudo establecer.<br />";
            exit();           
        }
        mysqli_select_db($this->conn, $db['database']);
        return $this->conn;
    }

}
