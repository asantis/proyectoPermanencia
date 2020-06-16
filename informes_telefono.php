<?php
	session_start();	
if(empty($_SESSION['active']))
{
	header('location: Login.php');
}
 ?>
 
<?php
	if($_SESSION['rol'] == 2)
	{
		header("location: Buscadores/salir.php");
	}
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informes</title>
<style type="text/css">
body {
    background-color: #005B77;
}
</style>
</head>
</
<body bgcolor="#005B77">
<center>
 <?php
 
	if($_SESSION['rol'] == 1)
	{
 ?>

<?php }else {
		if($_SESSION['rol'] == 3)
	{
		?>

<?php
}}?>

<br />

<td>
<!--Ventana Camiones Terminal -->
<a href="Registros/ListadoTerminal.php">
<img style="margin-right: 1px" src="img/btnmv1.png" width="950" height="242"id="btnTerminal">
</a>

<!--Ventana Tiempo Permanencia -->
<a href="Registros/ListadoPermanencia.php">
<img style="margin-right: 1px"src="img/btnmv2.PNG" width="950" height="242"id="btnPermanencia">
</a>
<br />

<!--Ventana Camiones registrados en el dia -->
<a href="Registros/ListadoIngresosDia.php">
<img style="margin-right: 1px" src="img/btnmv3.png" width="950" height="242"id="btnIngresosDia">
</a>
<!--Ventana registo de salida-->
<a href="Registros/ListadoSalida.php">
<img style="margin-right: 1px" src="img/btnmv4.png" width="950" height="242"id="btnSalida">
</a>
<br />

<!--Ventana registro de ingreso-->
<a href="Registros/ListadoIngreso.php">
<img style="margin-right: 1px" src="img/btnmv5.png"
 width="950" height="242"id="btnIngreso">
</a>
<!--Ventana Graficos -->
<a href="Registros/RegistroGraficos.php">
<img style="margin-right: 1px" src="img/btnmv6.png" width="950" height="242"id="btnGraficos">
</a>
<br /><br /><br /><br /><br />
<!--Boton para cerrar sesion-->
<?php if($_SESSION['rol']==3){ ?>
	<a href="Buscadores/salir.php"><img src="img/cerrar_sesionV2blanco.png" width="" height="100" id="btnCerrarSesion"></a>

<?php }?>


</td>


</center>
</body>
</html>