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
		header("location: ../inicio_operador.php");
	}
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Graficos</title>


</head>
<!--Imagenes de la pantalla de Registros para telefono-->
<body>
<?php $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'android') !== false or stripos($ua,'iPhone') !== false){	
?>
<center>
<a href="../informes_telefono.php"><img src="../img/tcvalLogo.png" width="500px" height="200px"></a>
<br />
<br />
<h1 style="font-size:50px; font-weight:bold;"> Graficos </h1>
<br />
<br />
<br />
<br />
<br />
<br />
<td>
<!--Ventana Grafico bulto -->
<a href="../Graficos/BultosGraph.php">
<img style="margin-right:40px" src="../img/GraficoBultos.PNG" width="300px" height="300px"id="btnBultos">
</a>

<!--Ventana Grafico Consignaciones-->
<a href="../Graficos/ConsignaGraph.php">
<img src="../img/GraficoConsignaciones.PNG" width="300px" height="300px"id="btnConsigna">
</a>
<br />
<br />
<br />
<br />
<br />
<!--Ventana grafico Faena -->
<a href="../Graficos/FaenaGraph.php">
<img style="margin-right:40px" src="../img/GraficoFaenas.PNG" width="300px" height="300px"id="btnFaena">
</a>
<!--Ventana Grafico Operaciones  -->
<a href="../Graficos/OperacionGraph.php" >
<img src="../img/GraficoOperaciones.PNG" width="300px" height="300px"id="btnOperaciones"> 
</a>
<br />
<br />
<br />
<br />
<!-- Ventana grafico procedencia -->
<a href="../Graficos/OperacionEntradaGraph.php" >
<img style="margin-right:40px" src="../img/OperacionIngreso.PNG" width="300px" height="300px"id="btnOperacionIngreso"> 
</a>
<a href="../Graficos/ProcedenciaGraph.php">
<img src="../img/GraficosProcedencia.PNG" width="300px" height="300px"id="btnOperaciones">
</a>




</td>


</center>
<?php }else{
		header ('location: ../Login.php');
	} ?>
</body>

</html>

