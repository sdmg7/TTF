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
<title>FMS</title>
</head>
<body>
 <div id="colorstrip">
<h1>FMS</h1>
</div>
<form action='FMS.php' method='POST'>
<fieldset>
<p> ¿Cómo el usuario se mueve en distancias cortas en casa? (5m)</p>
<select name='dcincom' id='dcincom'>
  <option value="1"> 1. Usa silla de ruedas. </option>
  <option value="2"> 2. Utiliza un caminador o un marco. </option>
  <option value="3"> 3. Usa muletas.</option>
  <option value="4"> 4. Utilización bastones (uno o dos).</option>
  <option value="5"> 5. Independiente en superficies a nivel.</option>
  <option value="6"> 6. Independiente en todas las superficies.</option>
</select>
<br />
<p> ¿Cómo el usuario se mueve en y entre las clases en la escuela? (50m)</p>
<select name='dcincuentam' id='dcincuentam'>
  <option value="1"> 1. Usa silla de ruedas. </option>
  <option value="2"> 2. Utiliza un caminador o un marco. </option>
  <option value="3"> 3. Usa muletas.</option>
  <option value="4"> 4. Utilización bastones (uno o dos).</option>
  <option value="5"> 5. Independiente en superficies a nivel.</option>
  <option value="6"> 6. Independiente en todas las superficies.</option>
</select>
<br />
<p> ¿Cómo el usuario se mueve en largas distancias,como en el centro comercial? (500m)</p>
<select name='dquinientosm' id='dquinientosm'>
  <option value="1"> 1. Usa silla de ruedas. </option>
  <option value="2"> 2. Utiliza un caminador o un marco. </option>
  <option value="3"> 3. Usa muletas.</option>
  <option value="4"> 4. Utilización bastones (uno o dos).</option>
  <option value="5"> 5. Independiente en superficies a nivel.</option>
  <option value="6"> 6. Independiente en todas las superficies.</option>
</select>
<br />

<h2>Observaciones</h2>
<textarea rows="7" cols="70" name='observacion' id='observacion'> </textarea>

<input name='codusr' id='codusr' type='hidden' value='<?php echo $auxcodusr?>'>
</br></br>
 <button type="submit" class="wideButton" id='grabar' name='grabar'>
 <img src="../img/guardar.png" alt="Save icon"/> <strong>GRABAR</strong> 
</button>

</fieldset>
</form>
</body>
</html>
<?php }else{
//SE GRABA LA INFORMACION EN LA BDD

$auxcodusr=$_POST['codusr'];
$auxdcincom=$_POST['dcincom'];
$auxdcincuentam=$_POST['dcincuentam'];
$auxdquinientosm=$_POST['dquinientosm'];
$auxobservacion=$_POST['observacion'];


$db=omnisoftConnectDB();

$auxsql="INSERT INTO Fms (codigoUsuario,5mFms,50mFms,500mFms,observacionesFms) values (?,?,?,?,?)";
$a_bind_params = array($auxcodusr,$auxdcincom,$auxdcincuentam,$auxdquinientosm,$auxobservacion);

//echo $auxsql;
//print_r($a_bind_params);

$rs = $db->Execute($auxsql, $a_bind_params);
 
if($rs=== false) {?>
 <script> alert("** ERROR: PROBLEMA AL GRABAR **");
window.location.href = 'FMS.php?auxcod=<?php echo $auxcodusr?>';
</script> 

  
<?php  
  }else{
?>
<script> alert("Se ha guardado exitosamente");
window.location.href = 'FMS.php?auxcod=<?php echo $auxcodusr?>';
</script>


<?php 
    }
}?>


