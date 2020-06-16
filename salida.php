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

 
<!--Validar si estan vacios-->
 <?php 	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['patente']) || empty($_POST['operacion']) || empty($_POST['faena']) || empty($_POST['consignatario']) || empty($_POST['nrobl']) || empty($_POST['bulto']) || empty($_POST['cantidad']) ||empty($_POST['isocode']) || empty($_POST['guia']) || empty($_POST['folio']) || empty($_POST['idingreso']) )
		{
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
$Sql="INSERT INTO salidas(Mes,Fecha,Hora,Patente,Tipo_Operacion,Faena,Iso_Code,Contenedor,Consignatario,Observacion,numBL,Tipo_Bulto,Cantidad,Guia,Folio,Turno,Empleado,idIngreso) 
VALUES('".$fecha."','".date('y-m-d')."','".date('H:i:s')."','"
.$_POST['patente']."','"
.$_POST['operacion']."',"
.$_POST["faena"].",'";
#ISOCODE NULL
if (empty($_POST['isocode'])){
$Sql.='N/A';}
else{$Sql.=$_POST['isocode'];}
$Sql.="','";
#CONTENEDOR NULL
if ($_POST['contenedor']==''){
$Sql.='N/A';}
else{$Sql.=$_POST['contenedor'];}
$Sql.="','"
.$_POST['consignatario']."','";
#OBSERVACION NULL
if ($_POST['observacion']==''){
$Sql.='N/A';}
else{$Sql.=$_POST['observacion'];}
$Sql.="','"
.$_POST['nrobl']."','"
.$_POST['bulto']."','"
.$_POST['cantidad']."','"
.$_POST['guia']."','"
.$_POST['folio']."',0,'"
.$_SESSION['usuario']."','"
.$_POST['idingreso']."')";
	$result=mysqli_query($conn,$Sql);
	if ($result){
		?> <div class="alert success">
  <span class="closebtn">&times;</span>  
  <strong>¡Datos guardados!</strong> Los datos ingresados han sido enviados y guardados exitosamente.
</div> <?php
	}else{echo "Ocurrió un error al guardar la información.";}
	
}
?>
<?php }} ?> 

    
    <!doctype html>
<html>
<head>
<script src="js/jquery.min.js"></script>
<script src="js/main.js"></script>
	<link rel="stylesheet" href="css/salidaEstilos.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<title>Registrar salida</title>

<script language="javascript" type="text/javascript">
function envio(){
document.getElementById('enviar').submit();
document.getElementById('enviar').reset();
//location.reload();
}

</script>


<style> 

.Registro{
border:1;
width: 35%; 
margin-left: 10%;	
}

#manual {
width:190px; 
height:35px; 
border:1px solid #000; 
border-radius: 5px; 
font-size:20px	
}


.Registro a {
	font-size:25px;	
	color: #000;
	text-decoration:none;
	
}

.Registro input {
	width:350px;
	height: 30px;
	font-size:17px;	
	float:right;
}

.Registro select {
	width:350px;
	height: 30px;
	float:right;
	font-size:16px;		
}


.Registro2{
	width: 35%; 
	margin-top: -450px;	
	margin-right: 10%;
	float:right;
}


.Registro2 a {
	font-size:25px;	
	color: #000;
	text-decoration:none;
	
}

.Registro2 input {
	width:350px;
	height: 30px;	
	float:right;
}

.Registro2 select {
	width:350px;
	height: 30px;
	float:right;	
}


.Registro3 input[type=radio]{
	 
    border: 0px;
    width: 25%;
    height: 1em;

}

.Registro3{
	
	width: 800px; 
	margin-top: 30px;
	margin-left: 10%;		
	
}

.Registro3 input {
	
	width: 10px;
	padding:0;
	margin-left:40px;
	float:left;
}



	
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
.tabla { 
  width: 100%; 
  border-collapse: collapse; 
}

.tabla th { 
  font-size:16px;
  text-align:center;
}

.tabla td { 
  font-size:16px;  
  text-align:center;
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
  padding: 6px 10px;
  border: 1px solid #ccc; 
  text-align: center; 
  font-size: 18x;
  width:100px;
}
td { 
  padding: 3px 3px;
  border: 1px solid #ccc; 
  text-align: center; 
  font-size: 18px;
  width:200;
  
}


@media  
	screen and (max-width: 1366px) {

.Registro{
border:1;
width: 40%; 
margin-left: 8%;	
}


#manual {
width:120px; 
height:30px; 
border:1px solid #000; 
border-radius: 5px; 
font-size:12px	
}


.Registro a {
	font-size:17px;	
	color: #000;
	text-decoration:none;
	
}

.Registro input {
	width:350px;
	height: 25px;
	font-size:13px;	
	float:right;
}

.Registro select {
	width:350px;
	height: 25px;
	float:right;
	font-size:13px;		
}


.Registro2{
	width: 40%; 
	margin-top: -380px;	
	margin-right: 6%;
	float:right;
}


.Registro2 a {
	font-size:17px;	
	color: #000;
	text-decoration:none;
	
}

.Registro2 input {
	width:300px;
	height: 25px;	
	float:right;
}

.Registro2 select {
	width:300px;
	height: 25px;
	float:right;	
}

.Registro3 input[type=radio]{
	 
    border: 1px solid #000;
    width: 15%;
    height: 1em;

}

.Registro3{
	
	width: 800px; 
	margin-top: 30px;
	margin-left: 8%;	
	
}

.Registro3 input {
	
	width: 10px;
	padding:0;
	margin-left:40px;
	float:left;
}

/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}



th { 
  background: #333; 
  color: white; 
  font-weight: bold; 
  padding: 1px 1px;
  border: 1px solid #ccc; 
  text-align: center; 
  font-size: 14x;
  width:100px;
}
td { 
  padding: 1px 1px;
  border: 1px solid #ccc; 
  text-align: center; 
  font-size: 14px;
  width:200;
  
}

}
	
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 

<!--Actualizar patentes de salida automaticamente cada 10 seg-->
var timer;

	$(document).ready(function()
	{
	timer=setInterval(function(){
			$("#autodata").load("Buscadores/IntervaloSalida.php");
			refresh();
		}, 10000);
	});
	<!--Funcionar para detener el tiempo-->
function stop()
{
	window.clearInterval(timer);
	
	};
</script>

</head>

<body>

<script>
<!--Boton X del cuadro de error-->
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


<?php
		if($_SESSION['rol'] ==1)
{ ?>

<!--Barra de navegacion por boostrap-->
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
 <!--Barra de navegacion rol 2 -->
<?php }else {
		if($_SESSION['rol'] ==2){
?> <nav class="navbar navbar-inverse">
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
 

<?php }} ?>
<br> <br>
<div>
<form action="#" method="post" name="enviar" id="enviar">

<br> 
<div class="Registro">
        <center style= "text-align:left";>
           <a style="font-size:20px; font-weight:bold;">Registrar Salida</a>
           <!--Boton para cambiar a modo manual--> 
           <a href="salidaManual.php"> <input id="manual" type="button" name="button" value="Modo manual" > </a>
        <hr>
        
        
        <!-- Llamar patente de la base de datos y poder colocarla en combobox -->
        <br>
        
             <div id="autodata">
                 <select name="patente" id="patente" onchange="stop()">
                        
            <option value="0"> -- SELECCIONAR -- </option>
            <?php
             include("Connections/con_proyectoV2.php");
                $sql = "SELECT 
                            plate_recognized,
                            lpr_id,
                            time_enter
                        FROM t_log 
                        WHERE lpr_id  = '2'
                        ORDER BY time_enter desc
                        LIMIT 7";
        $result=pg_query($con,$sql);
        
            while($row = pg_fetch_array($result)){
            ?> <option value="<?php echo $row['plate_recognized'];?>"> <?php echo $row['plate_recognized']; ?> </option> 
            
            <?php } ?>    
                </select>
             
             
             </div>
            <a>Patente </a>: 
            
            
            <br>
            <br>
        <a>Operacion:  </a>   
            <td><select name="operacion" id="operacion">
            <option value="0"> -- SELECCIONAR -- </option>
            <?php
            //consulta
            $conn=mysqli_connect("localhost","root","31Ordnajela$","proyecto");
            $Sql="SELECT * FROM tipo_operacion ORDER BY operacion";
            $result=mysqli_query($conn,$Sql);
            while($row=mysqli_fetch_array($result)){
                ?>
                    <option value="<?php 
                    echo $row["idOperacion"];?>">
                    <?php echo $row["operacion"];?>
                    </option>
                    <?php
                    }
                ?> 
            </select></td>
            <br> <br>
        <a>  Faena: </a>    
            <td><select id="faena" name="faena">
            <option value="0"> -- SELECCIONAR -- </option>
            
            <?php
            
            $Sql="SELECT * FROM faenas ORDER BY nombre";
            $result=mysqli_query($conn,$Sql);
            while($row=mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row["idfaena"];?>"><?php echo $row["nombre"];?></option>
                <?php
                }
            ?> 
            
            </select></td>
            
             <br> <br>
        <a> Iso Code: </a>    
            <td style="margin-left:50px;"><select name="isocode" id="isocode">
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
        <br>
        <br>
        <a> Contenedor: </a>    
            <td><input type="text" name="contenedor" id="contenedor"></td> 
          
            <br>
        <br> 
        <a> Consignatario: </a>    
            <td><select name="consignatario" id="consignatario">
            <option value="0"> -- SELECCIONAR -- </option>
            
            <?php
            
            $Sql="SELECT * FROM consignatarios ORDER BY nombre_consig";
            $result=mysqli_query($conn,$Sql);
            while($row=mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row["idConsignatario"];?>"><?php echo $row["nombre_consig"];?></option>
                <?php
                }
            ?> 
            </select></td>
          <br><br>  
        <a> Observaciones: </a>
        
            <input type="text" name="observacion" id="observacion">
        
        </tr>
        </table>
        
        
          </center>      
</div>
    
    <div class="Registro2">
     <p style="font-size:20px; font-weight: bold;">Datos de Arrastre </p>
     
     <hr>
     <br>
  	
<a> Numero B/L: </a>
  	<td><input type="text" name="nrobl" id="nrobl"></td>
    <br><br>
  <a>  Bulto: </a>
    <td><select name="bulto" id="bulto">
    <option value="0"> -- SELECCIONAR -- </option>
    
    <?php
	
	$Sql="SELECT * FROM tipo_bultos ORDER BY bulto";
	$result=mysqli_query($conn,$Sql);
	while($row=mysqli_fetch_array($result)){
		?>
        <option value="<?php echo $row["idBulto"];?>"><?php echo $row["bulto"];?></option>
        <?php
		}
	?> 
    
    </select></tr></td>
    <br><br>
  <a>  Cantidad: </a>
    <tr>
   	<td><input type="text" name="cantidad" id="cantidad"></td>
    <br>
    <br>
    <a> Guia: </a>
    <td><input type="text" name="guia" id="guia"></td>
    <br><br>
    <a> Folio: </a>
    <td><input type="text" name="folio" id="folio"></td>
    <br><br>
   <input style="width:200px; border:1px solid #000; border-radius:5px; height:40px; font-size:20px"; type="button" value="Enviar" onClick="envio();">
  </tr>

  <br>

 </div>
 
 <div class="Registro3">
<p style="font-size:20px; font-weight:bold;">Registro de Ingreso </p> <br>


  <table style="width:60%";  id="datos">
  <tr >
    <td >Patente</td>
    <td >Hora Ingreso</td>
    <td >Fecha Ingreso</td>
    <td ></td>
    </tr>
    </table>
    

  


 </div>
</form>
<br> <br> 
<p style="font-size:30px; font-weight:bold;"> Registro de salida </p>
</div>


<div>

 
  <table class="tabla" >
    <tr style="font:bold; background-color:#3CF">
      <th width="31" height="43">Mes</th>
      <th width="40">Fecha</th>
      <th width="34">Hora</th>
      <th width="51">Patente</th>
      <th width="69">Operacion</th>
      <th width="41">Faena</th>
      <th width="35">Iso Code</th>
      <th width="78">Contenedor</th>
      <th width="93">Consignatario</th>
      <th width="84">Observacion</th>
      <th width="58">Numero B/L</th>
      <th width="36">Bulto</th>
      <th width="60">Cantidad</th>
      <th width="32">Guia</th>
      <th width="33">Folio</th>
      <th width="40">Turno</th>
      <th width="66">Empleado</th>
      
      
    </tr>
  <?php
//Listado
$sql="SELECT `salidas`.`Mes`,
			 `salidas`.`Fecha`, 
			 `salidas`.`Hora`, 
			 `salidas`.`Patente`, 
			 `tipo_operacion`.`operacion`, 
			 `faenas`.`nombre` as faena, 
			 `iso_codes`.`descrip` as isocode, 
			 `salidas`.`Contenedor`, 
			 `consignatarios`.`nombre_consig` as consignatario,
			 `salidas`.`Observacion`, 
			 `salidas`.`numBL`, 
			 `tipo_bultos`.`bulto`, 
			 `salidas`.`Cantidad`, 
			 `salidas`.`Guia`, 
			 `salidas`.`Folio`, 
			 `salidas`.`Turno`,
			 salidas.empleado, 
			 salidas.idIngreso
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


</div>



</body>
</html>