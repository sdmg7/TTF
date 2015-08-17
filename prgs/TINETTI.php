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



<html>
  <head>
    <style> 
  img, span{
    vertical-align:middle;
}
  </style>
<link rel="stylesheet" type="text/css" href="../css/test.css">
  <title>ESCALA DE TINETTI</title>   
  </head>
  <body>
  <div id="colorstrip">
    <h1> ESCALA DE TINETTI</h1>
  </div>
  
  <form  action="TINETTI.php" method="POST">
<fieldset>
  
  EVALUACION DE LA MARCHA Y EL EQUILIBRIO
  <br>
  <br>
  <label><b>1. MARCHA</b> Instrucciones: El paciente permanece de pie con el examinador, camina por el pasillo o por 

la habitaci&oacute;n (unos 8 metros) a "paso normal" luego regresa a "paso ligero pero seguro".</label>
  
  
  
 <p>  1. Iniciaci&oacute;n de la marcha (inmediatamente despu&eacute;s de decir que ande).</p>
  
<select name='marcha' id='marcha'>
 <option value="0">Algunas vacilaciones o m&uacute;ltiples para empezar </option>
 <option value="1">No vacila</option>
</select>
  
  
<p>2.Longitud y altura de peso</p>

<p>a) Movimiento del pie derecho </p>
  
<select name='derecho1' id='derecho1'>
 <option value="0">No sobrepasa el pie izquierdo con el paso </option>
 <option value="1">Sobrepasa el pie izquierdo</option>
 </select>
 <select name='derecho2' id='derecho2'>
 <option value="0">El pie derecho no se separa completamente del suelo con el peso</option>
 <option value="1">El pie derecho se separa completamente del suelo</option>
 </select>
 
<p>b) Movimiento del pie izquierdo </p>

<select name='izquierdo1' id='izquierdo1'>
 <option value="0">No sobrepasa el pie derecho con el paso </option>
 <option value="1">Sobrepasa el pie derecho</option>
 </select>
 <select name='izquierdo2' id='izquierdo2'>
 <option value="0">El pie izquierdo no se separa completamente del suelo con el peso</option>
 <option value="1">El pie izquierdo se separa completamente del suelo</option>
 </select>
 
<p> 3. Simetr&iacute;a del paso</p>
<select name='simetria'>
 <option value="0">La longitud de los pasos con los pies derecho e izquierdo no es igual</option>
 <option value="1">La longitud parece igual</option>
 </select>
 
<p>4. Fluidez del paso</p>
<select name='fluidez' id='fluidez'>
 <option value="0">Paradas entre los pasos</option>
 <option value="1">Los pasos parecen continuos</option>
 </select> 
 
<p>5. Trayectoria (observar el trazado que realiza uno de los pies durante unos 3 metros) </p>
<select name='trayectoria' id='trayectoria'>
 <option value="0">Desviaci&oacute;n grave de la trayectoria </option>
 <option value="1">Leve/moderada desviaci&oacute;n o uso de ayudas para mantener la trayectoria</option>
 <option value="2">Sin desviación o ayudas. </option>
 </select> 

<p>6. Tronco</p>
 <select name='tronco' id='tronco'>
 <option value="0">Balanceo marcado o uso de ayudas</option>
 <option value="1">No se balancea pero flexiona las rodillas o la espalda o separa los brazos al caminar </option>
 <option value="2">No se balancea, no se reflexiona, ni otras ayudas  </option>
 </select> 

<p>7. Postura al caminar </p>
 <select name='postura' id='postura'>
 <option value="0">Talones separados</option>
 <option value="1">Talones casi juntos al caminar </option>
  </select> 
 
<p><b><label>2. EQUILIBRIO</b> Instrucciones: El paciente est&aacute; sentado en una silla dura sin apoyabrazos. Se realizan 
las siguientes maniobras:</label></p>

<p>1.-Equilibrio sentado</p>
  <select name='equilibrio' id='equilibrio'>
 <option value="0">Se inclina o se desliza la silla</option>
 <option value="1">Se mantiene seguro</option>
 </select> 

<p>2.-Levantarse</p>
  <select name='levantarse' id='levantarse'>
 <option value="0">Imposible sin ayuda</option>
 <option value="1">Capaz, pero usa los brazos para ayudarse</option>
 <option value="2">Capaz de levantarse de un solo intento</option>
 </select> 
 
<p>3.-Intentos para levantarse </p>
  <select name='intentos' id='intentos'>
 <option value="0">Incapaz sin ayuda</option>
 <option value="1">Capaz pero necesita mas de un intento</option>
 <option value="2">Capaz de levantarse de un solo intento</option>
 </select> 
 
<p>4.-Equilibrio en bipedestaci&oacute;n inmediata (los primeros 5 segundos)</p>
<select name='equilibrioeb' id='equilibrioeb'>
<option value="0">Inestable (se tambalea, mueve los pies), marcado balanceo del tronco</option>
<option value="1">Estable pero usa el andador, bast&oacute;n o se agarra u otro objeto para mantenerse</option>
<option value="2">Estable sin andador, bast&oacute;n u otros soportes</option>
</select> 

<p>5.- Equilibrio en bipedestaci&oacute;n</p>

<select name='ebipedestacion' id='ebipedestacion'>
<option value="0">Inestable</option>
<option value="1">Estable, pero con apoyo amplio (talones separados m&aacute;s de 10 cm) o usa bast&oacute;n u otro soporte</option>
<option value="2">Apoyo estrecho sin soporte</option>
</select> 

<p>6.- Empujar (el paciente en bipedestaci&oacute;n con el tronco erecto y los pies tan juntos como sea
posible). El examinador empuja suavemente en el estern&oacute;n del paciente con la palma de la mano, tres 
veces.</p>

<select name='empujar' id='empujar'>
<option value="0">Empieza a caerse </option>
<option value="1">Se tambalea, se agarra pero se mantiene</option>
<option value="2">Estable</option>
</select> 
<p>7.-Ojos cerrados ( en la posición 6)</p>
<select name='ojoscerrados' id='ojoscerrados'>
<option value="0">Inestable </option>
<option value="1">Estable</option>
</select>

<p>8.-Vuelta de 360 grados</p>

<select name='vuelta360' id='vuelta360'>
<option value="0">Pasos discontinuos</option>
<option value="1">Continuos</option>
</select> 

<select name='vuelta3602' id='vuelta3602'>
<option value="0">Inestable (se tambalea , se agarra)</option>
<option value="1">Estable</option>
</select> 

<p>9.-Sentarse </p>
<select name='sentarse' id='sentarse'>
<option value="0">Inseguro, calcula mal la distancia, cae en la silla</option>
<option value="1">Usa los brazos o el movimiento es brusco </option>
<option value="2">Seguro , movimiento suav e</option>
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
$auxmarcha=$_POST['marcha'];
$auxderecho1=$_POST['derecho1'];
$auxderecho2=$_POST['derecho2'];
$auxizquierdo1=$_POST['izquierdo1'];
$auxizquierdo2=$_POST['izquierdo2'];
$auxsimetria=$_POST['simetria'];
$auxfluidez=$_POST['fluidez'];
$auxtrayectoria=$_POST['trayectoria'];
$auxtronco=$_POST['tronco'];
$auxpostura=$_POST['postura'];
$auxequilibrio=$_POST['equilibrio'];
$auxlevantarse=$_POST['levantarse'];
$auxintentos=$_POST['intentos'];
$auxequilibrioeb=$_POST['equilibrioeb'];
$auxebipedestacion=$_POST['ebipedestacion'];
$auxempujar=$_POST['empujar'];
$auxojoscerrados=$_POST['ojoscerrados'];
$auxvuelta360=$_POST['vuelta360'];
$auxvuelta3602=$_POST['vuelta3602'];
$auxsentarse=$_POST['sentarse'];
$auxresultado=$auxmarcha+$auxderecho1+$auxderecho2+$auxizquierdo1+$auxizquierdo2+$auxsimetria+$auxfluidez+$auxtrayectoria+$auxtronco+$auxpostura+$auxequilibrio+$auxlevantarse+$auxintentos+$auxequilibrioeb+$auxebipedestacion+$auxempujar+$auxojoscerrados+$auxvuelta360+$auxvuelta3602+$auxsentarse;


$db=omnisoftConnectDB();

$auxsql="INSERT INTO Tinetti(codigoUsuario,marchaTinetti,longitudDerecho1Tinetti,longitudDerecho2Tinetti,longitudIzquierdo1Tinetti,longitudIzquierdo2Tinetti,simetriaTinetti,fluidezTinetti,trayectoriaTinetti,troncoTinetti,posturaTinetti,equilibrioTinetti,levantarseTinetti,intentosTinetti,inmediataTinetti,equilibrioETinetti,empujarTinetti,ojosCerradosTinetti,vueltaA360Tinetti,vueltaB360Tinetti,sentarseTinetti,resultadoTinetti) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$a_bind_params = array($auxcodusr,$auxmarcha,$auxderecho1,$auxderecho2,$auxizquierdo1,$auxizquierdo2,$auxsimetria,$auxfluidez,$auxtrayectoria,$auxtronco,$auxpostura,$auxequilibrio,$auxlevantarse,$auxintentos,$auxequilibrioeb,$auxebipedestacion,$auxempujar,$auxojoscerrados,$auxvuelta360,$auxvuelta3602,$auxsentarse,$auxresultado);

//echo $auxsql;
//print_r($a_bind_params);

$rs = $db->Execute($auxsql, $a_bind_params);
 
if($rs=== false) {?>
 <script> alert("** ERROR: PROBLEMA AL GRABAR **");
window.location.href = 'TINETTI.php?auxcod=<?php echo $auxcodusr?>';
</script> 

  
<?php  
  }else{
?>
<script> alert("Se ha guardado exitosamente \nResultado:<?php echo $auxresultado;?>");
window.location.href = 'TINETTI.php?auxcod=<?php echo $auxcodusr?>';
</script>


<?php 
    }
}?>
