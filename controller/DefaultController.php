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

                //Se obtiene el indice resumen de los datos de la tabla recintoestilo
                $indices = $this->model->obtenerIndiceRecintoEstilo();          
                //Son obtenidos los valores de ocurrencia para los determinados datos en la tabla de profesores. 
                $datas = $this->model->obtenerEstilosRecintos($ca, $ec, $ea, $or);
                
                //Se obtienen los porcentajes del indice
                $indiceEstilosRecinto = $indices[0];
                //Se obtiene el m de la formula
                $m = $indiceEstilosRecinto['m'];   
                //Inicialización de variables de control             
                $temp = 0;
                $estilo = '';
                //Arreglo con los valores key de la tabla de la base de datos 
                $keyRecintoEstilo = array('CA', 'EC', 'EA', 'OR');
                //Se recorren los valores para cada clase
                foreach ($datas as $data) {
                    //Se obtiene el n de la clase
                    $n = $data['n'];
                    //Se calcula la propierad a priori de la clase en cuestión
                    $probabilidadPriori = $n/$m;
                    $result = 1;
                    //Se obtiene la productoria de los valores obtenidos de las ocurrencias para los valores de una determinada clase. 
                    for ($i=1; $i<count($keyRecintoEstilo); $i++) {
                        $p = $indiceEstilosRecinto[$keyRecintoEstilo[$i]];                        
                        //Se calcula la formula por medio de bayes/naive
                        $result *= ($data[$keyRecintoEstilo[$i]]+($m*$p)) / ($n+$m);
                    }        
                    //Se calcula el valor de la productoria de la clase por el valor de la probabilidad a priori
                    $result = $result * $probabilidadPriori;                                           
                    //Se determina el valor máximo 
                    if ($temp < $result) {
                        $temp = $result;
                        //Es encontrado el valor de la clase que corresponde. 
                        $estilo = $data['Estilo'];
                    }
                }                        
                //Variable para mostrarlo en pantalla                                             
                $activarJQuery = true;      
            }   
            include 'view/ingresarEstilos.php';
            //Se valida cuando se llama la vista del ejercicio 3.2
        } elseif (isset($_GET['recinto'])) {
            //Cuando se calcula el resultado esperado del recinto
            if (isset($_GET['calcularRecinto'])){
                //Se obtiene el indice resumen de los datos de la tabla recintoestilo
                $indices = $this->model->obtenerIndiceSexoRecintoPromedio();                
                //Se obtienen las variables del formulario ingresadas por el usuario
                $tipoAprendizaje = $_POST['estilo'];
                $promedio = $_POST['promedio'];
                $sexo = $_POST['sexo'];
                //Se obtienen los datos de la table de la base de datos
                $datas = $this->model->obtenerRecinto($sexo, $promedio, $tipoAprendizaje);                
                //Se calcula para cada valor recuperado
                 //Se obtienen los porcentajes del indice
                 $indiceRecinto = $indices[0];
                 //Se obtiene el m de la formula
                 $m = $indiceRecinto['m'];   
                 //Inicialización de variables de control             
                 $temp = 0;
                 $recinto = '';
                 //Arreglo con los valores key de la tabla de la base de datos 
                 $keyRecinto = array('Sexo', 'Promedio', 'Estilo');
                 //Se recorren los valores para cada clase
                foreach ($datas as $data){
                    //Se obtiene el n de la clase
                    $n = $data['n'];
                    //Se calcula la propierad a priori de la clase en cuestión
                    $probabilidadPriori = $n/$m;
                    $result = 1;
                    //Se obtiene la productoria de los valores obtenidos de las ocurrencias para los valores de una determinada clase. 
                    for ($i=1; $i<count($keyRecinto); $i++) {
                        $p = $indiceRecinto[$keyRecinto[$i]];                        
                        //Se calcula la formula por medio de bayes/naive
                        $result *= ($data[$keyRecinto[$i]]+($m*$p)) / ($n+$m);
                    }        
                    //Se calcula el valor de la productoria de la clase por el valor de la probabilidad a priori
                    $result = $result * $probabilidadPriori;                                           
                    //Se determina el valor máximo 
                    if ($temp < $result) {
                        $temp = $result;
                        //Es encontrado el valor de la clase que corresponde. 
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
                //Se obtiene el indice resumen de los datos de la tabla recintoestilo
                $indices = $this->model->obtenerIndiceSexoRecintoPromedio();                
                //Se obtienen las variables del formulario ingresadas por el usuario
                $tipoAprendizaje = $_POST['estilo'];
                $promedio = $_POST['promedio'];
                $recinto = $_POST['recinto'];
                //Se obtienen los datos de la table de la base de datos
                $datas = $this->model->obtenerSexo($recinto, $promedio, $tipoAprendizaje);                
                //Se calcula para cada valor recuperado
                 //Se obtienen los porcentajes del indice
                 $indiceSexo = $indices[0];
                 //Se obtiene el m de la formula
                 $m = $indiceSexo['m'];   
                 //Inicialización de variables de control             
                 $temp = 0;
                 $sexo = '';
                 //Arreglo con los valores key de la tabla de la base de datos 
                 $keySexo = array('Recinto', 'Promedio', 'Estilo');
                 //Se recorren los valores para cada clase
                foreach ($datas as $data){
                    //Se obtiene el n de la clase
                    $n = $data['n'];
                    //Se calcula la propierad a priori de la clase en cuestión
                    $probabilidadPriori = $n/$m;
                    $result = 1;
                    //Se obtiene la productoria de los valores obtenidos de las ocurrencias para los valores de una determinada clase. 
                    for ($i=1; $i<count($keySexo); $i++) {
                        $p = $indiceSexo[$keySexo[$i]];                        
                        //Se calcula la formula por medio de bayes/naive
                        $result *= ($data[$keySexo[$i]]+($m*$p)) / ($n+$m);
                    }        
                    //Se calcula el valor de la productoria de la clase por el valor de la probabilidad a priori
                    $result = $result * $probabilidadPriori;                                           
                    //Se determina el valor máximo 
                    if ($temp < $result) {
                        $temp = $result;
                        //Es encontrado el valor de la clase que corresponde. 
                        $sexo = $data['Sexo'] == 'M' ? 'Masculino' : 'Femenino';
                    }
                }                    
                $activarJQuery = true;         
            } 
            include 'view/calcularSexo.php';
            //Se ejecuta cuando se va a mostrar la vista del ejercicio 3.4
        } elseif (isset($_GET['obtenerEstilo'])) {
            //Cuando se va a calcular el estilo
            if (isset($_GET['calcularEstilo'])){                
                //Se obtiene el indice resumen de los datos de la tabla recintoestilo
                $indices = $this->model->obtenerIndiceSexoRecintoPromedio();                
                //Se obtienen las variables del formulario ingresadas por el usuario
                $sexo = $_POST['sexo'];
                $promedio = $_POST['promedio'];
                $recinto = $_POST['recinto'];
                //Se obtienen los datos de la table de la base de datos
                $datas = $this->model->obtenerEstilo($sexo, $recinto, $promedio);                
                //Se calcula para cada valor recuperado
                 //Se obtienen los porcentajes del indice
                 $indiceEstilo = $indices[0];
                 //Se obtiene el m de la formula
                 $m = $indiceEstilo['m'];   
                 //Inicialización de variables de control             
                 $temp = 0;
                 $estilo = '';
                 //Arreglo con los valores key de la tabla de la base de datos 
                 $keySexo = array('Sexo', 'Recinto', 'Promedio');
                 //Se recorren los valores para cada clase
                foreach ($datas as $data){
                    //Se obtiene el n de la clase
                    $n = $data['n'];
                    //Se calcula la propierad a priori de la clase en cuestión
                    $probabilidadPriori = $n/$m;
                    $result = 1;
                    //Se obtiene la productoria de los valores obtenidos de las ocurrencias para los valores de una determinada clase. 
                    for ($i=1; $i<count($keySexo); $i++) {
                        $p = $indiceEstilo[$keySexo[$i]];                        
                        //Se calcula la formula por medio de bayes/naive
                        $result *= ($data[$keySexo[$i]]+($m*$p)) / ($n+$m);
                    }        
                    //Se calcula el valor de la productoria de la clase por el valor de la probabilidad a priori
                    $result = $result * $probabilidadPriori;                                           
                    //Se determina el valor máximo 
                    if ($temp < $result) {
                        $temp = $result;
                        //Es encontrado el valor de la clase que corresponde. 
                        $estilo = $data['Estilo'];
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
                //Se convierten los datos ingresados por el usuario del formulario.
                //Son obtenidos valores equivalentes a la base de datos. 
                $confiabilidad = $_POST['confiabilidad'];                
                $enlaces = $_POST['enlaces'];                
                $capacidad = $_POST['capacidad'];                
                $costo = $_POST['costo'];                

                //Se obtiene el indice resumen de los datos de las redes
                $indices = $this->model->obtenerIndiceRedes();                
                 //Son obtenidos los valores de ocurrencia para los determinados datos en la tabla de redes. 
                $datas = $this->model->obtenerRedes($confiabilidad, $enlaces, $capacidad, $costo);
                //Se obtienen los porcentajes del indice
                $indiceRedes = $indices[0];
                //Se obtiene el m de la formula
                $m = $indiceRedes['M'];                
                //Inicialización de variables de control             
                $temp = 0;
                $tipoRed = '';
                $keyValues = array("Reliability_R", "Number_of_links_L", "Capacity_Ca", "Costo_Co");
                //Se recorren los valores para cada clase
                foreach ($datas as $data) {
                    //Se obtiene el n de la clase
                    $n = $data['n'];                
                    //Se calcula la propierad a priori de la clase en cuestión
                    $probabilidadPriori = $n/$m;                    
                    $result = 1;
                    //Se obtiene la productoria de los valores obtenidos de las ocurrencias para los valores de una determinada clase. 
                    for ($i=0; $i<count($keyValues); $i++) {                                  
                        $p = $indiceRedes[$keyValues[$i]];                           
                        //Se calcula la formula por medio de bayes/naive
                        $result *= ($data[$keyValues[$i]]+($m*$p)) / ($n+$m);                        
                    }        
                    //Se calcula el valor de la productoria de la clase por el valor de la probabilidad a priori
                    $result = $result * $probabilidadPriori;                                                               
                    //Se determina el valor máximo 
                    if ($temp < $result) {
                        $temp = $result;
                        //Es encontrado el valor de la clase que corresponde. 
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