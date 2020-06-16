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
 
<?php 	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['patente']) || empty($_POST['operacion']) || empty($_POST['isocode']) || empty($_POST['procedencia']))
		{
			##Mensaje que se muestra cada vez que haya un error al momento de ingresar los datos 
		?><div class="alert">
  <span class="closebtn">&times;</span>  
  <strong>¡Los datos no han podido ser guardados!</strong> Algunos campos pueden no estar completos.
</div>  <?php
		}else{?>

<?php
$conn=mysqli_connect("localhost","root","31Ordnajela$","proyecto");
date_default_timezone_set('America/Santiago');
if (isset($_POST['patente'])){
//Guardar Info
setlocale(LC_TIME,"es_ES");
$fecha=date('F');
$fecha=strftime('%B');
$Sql="INSERT INTO
 		ingresos(Mes,Faena,Fecha,Turno,Hora,Patente,Tipo_Operacion,Procedencia,Contenedor,Iso_Code,Observacion,Empleado)
 		VALUES('".$fecha."','','".date('y-m-d')."','','".date('H:i:s')."','".$_POST['patente']."','".$_POST['operacion']."','".$_POST['procedencia']."','";
#inicio IF contenedor
if ($_POST['contenedor']==''){
$Sql.='N/A';}
else{$Sql.=$_POST['contenedor'];}
$Sql.="','";
#Termino IF Contenedor

if ($_POST['isocode']==''){
$Sql.='N/A';}
else{$Sql.=$_POST['isocode'];}
$Sql.="','";
#inicio IF observacion
if ($_POST['observacion']==''){
$Sql.='N/A';}
else{$Sql.=$_POST['observacion'];}
$Sql.="','"
#Termino IF observacion
.$_SESSION['usuario']."')";
	$result=mysqli_query($conn,$Sql);
	if ($result){
		?> <div class="alert success">
  <span class="closebtn">&times;</span>  
  <!--Cuadro de datos correctos-->
  <strong>¡Datos guardados!</strong> Los datos ingresados han sido enviados y guardados exitosamente.
</div> <?php
	}else{echo "Ocurrió un error al guardar la información.";}
}
?>
 <?php }} ?>
 
<!doctype html>
<html>
<head>
<!--BOOSTRAP que permite la vista de la barra de navegacion-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="css/tablaestilo.css"  rel="stylesheet" type="text/css">

<meta charset="utf-8">
<title>Ingreso</title>
<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
<script language="javascript" type="text/javascript">

<!-- No se para que sirve ahora este script pero lo deje por si acaso -->
function envio(){
document.getElementById('enviar').submit();
document.getElementById('enviar').reset();
//location.reload();
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 
<!--Temporizador de las patentes-->
var timer;
	$(document).ready(function()
	{
	timer=setInterval(function(){
			$("#IngresoTiempo").load("Buscadores/IntervaloIngreso.php");
			refresh();
		},10000);
	});
function stop()
{
	window.clearInterval(timer);
	
	};
</script>


<style>

.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #4CAF50;}
	
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}	

@media screen and (max-width: 1920px){
.Registro{

width: 40%; 
margin-left: 30%;
	
}

select {
	height:35px;
	width:450px;
	padding:0;
	float:right;
	font-size:20px;
}

input {
	height:35px;
	width:450px;;
	padding:0;
	margin:0;
	float:right;
	font-size:20px
}
	
table {
	margin-left: 2%;
	width: 95%	
}

.Registro a  {

	font-size:30px;
	color:#000;
	text-decoration: none;

}

}
@media  screen and (max-width: 1366px) {
.Registro{

width: 50%; 
margin-left: 35%;
	
}


.Registro{

width: 50%; 
margin-left: 25%;
	
}

select {
	height:35px;
	width:450px;
	padding:0;
	float:right;
	font-size:16px;
}

input {
	height:30px;
	width:450px;;
	padding:0;
	margin:0;
	float:right;
	font-size:16px
}
	
table {
	margin-left: 2%;
	width: 95%	
}

.Registro a  {

	font-size:25px;
	color:#000;
	text-decoration: none;

}
	
}

</style>



 
 
 
</head>

<body>
<!-- Script para el boton de la barra de error o exito -->
<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>
<form action="#"  method="post" id="enviar">

<?php
		if($_SESSION['rol'] ==1)
{ ?>
<!-- Barra de navegacion por boostrap -->
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
 
<?php }else {
#Barra de navegacion del OPERADOR  
		if($_SESSION['rol'] ==2){
 ?>

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
        <li class="active"><a href="inicio_operador.php">inicio</a></li>
        <li><a href="ingreso.php">Registrar ingreso</a></li>
        <li><a href="salida.php">Registrar salida</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Buscadores/salir.php"><span class="glyphicon glyphicon-user"></span>Cerrar Sesion</a></li>
      </ul>
    </div>
  </div>
</nav>
 

<?php 
		}}
?>
<br>
<br>

<div class="Registro">
<!-- boton para cambiar las patentes al modo manual -->
<a style="	font-size:30px;
	text-align:center;
	font-weight: bold;">Registro de ingreso</a>
    <a href="IngresoManual.php"><input style="width:180px" type="button" name="button" value="Modo Manual" ></a>
    
<hr>
<br>

<!--Se llama la patente de la tabla t_log-->
<!--Se llama con la funcion de las patentes para actualizarlas cada 10 segundos-->
<div id="IngresoTiempo"> 
<!--Select para que las patentes se muestren al momento de entrar a la pagina-->
	 <select name="patente" id="patente" onchange="stop()">
                
   	<option value="0"> -- SELECCIONAR -- </option>
    <?php
	 include("Connections/con_proyectoV2.php");
		$sql = "SELECT 
					plate_recognized,
					lpr_id,
					time_enter
				FROM t_log 
				WHERE lpr_id  = '1'
				ORDER BY time_enter desc
				LIMIT 7";
$result=pg_query($con,$sql);

	while($row = pg_fetch_array($result)){
	?> <option value="<?php echo $row['plate_recognized'];?>"> <?php echo $row['plate_recognized']; ?> </option> 
    
    <?php } ?>    
    	</select>
</div>

<a> Patente: </a>   
<br>


    
    <br> 
    <br>
<a>Operaciones: </a>
    <td><select name="operacion" id="operacion">
    <option value="0"> -- SELECCIONAR -- </option>
    <?php
	//consulta
	$conn=mysqli_connect("localhost","root","31Ordnajela$","proyecto");
	$Sql="SELECT * FROM tipo_operacion ORDER BY operacion";
	$result=mysqli_query($conn,$Sql);
	while($row=mysqli_fetch_array($result)){
		?>
        <option value="<?php echo $row["idOperacion"];?>"><?php echo $row["operacion"];?></option>
        <?php
		}
	?> 
    </select></td>
    <br><br>
<a> Procedencia: </a>     
    <td><select name="procedencia" id="procedencia">
    <option value="0"> -- SELECCIONAR -- </option>
    <?php
	
	$Sql="SELECT * FROM procedencias ORDER BY Procedencia";
	$result=mysqli_query($conn,$Sql);
	while($row=mysqli_fetch_array($result)){
		?>
        <option value="<?php echo $row["idProcedencia"];?>"><?php echo $row["Procedencia"];?></option>
        <?php
		}
	?> 
    
    </select></td>
    <br><br>
<a> Iso Code: </a>     
    <td><select name="isocode" id="isocode">
    <option value="0"> -- SELECCIONAR -- </option>
    
    <?php
	
	$Sql="SELECT * FROM iso_codes ORDER BY descrip DESC";
	$result=mysqli_query($conn,$Sql);
	while($row=mysqli_fetch_array($result)){
		?>
        <option value="<?php echo $row["isocode"];?>"><?php echo $row["descrip"];?></option>
        <?php
		}
	?> 
    
    </select></td>
    
    <br><br>
<a> Contenedor: </a>    
    <td><input type="text" name="contenedor" id="contenedor"></td>
    <br><br>
<a> Observaciones: </a>
    <td><input type="text" name="observacion" id="observacion"></td>
   

</tr>

 <br/><br>
    <td><input style="width:300px; border:1px solid #000; height:40px; font-size:20px" type="button" value="Guardar" name="Guardar" onClick="envio();"></td>
   
    </div>
     
</form>
<br> <br> 
<br> <br> 

<p style="font-size:25px; font-weight:bold; margin-left: 2%">Listado Ingreso </p>


<table class="tabla">
  <tr style="font:bold; background-color:#3CF">
  	<th width="65">Mes</th>
    <th width="63">Fecha</th>
    <th width="62">Hora</th>
     <th width="90">Patente</th>
     <th width="125">Operacion</th>
     <th width="146">Procedencia</th>
     <th width="102">Iso Code</th>
     <th width="139">Contenedor</th>
     <th width="152">Observacion</th>

  </tr>
<?php
//Listado
$sql="SELECT I.Patente,
		T.operacion,
		P.Procedencia,
		IC.descrip as 'descrip' ,
		I.Contenedor as 'Contenedor',
		I.Observacion as 'Observacion',
		I.Mes,
		I.Fecha,
		I.Hora
FROM ingresos I
INNER JOIN tipo_operacion T ON I.Tipo_Operacion=T.idOperacion 
INNER JOIN procedencias P ON I.Procedencia=P.idProcedencia 
LEFT JOIN iso_codes IC ON I.Iso_Code=IC.isocode 
ORDER BY I.fecha desc,I.hora desc";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){
	echo "<tr>
		<td>".$row['Mes']."</td>
		<td>".$row['Fecha']."</td>
		<td>".$row['Hora']."</td>
		<td>".$row['Patente']."</td>
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