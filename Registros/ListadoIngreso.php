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
<title>Listado de ingreso</title>

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
  font-size: 25px;
}
td, th { 
  padding: 6px 10px;
  border: 1px solid #ccc; 
  text-align: left; 
  font-size: 20px;
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
td:nth-of-type(6):before { content: "Procedencia"; }
 td:nth-of-type(7):before { content: "Iso code"; }
	
td:nth-of-type(8):before { content: "Contenedor"; }
td:nth-of-type(9):before { content: "Observaciones"; }


h2{
	font-size:50px;
	font-weight:bold;	
	
}
}
 </style>

</head>

<body>
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

 <br />
 <h2 style="margin-left:2%;">Listado de ingreso general</h2>
 <br /><br />
 	<table class="tabla">
      <tr>
        <th>Mes</th>
        <th>Fecha</th>
        <th>Hora</th>
         <th>Patente</th>
         <th>Operacion</th>
         <th>Procedencia</th>
         <th>Iso Code</th>
         <th>Contenedor</th>
         <th>Observacion</th>
      </tr>
		<?php
		$conn=mysqli_connect("localhost","root","","proyecto");
        //Listado
        $sql="SELECT
			 I.patente,
			 T.operacion,
			 P.Procedencia,
			 IC.descrip,
			 I.Contenedor,
			 I.Observacion,
			 I.Mes,
			 I.Fecha,
			 I.Hora 
			 FROM ingresos I 
			 INNER JOIN tipo_operacion T ON I.Tipo_Operacion=T.idOperacion 
			 INNER JOIN procedencias P ON I.Procedencia=P.idProcedencia 
			 INNER JOIN iso_codes IC ON I.Iso_Code=IC.isocode 
			 ORDER BY I.fecha desc,I.hora desc";
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