<?php
	session_start();	
if(empty($_SESSION['active']))
{
	header('location: ../Login.php');
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
<link rel="stylesheet" href="../css/tablaestilo.css" type="text/css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Listado de salida</title>
 <style>
.tabla { 
  width: 95%; 
  border-collapse: collapse;
  margin-left:2%; 
  
  
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}



th { 
  background: #333; 
  color: white; 
  font-weight: bold; 
  font-size: 16px;
}
td, th { 
  margin: 0 ;
  padding: 4px 4px;
  border: 1px solid #ccc; 
  font-size: 16px;
}

h2{
	
	margin-left:2%;	
}
 
 @media 
only screen and (max-width: 1024px),
(min-device-width: 768px) and (max-device-width: 1024px)  {




.tabla, thread, tbody, th, td,tr {
	
	font-size: 40px;	
	width: 100%;
	display: block; 
	margin:0;
	
}

tr {
	border: 1px solid #ccc;	
	
}

td{
	padding: 10px 15px
	border:none;
	border-bottom:1px solid #eee;
	position:relative;
	padding-left:50%;
	width: 100%;
			
}
 

td:before{
	position: absolute;
	
	top: 6px;
	left:6px;
	width:40%;
	padding-top:10px;
	white-space:nowrap;
	font-weight:bold;
}

td:nth-of-type(1):before { content: "Mes"; }
td:nth-of-type(2):before { content: "Fecha"; }
td:nth-of-type(3):before { content: "Hora"; }
td:nth-of-type(4):before { content: "Patente"; }

td:nth-of-type(5):before { content: "Operacion"; }
td:nth-of-type(6):before { content: "Faena"; }
td:nth-of-type(7):before { content: "Iso code"; }
	
td:nth-of-type(8):before { content: "Contenedor"; }
td:nth-of-type(9):before { content: "Consignatario"; }
td:nth-of-type(10):before { content: "Observaciones"; }
td:nth-of-type(11):before { content: "Numero B/L"; }
td:nth-of-type(12):before { content: "Bulto"; }
td:nth-of-type(13):before { content: "Cantidad"; }
td:nth-of-type(14):before { content: "Guia"; }
td:nth-of-type(15):before { content: "Folio"; }
td:nth-of-type(16):before { content: "Turno"; }
td:nth-of-type(17):before { content: "Empleado"; }

h2{
	font-size:50px;
	font-weight:bold;
	margin-left:2%;	
}
	

}
 </style>

</head>

<body>
<!-- Validaciones de roles y dispositivos -->
	<?php
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
			if(stripos($ua,'android') !== false or stripos($ua,'IPhone') !== false) { 
			if($_SESSION['rol'] !=2){
	?>
	<center>
	<a href="../informes_telefono.php">
    <img src="../img/tcvalLogo.png" width="500px" height="200">
    </a>
	</center>
	<?php
		}
	} 
	?>
	<?php
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
			if(stripos($ua,'Windows') !== false or stripos($ua,'IOS') !== false) { 
			if($_SESSION['rol'] == 1 ){
		
?>
<!-- barra de navegacion  -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img style="width:110px; height:40px; margin-top:-10px;" src="../img/tcvalLogo-2.png"> </img></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../inicio.php">inicio</a></li>
        <li><a href="../ingreso.php">Registrar ingreso</a></li>
        <li><a href="../salida.php">Registrar salida</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes<span class="caret"></span></a>
          <ul class="dropdown-menu">
            	<li><a href="../Registros/ListadoTerminal.php">Listado Terminal </a>  </li>
                <li><a href="../Registros/ListadoPermanencia.php">Listado Permanencia </a> </li>
                <li><a href="../Registros/ListadoIngresosDia.php"> Ingresos del dia </a> </li>
                <li><a href="../Registros/ListadoIngreso.php">Listado de ingreso </a> </li>
                <li><a href="../Registros/ListadoSalida.php">Listado de salida </a> </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Graficos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            	<li><a href="../Graficos/BultosGraph.php">Cargas </a>  </li>
                <li><a href="../Graficos/ConsignaGraph.php">Consignatarios</a> </li>
                <li><a href="../Graficos/FaenaGraph.php">Faenas</a> </li>
                <li><a href="../Graficos/OperacionEntradaGraph.php">Operaciones de ingresos</a> </li>
                <li><a href="../Graficos/OperacionGraph.php">Operaciones de salida</a> </li>
                
                <li><a href="../Graficos/ProcedenciaGraph.php">Procedencias</a> </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios<span class="caret"></span></a>
          <ul class="dropdown-menu">
            	<li><a href="../Registro.php">Registrar Usuario</a></li>
                <li><a href="../editarUsuarios.php">Editar Usuarios</a></li>

          </ul>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../Buscadores/salir.php"><span class="glyphicon glyphicon-user"></span>Cerrar Sesion</a></li>

      </ul>
    </div>
  </div>
</nav>
 <?php }else{ 
 	if($_SESSION['rol']==3){
		
  ?>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href=""><img style="width:110px; height:40px; margin-top:-10px;" src="../img/tcvalLogo-2.png"> </img></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../informes.php">inicio</a></li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes<span class="caret"></span></a>
          <ul class="dropdown-menu">
            	<li><a href="../Registros/ListadoTerminal.php">Listado Terminal </a>  </li>
                <li><a href="../Registros/ListadoPermanencia.php">Listado Permanencia </a> </li>
                <li><a href="../Registros/ListadoIngresosDia.php"> Ingresos del dia </a> </li>
                <li><a href="../Registros/ListadoIngreso.php">Listado de ingreso </a> </li>
                <li><a href="../Registros/ListadoSalida.php">Listado de salida </a> </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Graficos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            	<li><a href="../Graficos/BultosGraph.php">Cargas </a>  </li>
                <li><a href="../Graficos/ConsignaGraph.php">Consignatarios</a> </li>
                <li><a href="../Graficos/FaenaGraph.php">Faenas</a> </li>
                <li><a href="../Graficos/OperacionEntradaGraph.php">Operaciones de ingresos</a> </li>
                <li><a href="../Graficos/OperacionGraph.php">Operaciones de salida</a> </li>
                
                <li><a href="../Graficos/ProcedenciaGraph.php">Procedencias</a> </li>
          </ul>
        </li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../Buscadores/salir.php"><span class="glyphicon glyphicon-user"></span>Cerrar Sesion</a></li>

      </ul>
    </div>
  </div>
</nav>
 <?php }}} ?>
 
 
 
 <!--Inicio de la tabla listado-->
<?php $conn=mysqli_connect("localhost","root","","proyecto"); ?>
 <br />
 <h2>Listado de salida general</h2>
 <br />
 
  <table class="tabla" >
    <tr>
      <th >Mes</th>
      <th >Fecha</th>
      <th >Hora</th>
      <th >Patente</th>
      <th >Operacion</th>
      <th >Faena</th>
      <th >Iso Code</th>
      <th >Contenedor</th>
      <th >Consignatario</th>
      <th >Observacion</th>
      <th >Numero B/L</th>
      <th >Bulto</th>
      <th >Cantidad</th>
      <th >Guia</th>
      <th >Folio</th>
      <th >Turno</th>
      <th >Empleado</th>
      
      
    </tr>
  <?php
//Listado
$sql="SELECT `salidas`.`Mes`, `salidas`.`Fecha`, `salidas`.`Hora`, `salidas`.`Patente`, `tipo_operacion`.`operacion`, `faenas`.`nombre` as faena, `iso_codes`.`descrip` as isocode, `salidas`.`Contenedor`, `consignatarios`.`nombre_consig` as consignatario, `salidas`.`Observacion`, `salidas`.`numBL`, `tipo_bultos`.`bulto`, `salidas`.`Cantidad`, `salidas`.`Guia`, `salidas`.`Folio`, `salidas`.`Turno`,salidas.empleado, salidas.idIngreso
FROM `salidas` 
INNER JOIN `tipo_operacion` ON tipo_operacion.idOperacion=salidas.Tipo_Operacion 
INNER JOIN `faenas` ON faenas.idfaena=salidas.Faena 
LEFT JOIN `iso_codes` ON iso_codes.isocode=salidas.Iso_Code 
LEFT JOIN  `consignatarios` ON consignatarios.idConsignatario=salidas.Consignatario  
INNER JOIN `tipo_bultos` ON tipo_bultos.idBulto=salidas.tipo_bulto 
ORDER BY salidas.fecha desc,salidas.hora desc";
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