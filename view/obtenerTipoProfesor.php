<?php
//header
include_once 'header.php';
?>

<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"><b>Instrucciones:</b></font></font></p>

<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> </font></font></p>

<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3">
Este formulario le permite identificar su tipo de profesor.<br/>
Ingrese los datos en el formulario</font></font></p>
<form action="?tipoProfesor&calcularTipoProfesor" method="post">
    <table class="table table-striped table-bordered table-hover" >
        <tbody>
            <tr>
                <td>
                    <label >Edad</label>
                </td>
                <td>
                    <label >Género</label>   
                </td>
                <td >
                    <label >Autoevaluación</label>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="edad" class="form-control" style="float:left">
                        <option value="1">Menos de 30 años</option>
                        <option value="2">Más de 30 años pero menos de 55 años</option>
                        <option value="3">Más de 55 años</option>
                    </select>
                </td>
                <td>
                <select name="genero" class="form-control" style="float:left">
                        <option value="1">Femenino</option>
                        <option value="2">Masculino</option>    
                        <option value="3">No indicado</option>    
                    </select>
                </td>
                <td>
                    <select name="autoevaluacion" class="form-control" style="float:left">
                        <option value="1">Principiante</option>
                        <option value="2">Intermedio</option>   
                        <option value="3">Avanzado</option> 
                    </select>
                </td>                
            </tr>
        </tbody>
    </table>   
    <br/><br/>
    <table class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td>
                    <label >Veces que ha impartido el curso</label>
                </td>
                <td>
                    <label >Disciplina</label>   
                </td>
                <td >
                    <label >Habilidad en el uso de computadoras</label>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="vecesImpartido" class="form-control">
                        <option value="1">Nunca</option>
                        <option value="2">De 1 a 5 veces</option>
                        <option value="3">Más de 5 veces</option>
                    </select>
                </td>
                <td>
                <select name="disciplina" class="form-control">
                        <option value="1">Toma de desiciones</option>
                        <option value="2">Diseño de redes</option>    
                        <option value="3">Otra</option>    
                    </select>
                </td>
                <td>
                    <select name="usoComputadoras" class="form-control">
                        <option value="1">Bajo</option>
                        <option value="2">Medio</option>   
                        <option value="3">Alto</option> 
                    </select>
                </td>                
            </tr>
        </tbody>
    </table>   
    <br/><br/>
    <table class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td>
                    <label>Habilidad en tecnologías WEB</label>
                </td>
                <td>
                    <label >Experiencia usando sitios WEB</label>   
                </td>                
            </tr>
            <tr>
                <td>
                    <select name="habilidadWeb" class="form-control">
                        <option value="1">Nunca</option>
                        <option value="2">Algunas veces</option>
                        <option value="3">Amenudo</option>
                    </select>
                </td>
                <td>
                    <select name="experienciaWeb" class="form-control">
                        <option value="1">Nunca</option>
                        <option value="2">Algunas veces</option>
                        <option value="3">Amenudo</option>
                    </select>
                </td>                             
            </tr>
        </tbody>
    </table>   
    <br/><br/>
    <input value="Calcular" type="submit" class="btn btn-primary" style="width:10%; float: left;" id="enviar">
    <label  style="float: left; width: 20%;">Tipo de profesor</label>
    <?php 
        if(isset($tipoProfesor)){
            ?>
            <input maxlength="12" size="12" name="ESTILOFINAL" class="form-control" style="width:20%;" value="<?php echo $tipoProfesor; ?>">     
        <?php
        }
        ?>            
    <br/><br/><br/>    
</form>
<?php 
    if (isset($activarJQuery)) {
?>
<script type="text/javascript">    
    $(function a(){
        var altura = $(document).height();
        $("html, body").animate({scrollTop:altura+"px"});            
    });    
    a();
</script>

<?php
    }
//footer
include_once 'footer.php';
?>