<?php
//conexion bd
session_start();
$conn=mysqli_connect("localhost","root","","proyecto");
date_default_timezone_set('America/Santiago');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<?php
if (isset($_POST['patente'])){
//Guardar Info
setlocale(LC_TIME,"es_ES");
$fecha=date('F');
$fecha=strftime('%B');
$Sql="INSERT INTO salidas(Mes,Fecha,Hora,Patente,Tipo_Operacion,Faena,Iso_Code,Contenedor,Consignatario,Observacion,numBL,Tipo_Bulto,Cantidad,Guia,Folio,Turno,Empleado) VALUES('".$fecha."','".date('y-m-d')."','".date('H:i:s')."','".$_POST['patente']."','".$_POST['operacion']."',".$_POST["faena"].",'".$_POST['isocode']."','".$_POST['contenedor']."','".$_POST['consignatario']."','".$_POST['observacion']."','".$_POST['nrobl']."','".$_POST['bulto']."','".$_POST['cantidad']."','".$_POST['guia']."','".$_POST['folio']."',0,'".$_SESSION['MM_Username']."')";
	$result=mysqli_query($conn,$Sql);
	if ($result){
		echo "Datos guardados con exito";}
	else{echo "Ocurrió un error al guardar la información.";}
	
}
?>
<table width="995" height="34" border="1">
  <tr style="font:bold; background-color:#3CF">
  	<td width="65">Mes</td>
    <td width="63">Fecha</td>
    <td width="62">Hora</td>
     <td width="90">Patente</td>
     <td width="125">Operacion</td>
     <td width="146">Faena</td>
     <td width="102">Iso Code</td>
     <td width="139">Contenedor</td>
     <td width="152">Consignatario</td>
     <td width="152">Observacion</td>
     <td width="152">Numero B/L</td>
     <td width="152">Bulto</td>
     <td width="152">Cantidad</td>
     <td width="152">Guia</td>
     <td width="152">Folio</td>
     <td width="152">Turno</td>
     <td width="152">Empleado</td>

  </tr>
<?php
//Listado
$sql="SELECT `salidas`.`Mes`, `salidas`.`Fecha`, `salidas`.`Hora`, `salidas`.`Patente`, `tipo_operacion`.`operacion`, `faenas`.`nombre` as faena, `iso_codes`.`descrip` as isocode, `salidas`.`Contenedor`, `consignatarios`.`nombre_consig` as consignatario, `salidas`.`Observacion`, `salidas`.`numBL`, `tipo_bultos`.`bulto`, `salidas`.`Cantidad`, `salidas`.`Guia`, `salidas`.`Folio`, `salidas`.`Turno`,salidas.empleado
FROM `salidas` INNER JOIN `tipo_operacion` ON tipo_operacion.idOperacion=salidas.Tipo_Operacion INNER JOIN `faenas` ON faenas.idfaena=salidas.Faena INNER JOIN `iso_codes` ON iso_codes.isocode=salidas.Iso_Code INNER JOIN  `consignatarios` ON consignatarios.idConsignatario=salidas.Consignatario  INNER JOIN `tipo_bultos` ON tipo_bultos.idBulto=salidas.Tipo_Bulto ORDER BY Salidas.fecha desc,Salidas.hora desc";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
	echo "<tr>
		<td>".$row['Mes']."</td>
		<td>".$row['Fecha']."</td>
		<td>".$row['Hora']."</td>
		<td>".$row['Patente']."</td>
		<td>".$row['operacion']."</td>
		<td>".$row['faena']."</td>
		<td>".$row['isocode']."</td>
		<td>".$row['Contenedor']."</td>
		<td>".$row['consignatario']."</td>
		<td>".$row['Observacion']."</td>
		<td>".$row['numBL']."</td>
		<td>".$row['bulto']."</td>
		<td>".$row['Cantidad']."</td>
		<td>".$row['Guia']."</td>
		<td>".$row['Folio']."</td>
		<td>".$row['Turno']."</td>
		<td>".$row['empleado']."</td>
	</tr>
	";
}
?>
</table>
</body>
</html>