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
    <title>MODIFICAR USUARIO</title>
    <meta content="">
     <link rel="stylesheet" type="text/css" href="../css/form.css">    
    <script language="javascript" src="../lib/js/jquery.js"></script>
    
    <script>
    $(document).ready(function () {
     $('#identificador').on('blur', function() {
	$.post("getUsuarioDatos.php", { elegido:document.getElementById('identificador').value}, function(data){
              
	$("#nombres").val(data.Nombres);
	$("#apellidos").val(data.Apellidos);
	$("#fnacimiento").val(data.fNacimiento);
	$("#aula").val(data.Aula);
	$("#diagnosticoMedico").val(data.dMedico);
	$("#diagnosticoFisioterapia").val(data.dFisioterapia);
	$("#objetivos").val(data.objetivos);
	$("#conclusiones").val(data.conclusiones);

	  },"json");               
      });
   });      
    </script> 
     
     
  </head>
<body>
  
<form action='usuarioModificar.php' method='POST'>
  <fieldset>
  <legend>MODIFICAR USUARIO</legend>
  
  <table>
  <tr>
      <td> <label>Identificador:</label></td>
      <td> <input type='text' name='identificador' id='identificador'></td>
  </tr>
  <tr>    
      <td> <label>Nombres:</label></td>
      <td> <input type='text' name='nombres' id='nombres' ></td>
  </tr>
  <tr>
      <td> <label>Apellidos:</label></td>
      <td> <input type='text' name='apellidos' id='apellidos'></td>
  </tr>
  <tr>
      <td><label>Fecha de Nacimiento</label></td>
      <td><input type='text' name='fnacimiento' id='fnacimiento' placeholder='dd/mm/aa'></td>
  </tr>
  <tr>
      <td><label>Aula</label></td> 
      <td><input type='text' name='aula' id='aula'></td>
   </tr>
  </table>
  
  <table>
  <tr>
    <td>
      <label>Diagnostico M&eacutedico:</label>
    </td>
    <td>
      <textarea id='diagnosticoMedico' name='diagnosticoMedico' rows="3" cols="50"></textarea>
    </td>
  </tr>
  <tr>
    <td>
       <label>Diagnostico Fisioterapia:</label>
    </td>
    <td>
      <textarea id='diagnosticoFisioterapia' name='diagnosticoFisioterapia' rows="3" cols="50"></textarea>
    </td>
  </tr>
  <tr>
    <td>
        <label>Objetivos:</label>
    </td>
    <td>
      <textarea id='objetivos' name='objetivos' rows="3" cols="50"></textarea>
    </td>
  </tr>
  <tr>
    <td>
        <label>Conclusiones:</label>
    </td>
    <td>
      <textarea id='conclusiones' name='conclusiones' rows="3" cols="50"></textarea>
    </td>
  </tr>
   </table>
 
 <button type="submit" class="wideButton" id="modificar" name="modificar">
 <img src="../img/modificar.png" alt="Save icon"/> <strong>MODIFICAR</strong> 
</button>
 
</fieldset>
  </form>
  </body>
</html>


<?php }else{
$db=omnisoftConnectDB();

$auxidentificador=$_POST['identificador'];
$auxnombres=$_POST['nombres'];
$auxapellidos=$_POST['apellidos'];
$auxfnacimiento=$_POST['fnacimiento'];
$auxaula=$_POST['aula'];
$auxdiagnosticoMedico=$_POST['diagnosticoMedico'];
$auxdiagnosticoFisioterapia=$_POST['diagnosticoFisioterapia'];
$auxobjetivos=$_POST['objetivos'];
$auxconclusiones=$_POST['conclusiones'];

$auxsql="Update Usuario set nombresUsuario=?,apellidosUsuario=?,fechaNacimientoUsuario=?,aulaUsuario=?,diagnosticoMedicoUsuario=?,diagnosticoFisioterapiaUsuario=?,objetivosUsuario=?,conclusionesUsuario=?";
$a_bind_params = array($auxnombres,$auxapellidos,$auxfnacimiento,$auxaula,$auxdiagnosticoMedico,$auxdiagnosticoFisioterapia,$auxobjetivos,$auxconclusiones);

$rs = $db->Execute($auxsql, $a_bind_params);


if($rs=== false) {?>
 <script> alert("** ERROR: PROBLEMA AL ACTUALIZAR **");
window.location.href = 'usuarioModificar.php';
</script> 

  
<?php  
  }else{
?>
<script> alert("Se ha actualizado exitosamente");
window.location.href = 'usuarioModificar.php';
</script>


<?php
   }
}?>