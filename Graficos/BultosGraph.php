

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
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
			
        },
        title: {
            text: 'Estadisticas de cargas/bultos solicitados '
        },
		
	    credits: {
      	  enabled: false
    },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:,.0f}'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Cantidad total',
            data: [
			
<?php
$mysqli = new mysqli("localhost","root","31Ordnajela$","proyecto");

$exit = "";
//Query 1
$sql = "SELECT tb.bulto AS 'bulto_1', SUM(s.cantidad) AS 'count_bulto'
 	 	FROM salidas s 
		JOIN tipo_bultos tb ON s.Tipo_Bulto=tb.idBulto
		GROUP BY tb.bulto";
//Query para filtrar		
if(isset($_POST['date'])){
$x = $mysqli ->real_escape_string($_POST['date']);	
$sql =  "SELECT tb.bulto AS 'bulto_1', SUM(s.cantidad) AS 'count_bulto'
  		FROM salidas s 
		JOIN tipo_bultos tb ON s.Tipo_Bulto=tb.idBulto
		WHERE s.fecha = '" .$x. "'
		GROUP BY tb.bulto"	;
}

$result = $mysqli->query($sql);
if ($result->num_rows > 0 ){
	
	while($row =$result->fetch_assoc()){
	?>
	['<?php echo $row['bulto_1'];?>',   <?php echo $row['count_bulto'] ?>],<?php 
}
	}else {
	echo "No hay datos";

}
	echo($exit);
	$mysqli->close();
?>


            ]
        }]
    });
});

</script>








<style>
.Formulario {
margin-left: 4%;
max-width: 400px;
height: 300px;
width: 400px;
margin-top:40px;	

}
.formdate {
font-size:20px; 
margin-left:5%;
	
}

.Formulario a {
font-size:20px;
font-weight:bold;
color: #000;
text-decoration:none;

	
}

.Formulario p {
font-size:20px;
font-weight:bold;
margin-left: 10px;
	
}

.Formulario input {
font-size:20px; 
width:190px; 
height:30px; 
margin-left: 50px;	
border: 1px solid #000;
border-radius: 5px;
text-align: center;
color: #000;
	
}

.grafico{
height:700px;
max-width: 60%;  
margin-left:30%;
margin-top:-310px;
width:80%;	
}

@media 
only screen and (max-width: 1366px),
 {
	 .grafico{
		height:500px;
		max-width: 60%;  
		margin-left:30%;
		margin-top:-310px;
		width:80%;
			
	
}
	 
 }

@media 
only screen and (max-width: 1024px),
(min-device-width: 768px) and (max-device-width: 1024px)  {


.Formulario {

width: 70%;
	
}

.Formulario p {
	font-size: 45px;
	width: 800px;
	margin-left: 100px;	
	text-decoration:none;
}



.Formulario input{
margin-left: 280px;
font-size:40px;
width:300px;	
height: 60px;
}

a{
text-decoration:none;	
}

.formdate {
 
margin-left:180px;
width:500px;	
text-decoration:none;
}

.formdate a {
 
font-size: 30px;
text-decoration:none;
}


.grafico {
	font-size: 50px;
	margin-top: 150px;
	height: 900px;
	width: 600px;
	margin-left: 150px;
}

}
</style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Grafico Carga</title>
</head>

<body>



<script src="../Highcharts-4.1.5/js/highcharts.js"></script>
<script src="../Highcharts-4.1.5/js/modules/exporting.js"></script>
<center>

<?php
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	if(stripos($ua,'android') !== false or stripos($ua,'Iphone') !== false) { 
	if($_SESSION['rol'] !=2){
?>
<center>
<a href="../Registros/RegistroGraficos.php"><img src="../img/tcvalLogo.png" width="500px" height="200"></a>

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

<br />
</center>
<div class="Formulario">
<form method="POST" action=""> 




<p>Seleccione una fecha para filtrar </p>


  <?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?> 
<input type="date" name="date" id="date" value="<?php echo $today; ?>"/>
<br />
<br />
<div class="formdate">
<?php 

	if($_POST){
		?>
     
<a style="text-decoration:none; color:#000;"> Fecha Seleccionada:  </a>
    <a style="text-decoration:none; color:#000;">
		<?php
            echo $_POST['date'];
            }
        ?> 
    </a>
	</div>
<br />
<br />
<a href="BultosGraph.php"><input id="bultos" type="button" value="Reiniciar" /> </a>
 <br /> <br />
<input type="submit" name="envio" id="envio" value="Buscar" />


</form>

</div>

<div class="grafico" id="container">
</div>



</body>
</html>