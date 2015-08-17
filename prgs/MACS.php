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
<html>
<head>
  <style> 
  img, span{
    vertical-align:middle;
}
  </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/test.css">
<title>MACS</title>
</head>
<body>
 <div id="colorstrip">
<h1>MACS</h1>
</div>

<form action='MACS.php' method='POST'>
<fieldset>
<p>La habilidad del niño para manipular objetos en actividades diarias importantes, por ejemplo durante el juego y tiempo libre, comer y vestir.</p>
<select name='mnivel' id='mnivel'>
  <option value="1"> I.- Manipula objetos fácil y exitosamente.</option>
  <option value="2"> II.- Manipula la mayoría de los objetos pero con un poco de reducción en la calidad y/o velocidad del logro.</option>
  <option value="3"> III.- Manipula los objetos con dificultad; necesita ayuda para preparar y/o modificar actividades.</option>
  <option value="4"> IV.- Manipula una limitada selección de objetos fácilmente manipulables en situaciones adaptadas.</option>
  <option value="5"> V.- No manipula objetos y tiene habilidad severamente limitada para ejecutar aún acciones sencillas.</option>
</select>
<br />
<h2>Observaciones</h2>
<textarea rows="7" cols="70" name='observacion' id='observacion'> </textarea>
<input name='codusr' id='codusr' type='hidden' value='<?php echo $auxcodusr?>'>
</br></br>
<button type="submit" class="wideButton" id='grabar' name='grabar'>
 <img src="../img/guardar.png" alt="Save icon"/> <strong>GRABAR</strong> 
</button>
<input name='codusr' id='codusr' type='hidden' value='<?php echo $auxcodusr?>'>
</fieldset>
</form>
</body>
</html>

<?php }else{
//SE GRABA LA INFORMACION EN LA BDD
$auxcodusr=$_POST['codusr'];
$auxmnivel=$_POST['mnivel'];
$auxobservacion=$_POST['observacion'];


$db=omnisoftConnectDB();

$auxsql="INSERT INTO Macs (codigoUsuario,nivelMacs,observacionesMacs) values (?,?,?)";
$a_bind_params = array($auxcodusr,$auxmnivel,$auxobservacion);

//echo $auxsql;
//print_r($a_bind_params);

$rs = $db->Execute($auxsql, $a_bind_params);
 
if($rs=== false) {?>
 <script> alert("** ERROR: PROBLEMA AL GRABAR **");
window.location.href = 'MACS.php?auxcod=<?php echo $auxcodusr?>';
</script> 

  
<?php  
  }else{
?>
<script> alert("Se ha guardado exitosamente");
window.location.href = 'MACS.php?auxcod=<?php echo $auxcodusr?>';
</script>


<?php 
    }
}?>
