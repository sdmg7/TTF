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

if(!$_POST){?>
<html>
  <head>
<script>
//Funcion de validacion
function validar(){
	var valor=true;
	var resp='';
	
if((document.getElementById('identificador').value.length<10)) {
 valor=false;
	resp=resp+'\n-Ingrese Identificador';
}
if((document.getElementById('nombres').value.length==0)) {
 valor=false;
	resp=resp+'\n-Ingrese Nombres';
}
if((document.getElementById('apellidos').value.length==0)) {
 valor=false;
	resp=resp+'\n-Ingrese Apellidos';
}
if((document.getElementById('fnacimiento').value=='')) {
 valor=false;
	resp=resp+'\n-Ingrese Fecha de Nacimiento ';
}
if((document.getElementById('aula').value.length==0)) {
 valor=false;
	resp=resp+'\n-Ingrese Aula ';
}
   if(valor==false){
	try {alert( "Favor llenar todos los campos requeridos: "+resp );}catch(err){}
   }
    return valor; 
 }
</script>
 
 
    <title>CREAR USUARIO</title>
    <meta content="">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
  </head>
<body>
  
<form action='usuarioFormulario.php' method='POST' onsubmit="return validar();" >
  <fieldset>
  <legend>CREAR USUARIO</legend>
  
  <table>
  <tr>
      <td> <label>Identificador:</label><img  src="../img/camporequeridogr.gif" alt=""></td>
      <td> <input type='text' name='identificador' id='identificador'></td>
  </tr>
  <tr>    
      <td> <label>Nombres:</label><img  src="../img/camporequeridogr.gif" alt=""></td>
      <td> <input type='text'  name='nombres' id='nombres' ></td>
  </tr>
  <tr>
      <td> <label>Apellidos:</label><img  src="../img/camporequeridogr.gif" alt=""></td>
      <td> <input type='text' name='apellidos' id='apellidos'></td>
  </tr>
  <tr>
      <td><label>Fecha de Nacimiento</label><img  src="../img/camporequeridogr.gif" alt=""></td>
      <td><input type='text' name='fnacimiento' id='fnacimiento' placeholder='AAAA/MM/DD'></td>
  </tr>
  <tr>
      <td><label>Aula</label><img  src="../img/camporequeridogr.gif" alt=""></td> 
      <td><input type='text' name='aula' id='aula'></td>
   </tr>
  </table>
  
  <table>
  <tr>
    <td>
      <label>Diagnostico M&eacutedico:</label>
    </td>
    <td>
      <textarea id='diagnosticoMedico' name='diagnosticoMedico' rows="3" cols="60"></textarea>
    </td>
  </tr>
  <tr>
    <td>
       <label>Diagnostico Fisioterapia:</label>
    </td>
    <td>
      <textarea id='diagnosticoFisioterapia' name='diagnosticoFisioterapia' rows="3" cols="60"></textarea>
    </td>
  </tr>
  <tr>
    <td>
        <label>Objetivos:</label>
    </td>
    <td>
      <textarea id='objetivos' name='objetivos' rows="3" cols="60"></textarea>
    </td>
  </tr>
  <tr>
    <td>
        <label>Conclusiones:</label>
    </td>
    <td>
      <textarea id='conclusiones' name='conclusiones' rows="3" cols="60"></textarea>
    </td>
  </tr>
   </table>
 
 <button type="submit" class="wideButton" id='grabar' name='grabar'>
 <img src="../img/guardar.png" alt="Save icon"/> <strong>GRABAR</strong> 
</button>
 
</fieldset>
  </form>
  </body>
</html>


<?php }else{

//SE GRABA LA INFORMACION EN LA BDD
$auxidentificador=$_POST['identificador'];
$auxnombres=$_POST['nombres'];
$auxapellidos=$_POST['apellidos'];
$auxfnacimiento=$_POST['fnacimiento'];
$auxaula=$_POST['aula'];
$auxdiagnosticoMedico=$_POST['diagnosticoMedico'];
$auxdiagnosticoFisioterapia=$_POST['diagnosticoFisioterapia'];
$auxobjetivos=$_POST['objetivos'];
$auxconclusiones=$_POST['conclusiones'];

$db=omnisoftConnectDB();

$auxsql="INSERT INTO Usuario (identificadorUsuario,nombresUsuario,apellidosUsuario,fechaNacimientoUsuario,aulaUsuario,diagnosticoMedicoUsuario,diagnosticoFisioterapiaUsuario,objetivosUsuario,conclusionesUsuario) values (?,?,?,?,?,?,?,?,?)";
$a_bind_params = array($auxidentificador, $auxnombres,$auxapellidos,$auxfnacimiento,$auxaula,$auxdiagnosticoMedico,$auxdiagnosticoFisioterapia,$auxobjetivos,$auxconclusiones);

//echo $auxsql;
//print_r($a_bind_params);

$rs = $db->Execute($auxsql, $a_bind_params);
 
if($rs=== false) {?>
 <script> alert("** ERROR: PROBLEMA AL GRABAR **");
window.location.href = 'usuarioFormulario.php';
</script> 

  
<?php  
  }else{
?>
<script> alert("Se ha guardado exitosamente");
window.location.href = 'usuarioFormulario.php';
</script>


<?php 
    }
}?>