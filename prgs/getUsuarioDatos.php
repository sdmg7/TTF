<?php
include('../lib/adodb/adodb.inc.php');
include('../config/conmysql.php');

//Funcion para conectarse a la BDD
function omnisoftConnectDB() {
global $DBConnection;
$dblink = NewADOConnection($DBConnection);
return $dblink;
}

$db=omnisoftConnectDB();

if(isset($_POST["elegido"]))
  $elegido=$_POST["elegido"];

$auxsql="select nombresUsuario,apellidosUsuario,fechaNacimientoUsuario,aulaUsuario,diagnosticoMedicoUsuario,diagnosticoFisioterapiaUsuario,objetivosUsuario,conclusionesUsuario from Usuario where identificadorUsuario=?";
//echo $auxsql;

$a_bind_params = array($elegido);
$rs =$db->Execute($auxsql, $a_bind_params);
$rs->MoveFirst();

 while(!$rs->EOF){
	$arr=array('Nombres'=>$rs->fields[0],'Apellidos'=>$rs->fields[1],'fNacimiento'=>$rs->fields[2], 'Aula'=>$rs->fields[3],'dMedico'=>$rs->fields[4],'dFisioterapia'=>$rs->fields[5],'objetivos'=>$rs->fields[6],'conclusiones'=>$rs->fields[7]);
    $rs->MoveNext();
 }

 
echo json_encode($arr);
?>