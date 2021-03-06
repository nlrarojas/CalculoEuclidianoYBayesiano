<?php
//header
include_once 'header.php';
?>

<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"><b>Instrucciones:</b></font></font></p>

<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> </font></font></p>

<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> 
Este formulario le permite identificar el recinto en el que su tipo de aprendizaje predomina.<br/>
Debe de seleccionar su estilo de aprendizaje de los cuatro usados su último promedio de matrícula  y su sexo</font></font></p>
<form action="?recinto&calcularRecinto" method="post">
    <table class="table table-striped table-bordered table-hover" style="width:50%;">
        <tbody>
            <tr>
                <td>
                    <label>Tipo de aprendizaje</label>
                </td>
                <td>
                    <label>Último promedio de matrícula</label>   
                </td>
                <td >
                    <label>Sexo</label>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="estilo" class="form-control" style="float:left">
                        <option value="DIVERGENTE">Divergente</option>
                        <option value="CONVERGENTE">Convergente</option>
                        <option value="ASIMILADOR">Asimilador</option>
                        <option value="ACOMODADOR">Acomodar</option>
                    </select>
                </td>
                <td>
                    <input name="promedio" type="number" min="0" max="10" required="true" style="width: 80%; float: left;" class="form-control"  step="0.01"/>
                </td>
                <td>
                    <select name="sexo" class="form-control" style="float:left">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>    
                    </select>
                </td>                
            </tr>
        </tbody>
    </table>   
    <div style="width:90%;">
        <input value="Calcular" type="submit" class="btn btn-primary" style="width: 15%; float: left;" id="enviar">
        <label  style="float: left; width: 20%;">Recinto</label>
        <?php 
            if(isset($recinto)){
                ?>
            <input maxlength="12" size="12" name="ESTILOFINAL" class="form-control" style="width:20%;" value="<?php echo $recinto; ?>">   
        <?php
            }
        ?>
    </div>       
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