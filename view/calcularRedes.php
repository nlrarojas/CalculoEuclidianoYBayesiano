<?php
//header
include_once 'header.php';
?>

<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"><b>Instrucciones:</b></font></font></p>

<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> </font></font></p>

<p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3">
Este formulario le permite identificar su tipo de profesor.<br/>
Ingrese los datos en el formulario</font></font></p>
<form action="?redes&calcularRedes" method="post">
    <table class="table table-striped table-bordered table-hover">
        <tbody>
            <tr>
                <td>
                    <label>Confiabilidad de la red</label>
                </td>
                <td>
                    <label >Número de enlaces</label>   
                </td>
                <td >
                    <label >Capacidad de la red</label>
                </td>
                <td >
                    <label >Costo de la red</label>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="confiabilidad" class="form-control">
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </td>
                <td>
                <select name="enlaces" class="form-control">
                        <option value="7">7</option>
                        <option value="8">8</option>    
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>    
                        <option value="19">19</option>
                        <option value="20">20</option>
                    </select>
                </td>
                <td>
                    <select name="capacidad" class="form-control">
                        <option value="Low">Bajo</option>
                        <option value="Medium">Medio</option>   
                        <option value="High">Alto</option> 
                    </select>
                </td> 
                <td>
                    <select name="costo" class="form-control">
                        <option value="Low">Bajo</option>
                        <option value="Medium">Medio</option>   
                        <option value="High">Alto</option> 
                    </select>
                </td>                
            </tr>
        </tbody>
    </table>   
    <br/><br/>
    <input value="Calcular" type="submit" class="btn btn-primary" style="width:10%; float: left;" id="enviar">
    <label  style="float: left; width: 20%;">Resultado</label>
    <?php 
        if(isset($tipoRed)){
            ?>
        <input maxlength="12" size="12" name="ESTILOFINAL" class="form-control" style="width:20%;" value="<?php echo $tipoRed; ?>">     
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