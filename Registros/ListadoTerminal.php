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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Registro de camiones</title>



<style> 
.tabla { 
  width: 90%; 
  border-collapse: collapse; 
  

}

h2{
	margin-left:90px;
	font-weight:bold;	
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

.Texto a {
	font-size:25px;	
	margin-left: 90px;
	color: #000;
	text-decoration: none;
	
	
}
.Texto input {
	
	 width:170px;
	 height: 30px;
	 text-align: center;
	 margin-left: 40px;
	 border: 1px solid #000;
	 font-size:18px;
	 }

@media 
only screen and (max-width: 1024px),
(min-device-width: 768px) and (max-device-width: 1024px)  {



.tabla, thread, tbody, th, td,tr {
	
	font-size: 40px;	
	width: 100%;
	display: block; 
	
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
	padding-top:10px;
	white-space:nowrap;
	
}
	td:nth-of-type(1):before { content: "Patente"; }
	td:nth-of-type(2):before { content: "Hora de ingreso"; }
	td:nth-of-type(3):before { content: "Fecha"; }

	td:nth-of-type(4):before { content: "Mes"; }
	td:nth-of-type(5):before { content: "Tipo de operacion"; }
	td:nth-of-type(6):before { content: "Procedencia"; }
	
	td:nth-of-type(7):before { content: "Iso Code"; }
	td:nth-of-type(8):before { content: "Contenedor"; }
	td:nth-of-type(9):before { content: "Observaciones"; }
	
	
.Texto a{
	font-size: 45px;
	margin-left:5%;
}

.Texto input {
	margin-top: 50px;
	width: 400px;
	height: 150px;
	font-size:45px;
	text-align:center;	
	
}


	

h2 {
	margin-top:10px;
	font-size: 50px;	
	
}
	}


</style>


</head>

<body>
<!-- Validacion de dispositivos y roles del usuario -->
<?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	if(stripos($ua,'android') !== false or stripos($ua,'Iphone') !== false) { 
	if($_SESSION['rol'] !=2){
?>
<center>
<a href="../informes_telefono.php"><img src="../img/tcvalLogo.png" width="500px" height="200"></a>

</center>
<?php }} ?>
<?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	if(stripos($ua,'Windows') !== false or stripos($ua,'IOS') !== false) { 
?>
<?php if($_SESSION['rol'] == 1){ ?>

<!-- Barra de navegacion -->
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
            	<li><a href="">Listado Terminal </a>  </li>
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
 if($_SESSION['rol'] == 3){ ?>
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
 
 <?php }} }?>
 
<br />


<h2> Listado de Camiones dentro del terminal </h2>

<!-- Para hacer que el texto te muestre el total de camiones que se encuentran ingresados y aun no han hecho la salida -->
<div class="Texto"> 
<a>
    <?php 
		$conn=mysqli_connect("localhost","root","","proyecto");
		$sql= "select
		 COUNT(*) as 'camiones',
		 DATE_FORMAT(date(sysdate()),'%d-%m-%Y') as fechahoy 
		 FROM ingresos i 
		 LEFT JOIN salidas s on i.idIngreso=s.idIngreso
		 left join iso_codes ic on i.Iso_Code=ic.isocode
         join procedencias p on i.Procedencia=p.idProcedencia
         join tipo_operacion t on i.Tipo_Operacion=t.idOperacion 
		 WHERE s.idIngreso is null";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($result)){
			
			echo  "<br>
			<tr>
			<a>Total de camiones en el terminal: ".$row['camiones']." </a>
			</tr>";
		}
	?>
</a>

<br />
<br />
<?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
<a> Busqueda por fecha de ingreso </a>

        <input type="date" name="txtFecha" id="txtFecha" value="<?php echo $today; ?>" />
        
        <input type="button" name="btnFecha" id="btnFecha" value="Buscar"/>
       
 <br />
 <br />
</div>
<center>
        <table
       class="tabla" id="gridFecha">
<tr >
                <th width="65">Patente</th>
                <th width="65">Hora Ingreso</th>
                <th width="63">Fecha</th>
                <th width="65">Mes</th>
                <th width="63">Tipo Operacion</th>
                <th width="63">Procedencia</th>
                <th width="63">Iso Code</th>
                <th width="63">Contenedor</th>
                <th width="63">Observacion</th>

    </tr>
    </table>


<script src="../js/jquery.min.js"></script>
<script src="../js/Tiempo.js"></script>

   
  </center>  
</body>
</html>