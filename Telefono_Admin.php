<?php
	session_start();	
if(empty($_SESSION['active']))
{
	header('location: Login.php');
}
 ?>
 
 <?php
	if($_SESSION['rol'] != 1)
	{
		header("location: Buscadores/salir.php");
	}
 ?>
 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>


</head>

<body bgcolor="#005B77">
	
	
<center>


	


<br />
<br />



<br />
<br />
<br />

<!--Ventana obtener reportes-->
<td><a href="informes_telefono.php"><img style="margin-right: 1px"
src="img/reportebtnmv.PNG" width="932" height="410" id="btnreportes"></a></td>
	
<!--Ventana para registrar usuario-->
    <td><a href="Registro.php"><img  style="margin-right:1px" src="img/adminbtnmv.PNG" width="932" height="410" id="btnreportes"></a></td>
    
    <td><a href="http://www.tcval.cl"><img  style="margin-right: 1px" src="img/webbtnmv.png" width="932" height="410" id="btnreportes"></a></td>
	
    <br />
    <br /><br /><br />
    <br />
    <br />
    <br />
    
        <td><a href="Buscadores/salir.php"><img src="img/cerrar_sesionV2blanco.PNG" width="100" height="100" id="btnCerrarSesion"></a> </td> 
</center>
</body>
</html>