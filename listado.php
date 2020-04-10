<!--Pantalla que no uso -->

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
$Sql="INSERT INTO ingresos(Mes,Faena,Fecha,Turno,Hora,Patente,Tipo_Operacion,Procedencia,Contenedor,Iso_Code,Observacion,Empleado) VALUES('".$fecha."','','".date('y-m-d')."','','".date('H:i:s')."','".$_POST['patente']."','".$_POST['operacion']."','".$_POST['procedencia']."','".$_POST['contenedor']."','".$_POST['isocode']."','".$_POST['observacion']."','".$_SESSION['usuario']."')";
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
     <td width="146">Procedencia</td>
     <td width="102">Iso Code</td>
     <td width="139">Contenedor</td>
     <td width="152">Observacion</td>

  </tr>
<?php
//Listado
$sql="SELECT I.patente,T.operacion,P.Procedencia,IC.descrip,I.Contenedor,I.Observacion,I.Mes,I.Fecha,I.Hora FROM ingresos I INNER JOIN tipo_operacion T ON I.Tipo_Operacion=T.idOperacion INNER JOIN procedencias P ON I.Procedencia=P.idProcedencia INNER JOIN iso_codes IC ON I.Iso_Code=IC.isocode ORDER BY I.fecha desc,I.hora desc";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
	echo "<tr>
		<td>".$row['Mes']."</td>
		<td>".$row['Fecha']."</td>
		<td>".$row['Hora']."</td>
		<td>".$row['patente']."</td>
		<td>".$row['operacion']."</td>
		<td>".$row['Procedencia']."</td>
		<td>".$row['descrip']."</td>
		<td>".$row['Contenedor']."</td>
		<td>".$row['Observacion']."</td>
	</tr>
	";
}
?>
</table>
</body>
</html>