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
  <style> 
  img, span{
    vertical-align:middle;
}
  </style>
  
    <title>ELIMINAR USUARIO</title>
    <meta content="">
     <link rel="stylesheet" type="text/css" href="../css/form.css">
  </head>
<body>
  
<form action='usuarioEliminar.php' method='POST'>
  <fieldset>
  <legend>ELIMINAR USUARIO</legend>
 
  
  <table>
  <tr>
      <td> <label>Identificador:</label></td>
      <td> <input type='text' name='identificador' id='identificador'></td>
  </tr>
  <!--
  <tr>    
      <td> <label>Nombres:</label></td>
      <td> <input type='text' name='nombres' id='nombres' ></td>
  </tr>
  <tr>
      <td> <label>Apellidos:</label></td>
      <td> <input type='text' name='apellidos' id='apellidos'></td>
  </tr>-->
  </table>
 
 <button type="submit" class="wideButton" id='eliminar' name='eliminar'>
 <img src="../img/eliminar.png" alt="Save icon"/> <strong>ELIMINAR</strong> 
</button>
 
</fieldset>
  </form>
  </body>
</html>


<?php }else{

$auxidentificador=$_POST['identificador'];

$db=omnisoftConnectDB();

$auxsql="DELETE from Usuario where identificadorUsuario=?";
$a_bind_params = array($auxidentificador);

//echo $auxsql;
//print_r($a_bind_params);

$rs = $db->Execute($auxsql, $a_bind_params);
 
if($rs=== false) {?>
 <script> alert("** ERROR: PROBLEMA AL ELIMINAR **");
window.location.href = 'usuarioEliminar.php';
</script> 

  
<?php  
  }else{
?>
<script> alert("Se ha eliminado exitosamente");
window.location.href = 'usuarioEliminar.php';
</script>


<?php
      }
  }

?>