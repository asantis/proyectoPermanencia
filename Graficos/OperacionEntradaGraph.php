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
<title>Grafico de Operaciones</title>


		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Cantidad de operaciones realizadas de entrada a TCVAL'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
			<!--  Grafico de barras Seccion Y del grafico -->
<?php
$_SERVER['REQUEST_METHOD'] == 'POST';
$mysqli = new mysqli("localhost","root","","proyecto");

$exit = "";

$sql = "select tp.operacion, count(s.Tipo_Operacion) as 'Cantidad_Operacion' 
		from ingresos s
		join tipo_operacion tp on tp.idOperacion=s.Tipo_Operacion
		group by tp.operacion
		order by Cantidad_Operacion desc";



if(isset($_POST['date'])){
$x = $mysqli ->real_escape_string($_POST['date']);	
$sql =  "select 
		tp.operacion, 
		count(s.Tipo_Operacion) as 'Cantidad_Operacion' 
		from ingresos s
		join tipo_operacion tp on tp.idOperacion=s.Tipo_Operacion
		WHERE s.fecha = '" .$x. "'
		group by tp.operacion
		order by Cantidad_Operacion desc"	;
}
		
$result=mysqli_query($mysqli,$sql);
while($raw=mysqli_fetch_array($result)){
			?>
			['<?php echo $raw['operacion']?>'],
			<?php 
			} 
			?>
		]
			,
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Cantidad de operaciones',
            data: [
			<!-- Seccion Y del grafico numeros  -->

			
			
<?php
$mysqli = new mysqli("localhost","root","","proyecto");

$exit = "";

$sql = "select tp.operacion, count(s.Tipo_Operacion) as 'Cantidad_Operacion' from ingresos s
join tipo_operacion tp on tp.idOperacion=s.Tipo_Operacion

group by tp.operacion
order by Cantidad_Operacion desc";
		
if(isset($_POST['date'])){
$x = $mysqli ->real_escape_string($_POST['date']);	
$sql = "select tp.operacion, count(s.Tipo_Operacion) as 'Cantidad_Operacion' from ingresos s
join tipo_operacion tp on tp.idOperacion=s.Tipo_Operacion
WHERE s.fecha = '" .$x. "'
group by tp.operacion
order by Cantidad_Operacion desc"	;
}

$result = $mysqli->query($sql);
if ($result->num_rows > 0 ){
	
	while($row =$result->fetch_assoc()){
	?>
	<?php echo $row['Cantidad_Operacion'] ?>,<?php 
	}
}
	echo($exit);
	$mysqli->close();
?>


			]
        }]
    });
});
		</script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../Highcharts-4.1.5/js/highcharts.js"></script>
<script src="../Highcharts-4.1.5/js/modules/exporting.js"></script>

<style>
	.Formulario {
	margin-left: 4%;
	height: 60px;
	width: 90%;	
	}
	
	.Formulario a {
	color: #000;	
	text-decoration: none;
	font-size:25px;
	
	}
	
	.Formulario input {
	color: #000;	
	text-decoration: none;
	font-size:20px;
	width:250px;
	height:30px;
	border:1px solid #000;
	border-radius:5px;
	text-align:center;
	
	}
	
.grafico {
	width: 90%;	
	height: 650px;
	margin-left:3%;
}

#envio{
font-size:17px;
 width:150px;
  height:30px;
   float:right;	
}
#reiniciar{
font-size:17px;
 width:150px; 
 height:30px;
 float:right;
}

@media
screen and (max-width: 1366px){
	.grafico {
	width: 90%;	
	height: 450px;
	margin-left:3%;
}
</style>
</head>


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
	if(stripos($ua,'Windows') !== false or stripos($ua,'Ios') !== false) { 
	
	if($_SESSION['rol'] == 1 ){
		
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

<div class="Formulario">

    <form method="POST" action="#"> 
        <br />
        <a>Seleccionar fecha:</a>
          <?php 
        $month = date('m');
        $day = date('d');
        $year = date('Y');
        
        $today = $year . '-' . $month . '-' . $day;
        ?> 
        <input type="date" name="date" id="date" value="<?php echo $today; ?>"/>
        
        <?php 
        
            if($_POST){
                ?>
        <a> Fecha seleccionada:  </a><a>
        <?php
            echo $_POST['date'];
            }
        ?> </a>
        
        <input  type="submit" name="envio" id="envio" value="Buscar" />
        <a href="OperacionGraph.php"><input id="reiniciar" type="button" value="Reiniciar" /> </a> 
    </form>
</div>

<br /> <br />
<div class="grafico" id="container">
</div>

</body >
</html>


<!-- Lo mismo es para todos los graficos no hay diferencia en nada a excepcion de la query para sacar X e Y del grafico -->