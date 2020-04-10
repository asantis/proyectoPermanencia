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
  <title>Registro ingresos del dia</title>


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

.Form {
	margin-left:35px;
}
.Form a {
	font-size:25px;
	color: #000;
	text-decoration:none;	
	
}

.Form h2 {
	font-weight:bold;
	font-size:30px;
}
@media 
only screen and (max-width: 1024px),
(min-device-width: 768px) and (max-device-width: 1024px)  {



.tabla, thread, tbody, th, td,tr {
	
	font-size: 30px;	
	width: 100%;
	display: block;
	margin:0; 
	
}

tr {
	border: 2px solid #ccc;
	
}

td{
	border:none;
	font-size:35px;
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
	td:nth-of-type(1):before { content: "Patente"; }
	td:nth-of-type(2):before { content: "Fecha"; }
	td:nth-of-type(3):before { content: "Hora de ingreso"; }
	td:nth-of-type(4):before { content: "Tipo de operacion"; }
	td:nth-of-type(5):before { content: "Procedencia"; }
	td:nth-of-type(6):before { content: "Iso Code"; }
	td:nth-of-type(7):before { content: "Contenedor"; }
	td:nth-of-type(8):before { content: "Observacion"; } 

.Form {
	margin-left:35px;
	
}
.Form a {
	margin-top: 50px;
	width: 400px;
	height: 150px;
	font-size:45px;
	text-align:center;	
	
	
}

.Form h2 {
	font-weight:bold;
	font-size: 50px;
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
                <li><a href=""> Ingresos del dia </a> </li>
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
 <br />
 <div class="Form"> 
    <h2> Listado de camiones ingresados en el dia </h2>
    
    <a>
        <?php 
		$conn=mysqli_connect("localhost","root","","proyecto");
		$sql5= "SELECT 
				count(I.Patente) as 'conteo', 
				DATE_FORMAT(sysdate(),'%d/%m/%y') as 'Fecha'
				FROM ingresos I 
				LEFT JOIN tipo_operacion T ON I.Tipo_Operacion=T.idOperacion 
				LEFT JOIN procedencias P ON I.Procedencia=P.idProcedencia 
				LEFT JOIN iso_codes IC ON I.Iso_Code=IC.isocode
				WHERE I.Fecha = CURRENT_DATE
				ORDER BY I.fecha desc,I.hora desc";
		$result=mysqli_query($conn,$sql5);
			while($row=mysqli_fetch_array($result)){
			#Para Escribir los camiones que han ingresa#
			##Ocurrencia: filtrar por fecha en caso de querer saber cuantos camiones ingresaron tal dia
					echo  "<br>
							<tr>
								<td>Camiones ingresados hoy: </td>
								<td>".$row['conteo']."</td>

							</tr>

							";
								}
							?>
   </a>
    </div>
    
    	   
            <table class="tabla">
            <tr>
            
				
                <th width="65">Patente</th>
                <th width="63">Fecha</th>
                <th width="65">Hora Ingreso</th>
                <th width="63">Tipo Operacion</th>
                <th width="63">Procedencia</th>
                <th width="63">Iso Code</th>
                <th width="63">Contenedor</th>
                <th width="63">Observacion</th>
</tr>
			
			<?php 
		
$sql4="SELECT 
				I.Patente,
				T.operacion,
				P.Procedencia,
				IC.descrip,
				I.Contenedor,
				I.Observacion,
				I.Mes,
				I.Fecha,
				I.Hora 
			FROM ingresos I 
			LEFT JOIN tipo_operacion T ON I.Tipo_Operacion=T.idOperacion 
			LEFT JOIN procedencias P ON I.Procedencia=P.idProcedencia 
			LEFT JOIN iso_codes IC ON I.Iso_Code=IC.isocode
			WHERE I.Fecha = CURRENT_DATE
			ORDER BY I.fecha desc,I.hora desc" ;
			$result=mysqli_query($conn,$sql4);
			while($row=mysqli_fetch_array($result)){
				echo "<tr>
					<td>".$row['Patente']."</td>
					<td>".$row['Fecha']."</td>
					<td>".$row['Hora']."</td>
					
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
    </tr>

</body>
</html>