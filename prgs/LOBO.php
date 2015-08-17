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
<title>LOBO</title>
</head>
<body>
<div id="colorstrip">
    <h1>LOBO</h1>
  </div>
  
<form name="lobo" action="" method="POST">
<fieldset>
<label>ORIENTACIÓN</label></br></br>
<table >
	<tr>
		<td width="350"> ¿En qué día de la semana estamos? </td>
		<td width="220">	
				<input type="radio" name="grupo1" value="1"> Correcto
				<input type="radio" name="grupo1" value="0" checked> Incorrecto 
		</td> 
	</tr>
	<tr>
		<td width="350" height="12"> ¿Qué día(N°) es hoy? </td>
		<td width="220" height="12">	
				<input type="radio" name="grupo2" value="1"> Correcto
				<input type="radio" name="grupo2" value="0" checked> Incorrecto 
		</td> 
	</tr>
	<tr>
		<td width="350" height="12"> ¿En qué mes estamos? </td>
		<td width="220" height="12">	
				<input type="radio" name="grupo3" value="1"> Correcto
				<input type="radio" name="grupo3" value="0" checked> Incorrecto 
		</td> 
	</tr>
	<tr>
		<td width="350" height="12"> ¿En qué estación del año estamos? </td>
		<td width="220" height="12">	
				<input type="radio" name="grupo4" value="1"> Correcto
				<input type="radio" name="grupo4" value="0" checked> Incorrecto 
		</td> 
	</tr>
	<tr>
		<td width="350" height="12"> ¿En qué año estamos? </td>
		<td width="220" height="12">	
				<input type="radio" name="grupo5" value="1"> Correcto
				<input type="radio" name="grupo5" value="0" checked> Incorrecto 
		</td> 
	</tr>
	<tr>
		<td width="350" height="12"> ¿Dónde estamos? </td>
		<td width="220" height="12">	
				<input type="radio" name="grupo6" value="1"> Correcto
				<input type="radio" name="grupo6" value="0" checked> Incorrecto 
		</td> 
	</tr>
	<tr>
		<td width="350" height="12"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Provincia </td>
		<td width="220" height="12">	
				<input type="radio" name="grupo7" value="1"> Correcto
				<input type="radio" name="grupo7" value="0" checked> Incorrecto 
		</td> 
	</tr>
	<tr>
		<td width="350" height="12"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;País </td>
		<td width="220" height="12">	
				<input type="radio" name="grupo8" value="1"> Correcto
				<input type="radio" name="grupo8" value="0" checked> Incorrecto 
		</td> 
	</tr>
	<tr>
		<td width="350" height="12"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ciudad o pueblo </td>
		<td width="220" height="12">	
				<input type="radio" name="grupo9" value="1"> Correcto
				<input type="radio" name="grupo9" value="0" checked> Incorrecto 
		</td> 
	</tr>
	<tr>
		<td width="350" height="12"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lugar, centro </td>
		<td width="220" height="12">	
				<input type="radio" name="grupo10" value="1"> Correcto
				<input type="radio" name="grupo10" value="0" checked> Incorrecto 
		</td> 
	</tr>
	<tr>
		<td width="350" height="12"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Planta, piso </td>
		<td width="220" height="12">	
				<input type="radio" name="grupo11" value="1"> Correcto
				<input type="radio" name="grupo11" value="0" checked> Incorrecto 
		</td> 
	</tr>
</table>
	<hr>
	<label>FIJACIÓN</label></br></br>
	<table>
	<tr>
		<td width="500" height="12"> Repita las palabras: peseta-caballo-manzana </td>
	</tr>
	<tr>
		<td width="380" height="12">	
				<input type="radio" name="grupo12" value="0"> 0 Aciertos
				<input type="radio" name="grupo12" value="1" > 1 Acierto
				<input type="radio" name="grupo12" value="2" > 2 Aciertos
				<input type="radio" name="grupo12" value="3" checked> 3 Aciertos
		</td> 
	</tr>
	</table>
	<hr>
	<label>CONCENTRACIÓN Y CÁLCULO</label></br></br>
	<table>
	<tr>
		<td width="500" height="12"> Si tiene 30 dólares y me los va dando de 3 en 3. Cuántas le van quedando ? Hasta 5 veces </td>
	</tr>
	<tr>
	
		<td width="600" height="12">	
				<input type="radio" name="grupo13" value="0"> 0 Aciertos
				<input type="radio" name="grupo13" value="1" > 1 Acierto
				<input type="radio" name="grupo13" value="2" > 2 Aciertos
				<input type="radio" name="grupo13" value="3" > 3 Aciertos
		</td>
	</tr>
	
	<tr>
		<td width="600" height="12">	
				
				<input type="radio" name="grupo13" value="3" > 4 Aciertos
				<input type="radio" name="grupo13" value="3" checked> 5 Aciertos
		</td> 
	</tr>
	<tr>
	<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="500" height="12"> Repita 5-9-2. Ahora hacia atrás</td>
	</tr>
	<tr>
	<td width="100%" height="12">	
				<input type="radio" name="grupo14" value="0"> 0 Aciertos
				<input type="radio" name="grupo14" value="1"> 1 Acierto
				<input type="radio" name="grupo14" value="2"> 2 Aciertos
				<input type="radio" name="grupo14" value="3" checked> 3 Aciertos
		</td>
	</tr>
	</table>
	<hr>
	<label>MEMORIA</label></br></br>
	<table>
	<tr>
		<td width="500" height="12">¿Recuerda las tres palabras (objetos) que le he dicho antes?</td>
	</tr>
	<tr>
		<td width="380" height="12">	
				<input type="radio" name="grupo15" value="0"> 0 Aciertos
				<input type="radio" name="grupo15" value="1" > 1 Acierto
				<input type="radio" name="grupo15" value="2" > 2 Aciertos
				<input type="radio" name="grupo15" value="3" checked> 3 Aciertos
		</td> 
	</tr>
	</table>
	<hr>
	<label>LENGUAJE Y CONSTRUCCIÓN</label></br></br>
	<table>
	<tr>
		<td width="500" height="12">Señalar un bolígrafo y que el paciente lo nombre. Repetirlo con el reloj.</td>
		<td width="320" height="12">	
				<input type="radio" name="grupo16" value="0"> 0 Aciertos
				<input type="radio" name="grupo16" value="1" > 1 Acierto
				<input type="radio" name="grupo16" value="2" checked> 2 Aciertos
		</td> 
	</tr>
	<tr>
		<td width="500" height="12">Que repita:"En un trigal había cinco perros"</td>
		<td width="320" height="12">	
				<input type="radio" name="grupo17" value="1"> Correcto
				<input type="radio" name="grupo17" value="0" checked> Incorrecto
		</td> 
	</tr>
	<tr>
		<td width="500" height="12">"Una manzana y una pera son frutas ¿verdad? ¿Qué son el rojo y el verde?"</td>
		<td width="320" height="12">	
				<input type="radio" name="grupo18" value="1"> Correcto
				<input type="radio" name="grupo18" value="0" checked> Incorrecto
		</td> 
	</tr>
	<tr>
		<td width="500" height="12">¿Qué son un perro y un gato?</td>
		<td width="320" height="12">	
				<input type="radio" name="grupo19" value="1"> Correcto
				<input type="radio" name="grupo19" value="0" checked> Incorrecto
		</td> 
	</tr>
	<tr>
		<td width="500" height="12">Coja este papel con su mano derecha, dóblelo por la mitad y póngalo en la mesa.</td>
		<td width="320" height="12">	
				<input type="radio" name="grupo20" value="1"> Correcto
				<input type="radio" name="grupo20" value="0" checked> Incorrecto
		</td> 
	</tr>
	<tr>
		<td width="500" height="12">"Lea esto, haga lo que dice:CIERRE LOS OJOS"</td>
		<td width="320" height="12">	
				<input type="radio" name="grupo21" value="1"> Correcto
				<input type="radio" name="grupo21" value="0" checked> Incorrecto
		</td> 
	</tr>
	<tr>
		<td width="500" height="12">"Escriba una frase cualquiera"</td>
		<td width="320" height="12">	
				<input type="radio" name="grupo22" value="1"> Correcto
				<input type="radio" name="grupo22" value="0" checked> Incorrecto
		</td> 
	</tr>
	</table>
	<input name='codusr' id='codusr' type='hidden' value='<?php echo $auxcodusr?>'>
</br></br>
 <button type="submit" class="wideButton" id='grabar' name='grabar'>
 <img src="../img/guardar.png" alt="Save icon"/> <strong>GRABAR</strong> 
</button>
	
</form>
</fieldset>


</body>
</html>

<?php }else{
//SE GRABA LA INFORMACION EN LA BDD

$auxcodusr=$_POST['codusr'];
$auxgrupo1=$_POST['grupo1'];
$auxgrupo2=$_POST['grupo2'];
$auxgrupo3=$_POST['grupo3'];
$auxgrupo4=$_POST['grupo4'];
$auxgrupo5=$_POST['grupo5'];
$auxgrupo6=$_POST['grupo6'];
$auxgrupo7=$_POST['grupo7'];
$auxgrupo8=$_POST['grupo8'];
$auxgrupo9=$_POST['grupo9'];
$auxgrupo10=$_POST['grupo10'];
$auxgrupo11=$_POST['grupo11'];
$auxgrupo12=$_POST['grupo12'];
$auxgrupo13=$_POST['grupo13'];
$auxgrupo14=$_POST['grupo14'];
$auxgrupo15=$_POST['grupo15'];
$auxgrupo16=$_POST['grupo16'];
$auxgrupo17=$_POST['grupo17'];
$auxgrupo18=$_POST['grupo18'];
$auxgrupo19=$_POST['grupo19'];
$auxgrupo20=$_POST['grupo20'];
$auxgrupo21=$_POST['grupo21'];
$auxgrupo22=$_POST['grupo22'];
$auxresultado=$auxgrupo1+$auxgrupo2+$auxgrupo3+$auxgrupo4+$auxgrupo5+$auxgrupo6+$auxgrupo7+$auxgrupo8+$auxgrupo9+$auxgrupo10+$auxgrupo11+$auxgrupo12+$auxgrupo13+$auxgrupo14+$auxgrupo15+$auxgrupo16+$auxgrupo17+$auxgrupo18+$auxgrupo19+$auxgrupo20+$auxgrupo21+$auxgrupo22;


$db=omnisoftConnectDB();

$auxsql="INSERT INTO Lobo (codigoUsuario,1oLobo,2oLobo,3oLobo,4oLobo,5oLobo,6oLobo,7oLobo,8oLobo, 9oLobo,10oLobo,11oLobo,1fLobo,1cLobo,2cLobo,1mLobo,1lLobo,2lLobo,3lLobo,4lLobo,5lLobo,6lLobo,7lLobo,resultadoLobo)  values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$a_bind_params = array($auxcodusr,$auxgrupo1,$auxgrupo2,$auxgrupo3,$auxgrupo4,$auxgrupo5,$auxgrupo6,$auxgrupo7,$auxgrupo8,$auxgrupo9,$auxgrupo10,$auxgrupo11,$auxgrupo12,$auxgrupo13,$auxgrupo14,$auxgrupo15,$auxgrupo16,$auxgrupo17,$auxgrupo18,$auxgrupo19,$auxgrupo20,$auxgrupo21,$auxgrupo22,$auxresultado);

//echo $auxsql;
//print_r($a_bind_params);

$rs = $db->Execute($auxsql, $a_bind_params);
 
if($rs=== false) {?>
 <script> alert("** ERROR: PROBLEMA AL GRABAR **");
window.location.href = 'LOBO.php?auxcod=<?php echo $auxcodusr?>';
</script> 

  
<?php  
  }else{
?>
<script> alert("Se ha guardado exitosamente \nResultado:<?php echo $auxresultado; ?>");
window.location.href = 'LOBO.php?auxcod=<?php echo $auxcodusr?>';
</script>


<?php 
    }
}?>
