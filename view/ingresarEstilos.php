<?php
//header
include_once 'header.php';
?>
<br/><br/>
<div class="container" >
<p class="western" align="justify" lang="es-ES"><font color="#2b69ce"><font size="3"><b>CUAL ES SU ESTILO DE APRENDIZAJE?</b></font></font></p>
    <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"><b>Instrucciones:</b></font></font></p>

    <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> </font></font></p>

    <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> Para
    utilizar el instrumento usted debe conceder una calificación alta a
    aquellas palabras que mejor caracterizan la forma en que usted
    aprende, y una calificación baja a las palabras que menos
    caracterizan su estilo de aprendizaje.</font></font></p>

    <p class="western" align="justify" lang="es-ES"> Le puede ser difícil seleccionar
    las palabras que mejor describen su estilo de aprendizaje, ya que no
    hay respuestas correctas o incorrectas.</p>

    <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> Todas
    las respuestas son buenas, ya que el fin del instrumento es describir
    cómo y no juzgar su habilidad para aprender.</font></font></p>

    <p class="western" align="justify" lang="es-ES"><font color="#000000"><font size="3"> De
    inmediato encontrará nueve series o líneas de cuatro palabras cada una.
    Ordene de mayor a menor cada serie o juego de cuatro palabras que hay en cada línea,
    ubicando 4 en la palabra que mejor caracteriza su estilo de
    aprendizaje, un 3 en la palabra siguiente en cuanto a la
    correspondencia con su estilo; a la siguiente un 2, y un 1 a la
    palabra que menos caracteriza su estilo. Tenga cuidado de ubicar un
    número distinto al lado de cada palabra en la misma línea. </font></font></p>
    
    <big><big><br>
    Yo aprendo...</big></big>
    <form name="estilo" action="?ingresarEstilos&calcular" method="post">
    <table class="table table-striped table-bordered table-hover" style="width=100%;">
        <tbody>
        <tr>
            <td >
                <select name="c1" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em; font-size: auto;">discerniendo</p>
                <br>
            </td>
            <td >
                <select name="c2" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">ensayando</p>
                <br>
            </td>
            <td >
                <select name="c3" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">involucrándome</p>
            </td>
            <td >
                <select name="c4" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">practicando</p>
            </td>
        </tr>
        <tr>
            <td >
                <select name="c5" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">receptivamente</p>
            </td>
            <td >
                <select name="c6" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">relacionando</p>
            </td>
            <td >
                <select name="c7" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">analíticamente</p>
            </td>
            <td >
                <select name="c8" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">imparcialmente</p>
            </td>
        </tr>
        <tr>
            <td >
                <select name="c9" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">sintiendo</p>
            </td>
            <td >
                <select name="c10" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">observando</p>
            </td>
            <td >
                <select name="c11" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">pensando</p>
            </td>
            <td >
                <select name="c12" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">haciendo</p>
            </td>
        </tr>
        <tr>
            <td >
                <select name="c13" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">aceptando</p>
            </td>
            <td >
                <select name="c14" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">arriesgando</p>
            </td>
            <td >
                <select name="c15" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">evaluando</p>
            </td>
            <td >
                <select name="c16" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">con cautela</p>
            </td>
        </tr>
        <tr>
            <td>
                <select name="c17" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">intuitivamente</p>
            </td>
            <td >
                <select name="c18" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">productivamente</p>
            </td>
            <td>
                <select name="c19" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">lógicamente</p>
            </td>
            <td >
                <select name="c20" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">cuestionando</p>
            </td>
        </tr>
        <tr>
            <td >
                <select name="c21" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">abstracto</p>
            </td>
            <td >
                <select name="c22" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">observando</p>
            </td>
            <td >
                <select name="c23" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">concreto</p>
            </td>
            <td>
                <select name="c24" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">activo</p>
            </td>
        </tr>
        <tr>
            <td >
                <select name="c25" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">orientado al presente</p>
            </td>
            <td >
                <select name="c26" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">reflexivamente</p>
            </td>
            <td >
                <select name="c27" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">orientado hacia el futuro</p>
            </td>
            <td>
                <select name="c28" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">pragmático</p>
            </td>
        </tr>
        <tr>
            <td >
                <select name="c29" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right;">aprendo más de la experiencia</p>
            </td>
            <td >
                <select name="c30" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right;">aprendo más de la observación</p>
            </td>
            <td >
                <select name="c31" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right;">aprendo más de la conceptualización</p>
            </td>
            <td >
                <select name="c32" class="form-control" style="width: auto; float:left"> 
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right;">aprendo más de la experimentación</p>
            </td>
        </tr>
        <tr>
            <td >
                <select name="c33" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">emotivo</p>
            </td>
            <td >
                <select name="c34" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">reservado</p>
            </td>
            <td >
                <select name="c35" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">racional</p>
            </td>
            <td >
                <select name="c36" class="form-control" style="width: auto; float:left">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <p style="float:right; padding-right: 1em;">abierto</p>
            </td>
        </tr>
        </tbody>
    </table>
    <br>
    <div style="width: 40%" >
        <input value="Calcular" type="submit" class="btn btn-primary" style="float: left;" id="enviar">        
        
        <label  style="float: center; ">Estilo</label>
        <?php 
            if(isset($estilo)){
                ?>
            <input maxlength="12" size="12" name="ESTILOFINAL" class="form-control" style="width:30%; float: right;" value="<?php echo $estilo; ?>">
            <?php
            }
        ?>
    </div> 
    <br>
</form>
</div>
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