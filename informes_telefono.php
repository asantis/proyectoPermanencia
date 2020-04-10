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
</head>
</
<body>
<center>
 <?php
 
	if($_SESSION['rol'] == 1)
	{
 ?>
<a href="Telefono_Admin.php"> <img src="img/tcvalLogo.png" width="500" height="200">
</a>
<?php }else {
		if($_SESSION['rol'] == 3)
	{
		?>
<a href="informes_telefono.php"> <img src="img/tcvalLogo.png" width="500" height="200">
</a>
<?php
}}?>
<br />
<br />
<h1 style="font-size:40px;"> Registros e Informes de camiones </h1>
<br />
<br />
<br />
<br />
<br />
<br />
<td>
<!--Ventana Camiones Terminal -->
<a href="Registros/ListadoTerminal.php">
<img style="margin-right:40px" src="img/CamionesTerminal.PNG" width="300px" height="300px"id="btnTerminal">
</a>

<!--Ventana Tiempo Permanencia -->
<a href="Registros/ListadoPermanencia.php">
<img src="img/Permanencia.PNG" width="300px" height="300px"id="btnPermanencia">
</a>
<br />
<br />
<br />
<br />
<br />
<!--Ventana Camiones registrados en el dia -->
<a href="Registros/ListadoIngresosDia.php">
<img style="margin-right:40px" src="img/IngresosDia.PNG" width="300px" height="300px"id="btnIngresosDia">
</a>
<!--Ventana registo de salida-->
<a href="Registros/ListadoSalida.php">
<img src="img/RegistroSalida.png" width="300px" height="300px"id="btnSalida">
</a>
<br />
<br />
<br />
<br />
<br />
<!--Ventana registro de ingreso-->
<a href="Registros/ListadoIngreso.php">
<img src="img/RegistroIngreso.png"
style="margin-right:40px" width="300px" height="300px"id="btnIngreso">
</a>
<!--Ventana Graficos -->
<a href="Registros/RegistroGraficos.php">
<img src="img/Graficos.PNG" width="300px" height="300px"id="btnGraficos">
</a>
<br /><br /><br /><br /><br /><br /><br /><br />
<!--Boton para cerrar sesion-->
<?php if($_SESSION['rol']==3){ ?>
	<a href="Buscadores/salir.php"><img src="img/cerrar_sesion.png" width="100" height="100" id="btnCerrarSesion"></a>

<?php }?>


</td>


</center>
</body>
</html>