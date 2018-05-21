<?php

include_once 'model/DefaultModel.php';

class DefaultController {

    private $model;

    public function __construct() {
        //Está clase controla la comunicación con la base de datos.
        $this->model = new DefaultModel();        
    }

    /**
     * Este método se ejecuta cada vez que el servidor es consultado. 
     * En él se llevan a cabo las comuniaciones con la base de datos y las vistas del sistema. 
     * No tiene entrada y no produce salidas
     */

    public function invoke() {  
        //Ejercicio 1    
        //Cuando es solicitada la vista del ejercicio 3.1                  
        if (isset($_GET['ingresarEstilos'])) {           
            //Si se solicita calcular.               
            if (isset($_GET['calcular'])){
                //Se obtienen los valores que el usuario ingresó en el formulario y los selects
                $ec = $_POST['c5'] + $_POST['c9'] + $_POST['c13'] + $_POST['c17'] + $_POST['c25'] + $_POST['c29'];
                $or = $_POST['c2'] + $_POST['c10'] + $_POST['c22'] + $_POST['c26'] + $_POST['c30'] + $_POST['c34'];
                $ca = $_POST['c7'] + $_POST['c11'] + $_POST['c15'] + $_POST['c19'] + $_POST['c31'] + $_POST['c35'];
                $ea = $_POST['c4'] + $_POST['c12'] + $_POST['c24'] + $_POST['c28'] + $_POST['c32'] + $_POST['c36'];

                //Se suman las columnas y se obtienen los valores que serán comparados
                //Se recuperan los datos de la tabla desde base de datos
                $datas = $this->model->obtenerEstilosRecintos();
                //Esta variable se inicializa en un valor alto para que sea remplazada por el valor menor en cada iteración
                //El valor en ningún caso supero el número 20.
                $temp = 10000000.0;
                //Esta variable es el estilo obtenido de la base de datos. 
                $estilo = "";
                //Se validan los resultados recuperados con los ingresados por el cliente                
                foreach($datas as $data){
                    //Se aplica el algoritmo de distancia uclideana
                    $result = sqrt(pow($data['EC'] - $ec, 2) + pow($data['CA'] - $ca, 2) + pow($data['OR'] - $or, 2) + pow($data['EA'] - $ea, 2));                
                    //Se valida el resultado obtenido                    
                    if ($result < $temp) {
                        //Si es menor se rempleza hasta que se comparen todos los datos y quede el menor. 
                        $temp = $result;
                        //Se almacena temporal mente el estilo recuperado. 
                        $estilo = $data['Estilo'];
                    }
                }   
                $activarJQuery = true;      
            }   
            include 'view/ingresarEstilos.php';
            //Se valida cuando se llama la vista del ejercicio 3.2
        } elseif (isset($_GET['recinto'])) {
            //Cuando se calcula el resultado esperado del recinto
            if (isset($_GET['calcularRecinto'])){
                $temp = 100000000.0;                
                //Se obtienen los registros almacenados en la tabla de la base de datos. 
                $datas = $this->model->obtenerRecinto(); 
                //Se compara cada valor obtenido de la base de datos. 
                foreach ($datas as $data){
                    //Se convierte el valor obtenido del campo estilo por valores números para poder comprarlo.
                    switch($data['Estilo']){
                        case "DIVERGENTE": 
                            $valorEstilobd = 1;
                            break;
                        case "CONVERGENTE": 
                            $valorEstilobd = 2;
                            break;
                        case "ASIMILADOR":
                            $valorEstilobd = 3; 
                            break;
                        case "ACOMODADOR":
                            $valorEstilobd = 4; 
                            break;
                    }   
                    //Se convierte a un valor numérico el campo del sexo
                    $valorSexoDB = $data['Sexo'] == "M" ? 1: 2;         
                    //Se calcula el resultado de la distancia euclidiana para cada campo           
                    $result = sqrt(pow($_POST['estilo'] - $valorEstilobd, 2) + pow($_POST['sexo'] - $valorSexoDB, 2) + pow($data['Promedio'] - $_POST['promedio'],2));
                    //Se obtiene el valor mínimo                    
                    if($result<$temp){
                        $temp = $result;
                        //Se almacena temporalmente el recinto.
                        $recinto = $data['Recinto'];
                    }
                }        
                $activarJQuery = true;         
                
            }  
            include 'view/obtenerRecinto.php';       
            //Se activa cuando se llama la vista del ejecicio 3.3     
        } elseif (isset($_GET['sexo'])) {
            //Cuando se va a calcular el valor del sexo equivalente
            if (isset($_GET['calcularSexo'])){
                //Variable inicializada en un valor alto para obtener el valor mínimo
                $temp = 100000000.0;                
                //Se obtienen los datos de la table de la base de datos
                $datas = $this->model->obtenerRecinto(); 
                //Se calcula para cada valor recuperado
                foreach ($datas as $data){
                    //Se convierte el estilo a un valor numérico para comparar.
                    switch($data['Estilo']){
                        case "DIVERGENTE": 
                            $valorEstilobd = 1;
                            break;
                        case "CONVERGENTE": 
                            $valorEstilobd = 2;
                            break;
                        case "ASIMILADOR":
                            $valorEstilobd = 3; 
                            break;
                        case "ACOMODADOR":
                            $valorEstilobd = 4; 
                            break;
                    }   
                    //Se convierte el recinto a un valor numérico para compararlo 
                    $valorRecintoDB = $data['Recinto'] == "Paraiso" ? 1: 2;      
                    //Se calcula la distancia euclidiana              
                    $result = sqrt(pow($_POST['estilo'] - $valorEstilobd, 2) + pow($_POST['recinto'] - $valorRecintoDB, 2) + pow($data['Promedio'] - $_POST['promedio'],2));
                    //Se obtiene el valor mínimo
                    
                    if($result<$temp){
                        $temp = $result;
                        //Se almacena el sexo temporalmente hasta alcanzar el mínimo
                        $sexo = $data['Sexo'] == "M"? "Masculino" : "Femenino";                        
                    }
                }        
                $activarJQuery = true;         
            } 
            include 'view/calcularSexo.php';
            //Se ejecuta cuando se va a mostrar la vista del ejercicio 3.4
        } elseif (isset($_GET['obtenerEstilo'])) {
            //Cuando se va a calcular el estilo
            if (isset($_GET['calcularEstilo'])){                
                $temp = 100000000.0;            
                //Se obtienen los datos de la tabla de la base de datos     
                $datas = $this->model->obtenerRecinto(); 
                //Se compara para cada valor recuperado
                foreach ($datas as $data){
                    //Se convierte el valor del sexo para un valor numérico para que sea más fácil de comparar. 
                    $valorSexoDB = $data['Sexo'] == "M" ? 1 : 2;   
                    //Se convierte el valor del recinto por un valor numérico para que sea más fácil de comparar.
                    $valorRecintoDB = $data['Recinto'] == "Paraiso" ? 1: 2;                    
                    //Se calcula la distancia euclidiana
                    $result = sqrt(pow($_POST['sexo'] - $valorSexoDB, 2) + pow($_POST['recinto'] - $valorRecintoDB, 2) + pow($data['Promedio'] - $_POST['promedio'],2));
                    //Se compara el valor mínimo                    
                    if($result<$temp){
                        $temp = $result;
                        //Se almacena el estilo temporalmente hasta alcanzar el valor minimo
                        $sexo = $data['Estilo'];
                    }
                }        
                $activarJQuery = true;         
            }
            include 'view/obetenerEstilo.php';
            //Se activa cuando se solicita la vista del ejercicio 3.5
        } elseif (isset($_GET['tipoProfesor'])) {
            //Cuando se va a calcular el estilo del profesor
            if(isset($_GET['calcularTipoProfesor'])) {
                //Se convierten los datos ingresados por el usuario del formulario.
                //Son obtenidos valores equivalentes a la base de datos. 
                $edad = $_POST['edad'];                            
                $genero = $_POST['genero'];                
                $autoEvaluacion = $_POST['autoevaluacion'];                
                $vecesImpartido = $_POST['vecesImpartido'];                 
                $disciplina = $_POST['disciplina'];                
                $usoComputadoras = $_POST['usoComputadoras'];                
                $habilidadWeb = $_POST['habilidadWeb'];                    
                $experienciaWeb = $_POST['experienciaWeb'];                
                
                //Se obtiene el indice resumen de los datos de la tabla de profesores
                $indices = $this->model->obtenerIndiceProfesores();          
                //Son obtenidos los valores de ocurrencia para los determinados datos en la tabla de profesores. 
                $datas = $this->model->obtenerProfesores($edad, $genero, $autoevaluacion, $vecesImpartido,
                    $disciplina, $usoComputadoras, $habilidadWeb, $experienciaWeb);                
                
                //Se obtienen los porcentajes del indice
                $indiceProfesores = $indices[0];
                //Se obtiene el m de la formula
                $m = $indiceProfesores['m'];   
                //Inicialización de variables de control             
                $temp = 0;
                $tipoProfesor = '';
                //Se recorren los valores para cada clase
                foreach ($datas as $data) {
                    //Se obtiene el n de la clase
                    $n = $data['n'];
                    //Se calcula la propierad a priori de la clase en cuestión
                    $probabilidadPriori = $n/$m;
                    $result = 1;
                    //Se obtiene la productoria de los valores obtenidos de las ocurrencias para los valores de una determinada clase. 
                    for ($i='A'; $i<'H'; $i++) {
                        $p = $indiceProfesores[$i];                        
                        //Se calcula la formula por medio de bayes/naive
                        $result *= ($data[$i]+($m*$p)) / ($n+$m);
                    }        
                    //Se calcula el valor de la productoria de la clase por el valor de la probabilidad a priori
                    $result = $result * $probabilidadPriori;                                           
                    //Se determina el valor máximo 
                    if ($temp < $result) {
                        $temp = $result;
                        //Es encontrado el valor de la clase que corresponde. 
                        $tipoProfesor = $data['Class'];
                    }
                }                        
                //Variable para mostrarlo en pantalla                                             
                $activarJQuery = true;                   
            }            
            include 'view/obtenerTipoProfesor.php';
            //Cuando se solicita la vista del ejercicio 3.6
        } elseif(isset($_GET['redes'])) {
            //Cuando se va a calcular el valor de las redes. 
            if (isset($_GET['calcularRedes'])){
                $temp = 100000000.0;  
                //Se obtienen los valores de la base de datos. 
                $datas = $this->model->obtenerRedes();
                //Se calcula para cada valor recuperado de la base de datos. 
                foreach($datas as $data) {
                    //Se obtienen y convierten los valores para cada fila. 
                    $capacidad = $data['Capacity_Ca'] == "High" ? 3 : $data['Capacity_Ca'] == "Medium" ? 2 : 1;
                    $costo = $data['Costo_Co'] == "High" ? 3 : $data['Costo_Co'] == "Medium" ? 2 : 1;                   
                    //Se obtiene la distancia euclidiana                    
                    $result = sqrt(
                          pow($data['Reliability_R'] - $_POST['confiabilidad'], 2)
                        + pow($capacidad - $_POST['capacidad'], 2)
                        + pow($data['Number_of_links_L'] - $_POST['enlaces'], 2)
                        + pow($costo - $_POST['costo'], 2));
                    //Se obtiene el valor mínimo 
                    if($result<$temp){
                        $temp = $result;
                        //Se almacena la clase de la red temporalmente hasta recuperar el valor mínimo. 
                        $tipoRed = $data['Class'];
                    }
                }                
            }            
            include 'view/calcularRedes.php';
        } else {            
            include 'view/indexView.php';
        }
    }
}



