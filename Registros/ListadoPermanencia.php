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
<title>Registro Permanencia</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<style> 
.tabla { 
  width: 95%; 
  border-collapse: collapse; 

  
  
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

.Permanencia {
	margin-left:50px;
	padding:0;	
	width:550px;
}

.Permanencia a{
	font-size:25px;
	color: #000;
	text-decoration:none;
	
	
}

.Permanencia input {
	
	width:220px;
	height: 30px;
	font-size:20px;
	border: 1px solid #000;
	text-align:center;
	border-radius:5px;
	float:right;
	
}

#btnFech {
	width:200px;
	height:50px;
	font-size:25px;	
	margin-left:50px;
	
}

	
	

h2 {
	
	margin-left: 50px;
	text-decoration:none;	
	
}

@media 
only screen and (max-width: 1024px),
(min-device-width: 768px) and (max-device-width: 1024px)  {



.tabla, thread, tbody, th, td,tr {
	
	font-size: 35px;	
	width: 100%;
	display: block; 
	
}

tr {
	border: 2px solid #ccc;	
	
}

td{
	border:none;
	border-bottom:2px solid #eee;
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
	td:nth-of-type(1):before { content: "Patente"; }
	td:nth-of-type(2):before { content: "Fecha de ingreso"; }
	td:nth-of-type(3):before { content: "Hora de ingreso"; }

	td:nth-of-type(4):before { content: "Fecha de retiro"; }
	td:nth-of-type(5):before { content: "Hora de retiro"; }
	td:nth-of-type(6):before { content: "Tiempo de permanencia"; }
	
.Permanencia {
	margin:0;
	padding:0;	
	text-align:center;
	width:100%;
	
}

	
.Permanencia a{
	font-size: 45px;
	float:left;
	margin-left:5%;
}

.Permanencia input {
	width: 350px;
	height: 70px;
	font-size:33px;	
	border: 1px solid #000;
	margin-right: 100px;
}


	

h2 {
	font-size: 50px;
	font-weight:bold;	
	
}

#btnFech {
	width:350px;
	height:100px;
	font-size:40px;	
	margin-left:300px;
	margin-top:30px;
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
<a href="../informes_telefono.php"><img src="../img/tcvalLogo.png" width="500px" height="200"></a>

</center>
<?php }} ?>
<?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	if(stripos($ua,'Windows') !== false or stripos($ua,'ios') !== false) { 
	if ($_SESSION['rol'] == 1){
?>
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
            	<li><a href="../Registros/ListadoTerminal.php">Listado Terminal </a>  </li>
                <li><a href="">Listado Permanencia </a> </li>
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
	if($_SESSION['rol'] == 3 ){
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
 <br /> 
    	<h2>Tiempo de los camiones en el terminal</h2>
        <br /> <br />
    
        
<div class="Permanencia"> 
  <a>Indicar patente:  </a>
  <input type="text" size="10" name="patente" id="patente"> 
  <br />
  <?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>      
<br />
 <a>Indicar Fecha de retiro:  </a>
 	<input type="date" size="10" name="fecha" id="fecha" value="<?php echo $today; ?>" >
 </div>
    <br />
    
    


 	<input type="submit" name="btnFech" id="btnFech" value="Buscar" />


 
 <br />
 <br />
<center>
<table class="tabla" id="datagrid">
<tr style="background:#FFF;">
  	<th width="65">Patente</th>
    <th width="65">Hora Ingreso</th>
    <th width="63">Hora Retiro</th>
    <th width="65">Fecha Ingreso</th>
    <th width="63">Fecha Retiro</th>
    <th width="63">Tiempo de permanencia</th>
    </tr></table>
   
<script src="../js/jquery.min.js"></script>
<script src="../js/Tiempo.js"></script>

</center>
</body>
</html>