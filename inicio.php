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
 
 <?php
 	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'android') !== false or stripos($ua,'IPHONE') !== false){
	header('location: Telefono_Admin.php');
}
  ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inicio</title>
<!--Boostrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 207px;
	height: 126px;
	z-index: 1;
	left: 10px;
	top: 50px;
}
#apDiv2 {
	position: absolute;
	width: 168px;
	height: 43px;
	z-index: 1;
	left: 10px;
	top: 83px;

}

</style>

</head>




<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img style="width:110px; height:40px; margin-top:-10px;" src="img/tcvalLogo-2.png"> </img></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="inicio.php">inicio</a></li>
        <li><a href="ingreso.php">Registrar ingreso</a></li>
        <li><a href="salida.php">Registrar salida</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes<span class="caret"></span></a>
          <ul class="dropdown-menu">
            	<li><a href="Registros/ListadoTerminal.php">Listado Terminal </a>  </li>
                <li><a href="Registros/ListadoPermanencia.php">Listado Permanencia </a> </li>
                <li><a href="Registros/ListadoIngresosDia.php"> Ingresos del dia </a> </li>
                <li><a href="Registros/ListadoIngreso.php">Listado de ingreso </a> </li>
                <li><a href="Registros/ListadoSalida.php">Listado de salida </a> </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Graficos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            	<li><a href="Graficos/BultosGraph.php">Cargas </a>  </li>
                <li><a href="Graficos/ConsignaGraph.php">Consignatarios</a> </li>
                <li><a href="Graficos/FaenaGraph.php">Faenas</a> </li>
                <li><a href="Graficos/OperacionEntradaGraph.php">Operaciones de ingresos</a> </li>
                <li><a href="Graficos/OperacionGraph.php">Operaciones de salida</a> </li>
                <li><a href="Graficos/ProcedenciaGraph.php">Procedencias</a> </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios<span class="caret"></span></a>
          <ul class="dropdown-menu">
            	<li><a href="Registro.php">Registrar Usuario</a></li>
                <li><a href="editarUsuarios.php">Editar Usuarios</a></li>

          </ul>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Buscadores/salir.php"><span class="glyphicon glyphicon-user"></span>Cerrar Sesion</a></li>

      </ul>
    </div>
  </div>
</nav>
  
<div class="container">

</div>



</body>
</html>