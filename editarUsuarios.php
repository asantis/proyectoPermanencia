<?php
	session_start();	
if(empty($_SESSION['active']))
{
	header('location: Login.php');
}
?>


 <?php
 	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'android') !== false or stripos($ua,'IPHONE') !== false){
	header('location: Telefono_Admin.php');
}
  ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Vista de usuarios</title>
<!-- boostrap para la barra de nav -->
<link href="css/tablaestilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--Estilos de la tabla--> 
<style>

.tabla th {
	width: 150px;	
	height:50px;
	font-size:20px;
	text-align:center;
}
td {
	width: 100px;
	height:50px;	
	border:1px solid #000;
	font-size:20px;
	text-align:center;
}
</style>
</head>

<body>
<!--Barra de navegacion -->

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
 


<center>



<br /> <br /> 
<table class="tabla">

  <tr>
  	<th >Nombre</th>
    <th >Apellido</th>
    <th >Usuario</th>
    <th >Contraseña</th>
	<th >Rol</th>
    <th >Editar</th>
    <th >Eliminar</th>


  </tr>

<!--Query paar buscar datos del usuario-->
<?php 
$conn = mysqli_connect("localhost","root","","proyecto");
$sql = "SELECT u.idUsuario,
u.nombre,
u.apellido,
u.usuario,
u.contrasena,
ru.rol
FROM usuarios u
JOIN rol_usuario ru on ru.idRol=u.idRol";

$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
##Se busca el id del usuario seleccionado y se llama segun el boton se este presionando javascript: return confirm me permite hacer la pregunta para confirmar
echo 
	"<tr>
		<td>".$row['nombre']. "</td> 
		<td>".$row['apellido']. "</td> 
		<td>".$row['usuario']. "</td> 
		<td>".$row['contrasena']. "</td> 
		<td>".$row['rol']. "</td> 
		<td><a href=\"edit.php?id=$row[idUsuario]\" >
			<img style='height:30px' width='30px' src='img/editar.png'> </img>
			</a>
		</td> 
		<td><a href=\"EliminarUsuario.php?id=$row[idUsuario]\" onclick=\"javascript: return confirm('Esta seguro de eliminar a este usuario?')\"> <img style='height:30px' width='30px' src='img/eliminar.png'> </img> </a>
		</td> 
		
	</tr>";	
	
}
?>
</table>
</center>
</body>
</html>