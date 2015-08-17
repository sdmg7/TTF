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

if(isset($_GET["identificador"]))
  $elegido=$_GET["identificador"];

$auxsql="select identificadorUsuario,nombresUsuario,apellidosUsuario,fechaNacimientoUsuario,aulaUsuario,diagnosticoMedicoUsuario,diagnosticoFisioterapiaUsuario,objetivosUsuario,conclusionesUsuario,codigoUsuario from Usuario where identificadorUsuario=?";
//echo $auxsql;

$a_bind_params = array($elegido);
$rs =$db->Execute($auxsql, $a_bind_params);
$rs->MoveFirst();

 while(!$rs->EOF){
	$arr=array('Identificador'=>$rs->fields[0],'Nombres'=>$rs->fields[1],'Apellidos'=>$rs->fields[2],'fNacimiento'=>$rs->fields[3], 'Aula'=>$rs->fields[4],'dMedico'=>$rs->fields[5],'dFisioterapia'=>$rs->fields[6],'objetivos'=>$rs->fields[7],'conclusiones'=>$rs->fields[8],'codigo'=>$rs->fields[9]);
    $rs->MoveNext();
 }
 
?>

<html>
  <head> 
    <title>RESULTADO USUARIO</title>
    <meta content="">
    <h1 align='center'>USUARIO</h1>
      <link rel="stylesheet" type="text/css" href="../css/tabla.css">
    </head>
<body>
  
<form>
<table align='center' border='1' class='bordered'>
<th>Identificador</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Fecha de Nacimiento</th>
<th>Aula</th>
<th>Diagnostico Medico</th>
<th>Diagnostico Fisioterapia</th>
<th>Objetivos</th>
<th>Conclusiones</th>
<tr>
<td>
<?php echo $arr['Identificador']?>
</td>
<td>
<?php echo $arr['Nombres']?>
</td>
<td>
<?php echo $arr['Apellidos']?>
</td>
<td>
<?php echo $arr['fNacimiento']?>
</td>
<td>
<?php echo $arr['Aula']?>
</td>
<td>
<?php echo $arr['dMedico']?>
</td>
<td>
<?php echo $arr['dFisioterapia']?>
</td>
<td>
<?php echo $arr['objetivos']?>
</td>
<td>
<?php echo $arr['conclusiones']?>
</td>
</tr>

</table>

<div id='botones'>
<button type="button" style="width:120px;height:50px" onClick=
"window.open('LOBO.php?auxcod=<?php echo $arr['codigo']?>','LOBO');">
LOBO
</button>
<button type="button" style="width:120px;height:50px" onClick=
"window.open('KATZ.php?auxcod=<?php echo $arr['codigo']?>','KATZ');">
KATZ
</button>
<button type="button" style="width:120px;height:50px" onClick=
"window.open('TINETTI.php?auxcod=<?php echo $arr['codigo']?>','TINETTI');">
TINETTI
</button>
<button type="button" style="width:120px;height:50px" onClick=
"window.open('BLESSED.php?auxcod=<?php echo $arr['codigo']?>','BLESSED');">
BLESSED
</button>
<button type="button" style="width:120px;height:50px" onClick=
"window.open('MACS.php?auxcod=<?php echo $arr['codigo']?>','MACS');">
MACS
</button>
<button type="button" style="width:120px;height:50px" onClick=
"window.open('FMS.php?auxcod=<?php echo $arr['codigo']?>','FMS');">
FMS
</button>
</div>

<hr></hr>
<h1 align='center'>LOBO</h1>
<table align='center' border='1' class='bordered'>
<th><img src="../img/letras/Blue/A.png" title="¿En qué día de la semana estamos? Correcto(1) Incorrecto(0) "></th>
<th><img src="../img/letras/Blue/B.png" title="¿Qué día(N°) es hoy? Correcto(1) Incorrecto(0)" ></th>
<th><img src="../img/letras/Blue/C.png" title="¿En qué mes estamos? Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/D.png" title="¿En qué estación del año estamos? Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/E.png" title="¿En qué año estamos? Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/F.png" title="¿Dónde estamos? Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/G.png" title="Provincia Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/H.png" title="País Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/I.png" title="Ciudad o pueblo Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/J.png" title="Lugar, centro Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/K.png" title="Planta, piso Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/L.png" title="Repita las palabras: peseta-caballo-manzana (0)(1)(2)(3) Aciertos"></th>
<th><img src="../img/letras/Blue/M.png" title="Si tiene 30 dólares y me los va dando de 3 en 3. Cuántas le van quedando ? Hasta 5 veces (0)(1)(2)(3)(4)(5) Aciertos"></th>
<th><img src="../img/letras/Blue/N.png" title="Repita 5-9-2. Ahora hacia atrás (0)(1)(2)(3) Aciertos"></th>
<th><img src="../img/letras/Blue/O.png" title="¿Recuerda las tres palabras (objetos) que le he dicho antes? (0)(1)(2)(3) Aciertos"></th>
<th><img src="../img/letras/Blue/P.png" title="Señalar un bolígrafo y que el paciente lo nombre. Repetirlo con el reloj (0)(1)(2) Aciertos"></th>
<th><img src="../img/letras/Blue/Q.png" title="Que repita: En un trigal había cinco perros Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/R.png" title="Una manzana y una pera son frutas ¿verdad? ¿Qué son el rojo y el verde? Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/S.png" title="¿Qué son un perro y un gato? Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/T.png" title="Coja este papel con su mano derecha, dóblelo por la mitad y póngalo en la mesa Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/U.png" title="Lea esto, haga lo que dice:CIERRE LOS OJOS Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/letras/Blue/V.png" title="Escriba una frase cualquiera Correcto(1) Incorrecto(0)"></th>
<th><img src="../img/fecha.png" title="Fecha"></th>
<th><img src="../img/igual.png" title="Resultado"></th>

<?php 
$auxselectlobo="Select 1oLobo,2oLobo,3oLobo,4oLobo,5oLobo,6oLobo,7oLobo,8oLobo,9oLobo,10oLobo,11oLobo,1fLobo,1cLobo,2cLobo,1mLobo,1lLobo,2lLobo,3lLobo,4lLobo,5lLobo,6lLobo,7lLobo,fechaLobo,resultadoLobo FROM Lobo where codigoUsuario=?";

$a_bind_params = array($arr['codigo']);
$rs =$db->Execute($auxselectlobo, $a_bind_params);
$rs->MoveFirst();

while(!$rs->EOF){
      echo "<tr>";
      echo "<td>";echo $rs->fields[0];echo "</td>";echo "<td>";echo $rs->fields[1];echo "</td>";echo "<td>";echo $rs->fields[2];echo "</td>";echo "<td>";echo $rs->fields[3];echo "</td>";echo "<td>";echo $rs->fields[4];echo "</td>";echo "<td>";echo $rs->fields[5];echo "</td>";echo "<td>";echo $rs->fields[6];echo "</td>";echo "<td>";echo $rs->fields[7];echo "</td>";echo "<td>";echo $rs->fields[8];echo "</td>";echo "<td>";echo $rs->fields[9];echo "</td>";echo "<td>";echo $rs->fields[10];echo "</td>";echo "<td>";echo $rs->fields[11];echo "</td>";echo "<td>";echo $rs->fields[12];echo "</td>";echo "<td>";echo $rs->fields[13];echo "</td>";echo "<td>";echo $rs->fields[14];echo "</td>";echo "<td>";echo $rs->fields[15];echo "</td>";echo "<td>";echo $rs->fields[16];echo "</td>";echo "<td>";echo $rs->fields[17];echo "</td>";echo "<td>";echo $rs->fields[18];echo "</td>";echo "<td>";echo $rs->fields[19];echo "</td>";echo "<td>";echo $rs->fields[20];echo "</td>";echo "<td>";echo $rs->fields[21];echo "</td>";echo "<td>";echo date("d-m-Y h:m", strtotime($rs->fields[22])); echo "</td>";echo "<td>";echo  $rs->fields[23];echo "</td>";
      echo "</tr>";
	$rs->MoveNext();
}

?>
</table>
<h1 align='center'>KATZ</h1>
<table align='center' border='1' class='bordered'>
<th><img src="../img/letras/Blue/A.png" title="Bañarse"></th>
<th><img src="../img/letras/Blue/B.png" title="vestirse"></th>
<th><img src="../img/letras/Blue/C.png" title="Ir al servicio"></th>
<th><img src="../img/letras/Blue/D.png" title="Desplazarse"></th>
<th><img src="../img/letras/Blue/E.png" title="Continencia"></th>
<th><img src="../img/letras/Blue/F.png" title="Alimentarse"></th>
<th><img src="../img/fecha.png" title="Fecha"></th>
<th><img src="../img/igual.png" title="Resultado.-
A Independiente en todas las actividades.
B Independiente en todas las actividades, salvo una
C Independiente en todas las actividades, exepto bañarse y otra funcion adicional
D Independiente en todas las actividades, exepto bañarse, vestirse y otra funcion adicional
E Independiente en todas las actividades, exepto bañarse, vestirse, uso del retrete  y otra funcion adicional
F Independiente en todas las actividades, exepto bañarse, vestirse, uso del retrete, movilidad  y otra funcion adicional
G Dependiente en las 6 funciones."></th>
<?php 
$auxselectkatz="SELECT banioKatz,vestirseKatz,retreteKatz,movilidadKatz,continenciaKatz,alimentacionKatz,fechaKatz,resultadoKatz FROM Katz where codigoUsuario=?";

$a_bind_params = array($arr['codigo']);
$rs =$db->Execute($auxselectkatz, $a_bind_params);
$rs->MoveFirst();

while(!$rs->EOF){
      echo "<tr>";
      echo "<td>";echo $rs->fields[0];echo "</td>";echo "<td>";echo $rs->fields[1];echo "</td>";echo "<td>";echo $rs->fields[2];echo "</td>";echo "<td>";echo $rs->fields[3];echo "</td>";echo "<td>";echo $rs->fields[4];echo "</td>";echo "<td>";echo $rs->fields[5];echo "</td>";echo "<td>"; echo date("d-m-Y h:m", strtotime($rs->fields[6]));echo "</td>";echo "<td>";echo $rs->fields[7];
      echo "</tr>";
	$rs->MoveNext();
}

?>
</table>

<h1 align='center'>TINETTI</h1>
<table align='center' border='1' class='bordered'>
<th><img src="../img/letras/Blue/A.png" title="Iniciaci&oacute;n de la marcha (inmediatamente despu&eacute;s de decir que ande)"></th>
<th><img src="../img/letras/Blue/B.png" title="Longitud y altura de peso a) Movimiento del pie derecho1"></th>
<th><img src="../img/letras/Blue/C.png" title="Longitud y altura de peso a) Movimiento del pie derecho2"></th>
<th><img src="../img/letras/Blue/D.png" title="Longitud y altura de peso b) Movimiento del pie izquierdo1"></th>
<th><img src="../img/letras/Blue/E.png" title="Longitud y altura de peso b) Movimiento del pie izquierdo2"></th>
<th><img src="../img/letras/Blue/F.png" title="Simetr&iacute;a del paso"></th>
<th><img src="../img/letras/Blue/G.png" title="Fluidez del paso"></th>
<th><img src="../img/letras/Blue/H.png" title="Trayectoria (observar el trazado que realiza uno de los pies durante unos 3 metros)"></th>
<th><img src="../img/letras/Blue/I.png" title="Tronco"></th>
<th><img src="../img/letras/Blue/J.png" title="Postura al caminar"></th>
<th><img src="../img/letras/Blue/K.png" title="Equilibrio sentado"></th>
<th><img src="../img/letras/Blue/L.png" title="Levantarse"></th>
<th><img src="../img/letras/Blue/M.png" title="Intentos para levantarse"></th>
<th><img src="../img/letras/Blue/N.png" title="Equilibrio en bipedestaci&oacute;n inmediata (los primeros 5 segundos)"></th>
<th><img src="../img/letras/Blue/O.png" title="Equilibrio en bipedestaci&oacute;n"></th>
<th><img src="../img/letras/Blue/P.png" title="Empujar (el paciente en bipedestaci&oacute;n con el tronco erecto y los pies tan juntos como sea
posible)"></th>
<th><img src="../img/letras/Blue/Q.png" title="Ojos cerrados ( en la posición 6)"></th>
<th><img src="../img/letras/Blue/R.png" title="Vuelta de 360 grados "></th>
<th><img src="../img/letras/Blue/S.png" title="Vuelta de 360 grados 2"></th>
<th><img src="../img/letras/Blue/T.png" title="Sentarse" ></th>
<th><img src="../img/fecha.png" title="Fecha"></th>
<th><img src="../img/igual.png" title="Resultado"></th>
<?php 
$auxselecttinnetti="SELECT marchaTinetti,longitudDerecho1Tinetti,longitudDerecho2Tinetti,longitudIzquierdo1Tinetti,longitudIzquierdo2Tinetti,simetriaTinetti,fluidezTinetti,trayectoriaTinetti,troncoTinetti,posturaTinetti,equilibrioTinetti,levantarseTinetti,intentosTinetti,inmediataTinetti,equilibrioETinetti,empujarTinetti,ojosCerradosTinetti,vueltaA360Tinetti,vueltaB360Tinetti,sentarseTinetti,fechaTinetti,resultadoTinetti FROM Tinetti where codigoUsuario=?";
$a_bind_params = array($arr['codigo']);
$rs =$db->Execute($auxselecttinnetti, $a_bind_params);
$rs->MoveFirst();

while(!$rs->EOF){
      echo "<tr>";
      echo "<td>";echo $rs->fields[0];echo "</td>";echo "<td>";echo $rs->fields[1];echo "</td>";echo "<td>";echo $rs->fields[2];echo "</td>";echo "<td>";echo $rs->fields[3];echo "</td>";echo "<td>";echo $rs->fields[4];echo "</td>";echo "<td>";echo $rs->fields[5];echo "</td>";echo "<td>";echo $rs->fields[6];echo "</td>";echo "<td>";echo $rs->fields[7];echo "</td>";echo "<td>";echo $rs->fields[8];echo "</td>";echo "<td>";echo $rs->fields[9];echo "</td>";echo "<td>";echo $rs->fields[10];echo "</td>";echo "<td>";echo $rs->fields[11];echo "</td>";echo "<td>";echo $rs->fields[12];echo "</td>";echo "<td>";echo $rs->fields[13];echo "</td>";echo "<td>";echo $rs->fields[14];echo "</td>";echo "<td>";echo $rs->fields[15];echo "</td>";echo "<td>";echo $rs->fields[16];echo "</td>";echo "<td>";echo $rs->fields[17];echo "</td>";echo "<td>";echo $rs->fields[18];echo "</td>";echo "<td>";echo $rs->fields[19];echo "</td>";echo "<td>";echo date("d-m-Y h:m", strtotime($rs->fields[20]));echo "</td>";echo "<td>";echo $rs->fields[21];echo "</td>";
      echo "</tr>";
	$rs->MoveNext();
}

?>
</table>


<h1 align='center'>BLESSED</h1>
<table align='center' border='1' class='bordered'>
<th><img src="../img/letras/Blue/A.png" title="Incapacidad para realizar tareas domésticas Ninguna(0) Parcial(0.5) Total(1)"></th>
<th><img src="../img/letras/Blue/B.png" title="Incapacidad para el uso de pequeñas cantidades de dinero Ninguna(0) Parcial(0.5) Total(1)"></th>
<th><img src="../img/letras/Blue/C.png" title="Incapacidad para recordar listas cortas de elementos (p. ej. compras, etc.) Ninguna(0) Parcial(0.5) Total(1)"></th>
<th><img src="../img/letras/Blue/D.png" title="Incapacidad para orientarse en casa Ninguna(0) Parcial(0.5) Total(1)"></th>
<th><img src="../img/letras/Blue/E.png" title="Incapacidad para orientarse en calles familiares Ninguna(0) Parcial(0.5) Total(1)"></th>
<th><img src="../img/letras/Blue/F.png" title="Incapacidad para valorar el entorno (p.ej. reconocer si está en casa o en ei hospital, discriminar entre parientes, médicos y enfeneras, etc.) Ninguna(0) Parcial(0.5) Total(1)"></th>
<th><img src="../img/letras/Blue/G.png" title="Incapacidad para recordar hechos recientes (p. ej. visitas de parientes o amigos, etc.) Ninguna(0) Parcial(0.5) Total(1)"></th>
<th><img src="../img/letras/Blue/H.png" title="Tendencia a rememorar el pasado Ninguna(0) Parcial(0.5) Total(1)"></th>
<th><img src="../img/letras/Blue/I.png" title="Habito comer (0)(1)(2)(3)"></th>
<th><img src="../img/letras/Blue/J.png" title="Habito vestir (0)(1)(2)(3)"></th>
<th><img src="../img/letras/Blue/K.png" title="Control de esfínteres (0)(1)(2)(3)"></th>
<th><img src="../img/letras/Blue/L.png" title="Retraimiento creciente No(0) Si(1)"></th>
<th><img src="../img/letras/Blue/M.png" title="Egocentrismo aumentado No(0) Si(1)"></th>
<th><img src="../img/letras/Blue/N.png" title="Pérdida de interés por los sentimientos de otros No(0) Si(1)"></th>
<th><img src="../img/letras/Blue/O.png" title="Afectividad embotada No(0) Si(1)"></th>
<th><img src="../img/letras/Blue/P.png" title="Perturbación del control emocional (aumento de la susceptibilidad e irritabilidad) No(0) Si(1)"></th>
<th><img src="../img/letras/Blue/Q.png" title="Hilaridad Inapropiada No(0) Si(1)"></th>
<th><img src="../img/letras/Blue/R.png" title="Respuesta emocional disminuida No(0) Si(1)"></th>
<th><img src="../img/letras/Blue/S.png" title="Indiscreciones sexuales (de aparición reciente) No(0) Si(1)"></th>
<th><img src="../img/letras/Blue/T.png" title=" Falta de interés en las aficiones habituales No(0) Si(1)"></th>
<th><img src="../img/letras/Blue/U.png" title="Disminución de la iniciativa o apatía progresiva No(0) Si(1)"></th>
<th><img src="../img/letras/Blue/V.png" title="Hiperactividad no justificada No(0) Si(1)"></th>
<th><img src="../img/fecha.png" title="Fecha"></th>
<th><img src="../img/igual.png" title="Resultado"></th>
<?php 
$auxselectblessed="SELECT pregunta1A,pregunta2A,pregunta3A,pregunta4A,pregunta5A,pregunta6A,pregunta7A,pregunta8A,pregunta1B,pregunta2B,pregunta3B,pregunta1C,pregunta2C,pregunta3C,pregunta4C,pregunta5C,pregunta6C,pregunta7C,pregunta8C,pregunta9C,pregunta10C,pregunta11C,fechaBlessed,resultadoBlessed FROM Blessed where codigoUsuario=?";

$a_bind_params = array($arr['codigo']);
$rs =$db->Execute($auxselectblessed, $a_bind_params);
$rs->MoveFirst();

while(!$rs->EOF){
      echo "<tr>";
      echo "<td>";echo $rs->fields[0];echo "</td>";echo "<td>";echo $rs->fields[1];echo "</td>";echo "<td>";echo $rs->fields[2];echo "</td>";echo "<td>";echo $rs->fields[3];echo "</td>";echo "<td>";echo $rs->fields[4];echo "</td>";echo "<td>";echo $rs->fields[5];echo "</td>";echo "<td>";echo $rs->fields[6];echo "</td>";echo "<td>";echo $rs->fields[7];echo "</td>";echo "<td>";echo $rs->fields[8];echo "</td>";echo "<td>";echo $rs->fields[9];echo "</td>";echo "<td>";echo $rs->fields[10];echo "</td>";echo "<td>";echo $rs->fields[11];echo "</td>";echo "<td>";echo $rs->fields[12];echo "</td>";echo "<td>";echo $rs->fields[13];echo "</td>";echo "<td>";echo $rs->fields[14];echo "</td>";echo "<td>";echo $rs->fields[15];echo "</td>";echo "<td>";echo $rs->fields[16];echo "</td>";echo "<td>";echo $rs->fields[17];echo "</td>";echo "<td>";echo $rs->fields[18];echo "</td>";echo "<td>";echo $rs->fields[19];echo "</td>";echo "<td>";echo $rs->fields[20];echo "</td>";echo "<td>";echo $rs->fields[21];echo "</td>";echo "<td>";echo date("d-m-Y h:m", strtotime($rs->fields[22])); echo "</td>";echo "<td>";echo  $rs->fields[23];echo "</td>";
      echo "</tr>";
	$rs->MoveNext();
}

?>


</table>


<h1 align='center'>MACS</h1>
<table align='center' border='1' class='bordered'>
<th><img src="../img/letras/Blue/A.png" title="La habilidad del niño para manipular objetos en actividades diarias importantes, por ejemplo durante el juego y tiempo libre, comer y vestir."></th>
<th><img src="../img/letras/Blue/B.png" title="Observación"></th>
<th><img src="../img/fecha.png" title="Fecha"></th>
<?php 
$auxselectmacs="SELECT nivelMacs,observacionesMacs,fechaMacs FROM Macs where codigoUsuario=?";

$a_bind_params = array($arr['codigo']);
$rs =$db->Execute($auxselectmacs, $a_bind_params);
$rs->MoveFirst();

while(!$rs->EOF){
      echo "<tr>";
      echo "<td>";echo $rs->fields[0];echo "</td>";echo "<td>";echo$rs->fields[1]; echo "</td>";echo "<td>";echo date("d-m-Y h:m", strtotime($rs->fields[2]));echo "</td>";
      echo "</tr>";
	$rs->MoveNext();
}

?>
</table>

<h1 align='center'>FMS</h1>

<table align='center' border='1' class='bordered'>
<th><img src="../img/letras/Blue/A.png" title="¿Cómo el usuario se mueve en distancias cortas en casa? (5m)"></th>
<th><img src="../img/letras/Blue/B.png" title="¿Cómo el usuario se mueve en y entre las clases en la escuela? (50m)"></th>
<th><img src="../img/letras/Blue/C.png" title="¿Cómo el usuario se mueve en largas distancias,como en el centro comercial? (500m)"></th>
<th><img src="../img/letras/Blue/D.png" title="Observación"></th>
<th><img src="../img/fecha.png" title="Fecha"></th>
<?php 
$auxselectfms="SELECT 5mFms,50mFms,500mFms,observacionesFms,fechaFms FROM Fms where codigoUsuario=?";

$a_bind_params = array($arr['codigo']);
$rs =$db->Execute($auxselectfms, $a_bind_params);
$rs->MoveFirst();

while(!$rs->EOF){
      echo "<tr>";
      echo "<td>";echo $rs->fields[0];echo "</td>";echo "<td>";echo $rs->fields[1];echo "</td>";echo "<td>";echo $rs->fields[2];echo "</td>";echo "<td>";echo date("d-m-Y h:m", strtotime($rs->fields[3]));echo "</td>";echo "<td>";echo $rs->fields[4];echo "</td>";
      echo "</tr>";
	$rs->MoveNext();
}
?>
</table>

</form>
</body>
</html>


