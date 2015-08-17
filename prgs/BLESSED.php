<?php
//Librerias Adodb
include('../lib/adodb/adodb.inc.php');
include('../config/conmysql.php');

//Funcion para conectarse a la BDD
function omnisoftConnectDB() {
global $DBConnection;
$dblink = NewADOConnection($DBConnection);
return $dblink;
}

if(isset($_GET['auxevi']))
    $auxserial_caev=$_GET['auxevi'];
    
if(isset($_GET['auxcod']))
    $auxcodusr=$_GET['auxcod'];

if(!$_POST){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <style> 
  img, span{
    vertical-align:middle;
}
  </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BLESSED</title>
<link rel="stylesheet" type="text/css" href="../css/test.css">
</head>

<body>
  <div id="colorstrip">
    <h1> Escala de demencia de Blessed, Timiison y Roth 
 </h1>
  </div>
  
    <form action='BLESSED.php' method='POST'>
<fieldset>

<p><b>A-CAMBIOS EN LA EJECUCIÓN DE LAS ACTIVIDADES DIARIAS </b></p>

<p>1. Incapacidad para realizar tareas domésticas </p>
<select name='tdomesticas' id='tdomesticas'>
   <option value="0">NINGUNA</option>
   <option value="0.5">PARCIAL</option>
   <option value="1">TOTAL</option> 
</select> 

<p>2. Incapacidad para el uso de pequeñas cantidades de dinero </p>
<select name='udinero' id='udinero'>
   <option value="0">NINGUNA</option>
   <option value="0.5">PARCIAL</option>
   <option value="1">TOTAL</option> 
</select> 


<p>3. Incapacidad para recordar listas cortas de elementos (p. ej. compras, etc.) </p>
<select name='rlistasc' id='rlistasc'>
   <option value="0">NINGUNA</option>
   <option value="0.5">PARCIAL</option>
   <option value="1">TOTAL</option> 
</select> 


<p>4. Incapacidad para orientarse en casa </p>
<select name='ocasa' id='ocasa' >
   <option value="0">NINGUNA</option>
   <option value="0.5">PARCIAL</option>
   <option value="1">TOTAL</option> 
</select> 


<p>5. Incapacidad para orientarse en calles familiares </p>
<select name='ocalles' id='ocalles'>
   <option value="0">NINGUNA</option>
   <option value="0.5">PARCIAL</option>
   <option value="1">TOTAL</option> 
</select> 


<p>6. Incapacidad para valorar el entorno (p.ej. reconocer si está en casa o en ei hospital, discriminar entre parientes, médicos y enfeneras, etc.) </p>
<select name='ventorno' id='ventorno'>
   <option value="0">NINGUNA</option>
   <option value="0.5">PARCIAL</option>
   <option value="1">TOTAL</option> 
</select> 



<p>7. Incapacidad para recordar hechos recientes (p. ej. visitas de parientes o amigos, etc.) </p>
<select name='rhechos' id='rhechos'>
   <option value="0">NINGUNA</option>
   <option value="0.5">PARCIAL</option>
   <option value="1">TOTAL</option> 
</select> 


<p>8. Tendencia a rememorar el pasado </p>
<select name='rpasado' id='rpasado'>
   <option value="0">NINGUNA</option>
   <option value="0.5">PARCIAL</option>
   <option value="1">TOTAL</option> 
</select> 
 

<p><b>B.-CAMBIOS EN LOS HABITOS </b></p>

<p>9. Comer: </p>
<select name='comer' id='comer'>
   <option value="0">Limpiamente, con los cubiertos adecuados </option>
   <option value="1">Desaliñadamente, sólo con la cuchara</option>
   <option value="2">Sólidos simples (galletas)</option> 
   <option value="3">Ha de ser alimentado </option> 
</select> 

<p>10. Vestir: </p>
<select name='vestir' id='vestir'>
   <option value="0"> Se viste sin ayuda </option>
   <option value="1">Fallos ocasionales (en el abotonamiento) </option>
   <option value="2">Errores y olvidos frecuentes en la secuencia de vestirse </option> 
   <option value="3">Incapaz de vestirse </option> 
</select> 

<p>11. Control de esfínteres: </p>
<select name='cesfinteres' id='cesfinteres'>
   <option value="0">Normal </option>
   <option value="1">Incontinencia urinaria ocasional </option>
   <option value="2">Incontinencia urinaria frecuente </option> 
   <option value="3"> Doble incontinencia</option> 
</select> 
<p><b>C.-CAMBIOS DE PERSONALIDAD Y CONDUCTA </b></p>

<p>12. Retraimiento creciente </p>
<select name='rcreciente' id='rcreciente'>
   <option value="0">NO</option>
   <option value="1">SI</option>
</select> 

<p>13. Egocentrismo aumentado </p>
<select name='eaumentado' id='eaumentado'>
   <option value="0">NO</option>
   <option value="1">SI</option>
</select> 

<p>14. Pérdida de interés por los sentimientos de otros </p>
<select name='psentimientos' id='psentimientos'>
    <option value="0">NO</option>
    <option value="1">SI</option>
</select>

<p>15. Afectividad embotada </p>
<select name='aembotada' id='aembotada'>
    <option value="0">NO</option>
    <option value="1">SI</option>
</select> 

<p>16. Perturbación del control emocional (aumento de la susceptibilidad e irritabilidad). </p>
<select name='cemocional' id='cemocional'>
    <option value="0">NO</option>
    <option value="1">SI</option>
</select> 

<p>17. Hilaridad Inapropiada </p>
<select name='hinapropiada' id='hinapropiada'>
    <option value="0">NO</option>
    <option value="1">SI</option>
</select>

<p>18. Respuesta emocional disminuida </p>
<select name='remocionald' id='remocionald'>
    <option value="0">NO</option>
    <option value="1">SI</option>
</select>

<p>19. Indiscreciones sexuales (de aparición reciente) </p>
<select name='isexuales' id='isexuales'>
    <option value="0">NO</option>
    <option value="1">SI</option>
</select> 

<p>20. Falta de interés en las aficiones habituales </p>
<select name='ahabituales' id='ahabituales'>
    <option value="0">NO</option>
    <option value="1">SI</option>
</select> 

<p>21. Disminución de la iniciativa o apatía progresiva </p>
<select name='aprogresiva' id='aprogresiva'>
    <option value="0">NO</option>
    <option value="1">SI</option>
</select> 

<p>22. Hiperactividad no justificada </p>
<select name='hnjustificada' id='hnjustificada'>
   <option value="0">NO</option>
   <option value="1">SI</option>
</select> 

<p>
 <button type="submit" class="wideButton" id='grabar' name='grabar'>
 <img src="../img/guardar.png" alt="Save icon"/> <strong>GRABAR</strong> 
</button></p>
<input name='codusr' id='codusr' type='hidden' value='<?php echo $auxcodusr?>'>
</fieldset>
</form>
</body>
</html>
<?php }else{
//SE GRABA LA INFORMACION EN LA BDD
$auxcodusr=$_POST['codusr'];
$auxtdomesticas=$_POST['tdomesticas'];
$auxudinero=$_POST['udinero'];
$auxrlistasc=$_POST['rlistasc'];
$auxocasa=$_POST['ocasa'];
$auxocalles=$_POST['ocalles'];
$auxventorno=$_POST['ventorno'];
$auxrhechos=$_POST['rhechos'];
$auxrpasado=$_POST['rpasado'];
$auxcomer=$_POST['comer'];
$auxvestir=$_POST['vestir'];
$auxcesfinteres=$_POST['cesfinteres'];
$auxrcreciente=$_POST['rcreciente'];
$auxeaumentado=$_POST['eaumentado'];
$auxpsentimientos=$_POST['psentimientos'];
$auxaembotada=$_POST['aembotada'];
$auxcemocional=$_POST['cemocional'];
$auxhinapropiada=$_POST['hinapropiada'];
$auxremocionald=$_POST['remocionald'];
$auxisexuales=$_POST['isexuales'];
$auxahabituales=$_POST['ahabituales'];
$auxaprogresiva=$_POST['aprogresiva'];
$auxhnjustificada=$_POST['hnjustificada'];
$auxresultado=$auxtdomesticas+$auxudinero+$auxrlistasc+$auxocasa+$auxocalles+$auxventorno+$auxrhechos+$auxrpasado+$auxcomer+$auxvestir+$auxcesfinteres+$auxrcreciente+$auxeaumentado+$auxpsentimientos+$auxaembotada+$auxcemocional+$auxhinapropiada+$auxremocionald+$auxisexuales+$auxahabituales+$auxaprogresiva+$auxhnjustificada;



$db=omnisoftConnectDB();

$auxsql="INSERT INTO Blessed(codigoUsuario,pregunta1A,pregunta2A,pregunta3A,pregunta4A, pregunta5A,pregunta6A,pregunta7A,pregunta8A,pregunta1B,pregunta2B,pregunta3B,pregunta1C,pregunta2C,pregunta3C, pregunta4C,pregunta5C,pregunta6C,pregunta7C,pregunta8C,pregunta9C,pregunta10C,pregunta11C,resultadoBlessed)  values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$a_bind_params = array($auxcodusr,$auxtdomesticas,$auxudinero,$auxrlistasc,$auxocasa,$auxocalles,$auxventorno,$auxrhechos,$auxrpasado,$auxcomer,$auxvestir,$auxcesfinteres,$auxrcreciente,$auxeaumentado,$auxpsentimientos,$auxaembotada,$auxcemocional,$auxhinapropiada,$auxremocionald,$auxisexuales,$auxahabituales,$auxaprogresiva,$auxhnjustificada,$auxresultado);

//echo $auxsql;
//print_r($a_bind_params);

$rs = $db->Execute($auxsql, $a_bind_params);
 
if($rs=== false) {?>
 <script> alert("** ERROR: PROBLEMA AL GRABAR **");
window.location.href = 'BLESSED.php?auxcod=<?php echo $auxcodusr?>';
</script> 

  
<?php  
  }else{
?>
<script> alert("Se ha guardado exitosamente \nResultado:<?php echo $auxresultado;?>");
window.location.href = 'BLESSED.php?auxcod=<?php echo $auxcodusr?>';
</script>


<?php 
    }
}?>


