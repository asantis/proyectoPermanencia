
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
  
<?php
	if($_SESSION['rol'] == 2)
	{
		header("location: Buscadores/salir.php");
	}
 ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Informes</title>
<!--Boostrap + css-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="css/tablaestilo.css"  rel="stylesheet" type="text/css">



<style> 

a {
color: #000;
text-decoration: none;
}

.list1 a{
text-decoration:none;	
color: #000;
font-size:20px;
margin-left:2%;
}

.list1 #txtFecha{
width: 200px;
height:25px;
font-size:18px;
border: 1px solid #000;
border-radius:5px;
text-align: center;
}
.list1 #btnFecha{
width: 100px;
height:25px;
font-size:18px;
border: 1px solid #000;
border-radius:5px;
}

.list1 #gridFecha{
	margin-left:2%;
	
}
.list1 #gridFecha td{
	font-size:18px;
	
}


.list2 #datagrid{
margin-left:2%;	
}
.list2 #datagrid td{
font-size:18px;	
}

.list2 a{
text-decoration:none;	
color: #000;
font-size:20px;
margin-left:2%;
}

.list2 input{
width:200px;
font-size:18px;
border:1px solid #000;
border-radius:3px;
text-align:center;	
}


.list3 a{
text-decoration:none;	
color: #000;
font-size:20px;
margin-left:2%;
}

.list3 .tabla{
margin-left:2%;
}
.list2 .tabla td{
font-size:18px;	
}
</style>
</head>


<body>

<!--Barra de navegacion por boostrap-->

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href=""><img style="width:110px; height:40px; margin-top:-10px;" src="img/tcvalLogo-2.png"> </img></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="informes.php">inicio</a></li>

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

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Buscadores/salir.php"><span class="glyphicon glyphicon-user"></span>Cerrar Sesion</a></li>

      </ul>
    </div>
  </div>
</nav>
 
<br> 
<br>

<center>
<h1>Informes y Reportes </h1>
</center>
<br>
<h2 style="margin-left:2%; font-weight:bold;">Listado de camiones en el terminal</h2>
    	<p style="margin-left:2%; font-size:20px;">
        <!--Listado de camiones query para contar cuantos hay de manera general-->
			<?php 
                $conn=mysqli_connect("localhost","root","31Ordnajela$","proyecto");
                $sql= "select count(*) as 'camiones', i.Fecha, DATE_FORMAT(date(sysdate()),'%d-%m-%Y') as fechahoy from 	ingresos i left JOIN salidas s on i.idIngreso=s.idIngreso where s.idIngreso is null";
                $result=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($result)){
                    
                    echo  "<br><tr>
                    <td>Camiones dentro del terminal:  </td>
                <td>".$row['camiones']."</td>
            </tr>
            ";
                }
            ?>
    	</p>
    
    <div class="list1"> 


    <!-- Listado de camiones -->

  		<br>
		<a> Busqueda por Fecha de ingreso</a>
			<?php 
            
            $month = date('m');
            $day = date('d');
            $year = date('Y');
            
            $today = $year . '-' . $month . '-' . $day;
            ?>
        	<input type="date" name="txtFecha" id="txtFecha" value="<?php echo $today; ?>"/>
        	<input type="submit" name="btnFecha" id="btnFecha" value="Buscar"/> </p>
        <br>
        
         <table class="tabla" id="gridFecha">
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
        
   </div>
   
   <div class="list2"> 	
  <!-- Tabla de camiones aun en el terminal -->
    <br>
    	<h3 style="margin-left:2%; font-weight:bold;">Tiempo de los camiones en el terminal</h3>
        <br>
  		<a>Indicar patente:  </a>
        	<input type="text" size="10" name="patente" id="patente"> 
  		<br>    
        <br>
 		<a>Indicar Fecha de retiro:  </a>
 			<input type="date" size="10" name="fecha" id="fecha" value="<?php echo $today; ?>">
         	<input type="submit" name="btnFech" id="btnFech" value="Buscar"/>
         <br/> <br/>
        </tr>
        <table class="tabla" id="datagrid">
            <tr>
                <th width="65">Patente</th>
                <th width="65">Hora Ingreso</th>
                <th width="63">Hora Retiro</th>
                <th width="63">Tiempo de permanencia</th>
                <th width="65">Fecha Ingreso</th>
                <th width="63">Fecha Retiro</th>
           </tr>
          </table>

		<script src="js/jquery.min.js"></script>
        <script src="js/Tiempo.js"></script>
    <br> 
    <br>
   </div>
   
   
   
  <!-- Tabla de ingresados en el dia -->
  
    <h3 style="margin-left:2%; font-weight:bold;"> Listado de camiones ingresados en el dia </h3>
    
    <p style="margin-left:2%; font-size:20px;">
        <?php 
		$conn=mysqli_connect("localhost","root","31Ordnajela","proyecto");
		$sql5= "SELECT count(*) as 'conteo', date_format(sysdate(),'%d/%m/%y') as 'Fecha'
FROM ingresos I 
LEFT JOIN tipo_operacion T ON I.Tipo_Operacion=T.idOperacion 
LEFT JOIN procedencias P ON I.Procedencia=P.idProcedencia 
LEFT JOIN iso_codes IC ON I.Iso_Code=IC.isocode
WHERE I.Fecha = CURRENT_DATE
ORDER BY I.fecha desc,I.hora desc";
		$result=mysqli_query($conn,$sql5);
		while($row=mysqli_fetch_array($result)){
			
			echo  "<br><tr>
			<td>Total de camiones ingresados: </td>
		<td>".$row['conteo']."</td>

		<br>
		<td>Fecha actual: </td>
		<td>".$row['Fecha']."</td>
	</tr>
	";
		}
	?>
    </p>
   <div class="list3"> 
    <tr>
    	<tr>
            <table class="tabla">
            <tr style="font:bold; background-color:#3CF">
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
		
$sql4="SELECT I.patente,T.operacion,P.Procedencia,IC.descrip,I.Contenedor,I.Observacion,I.Mes,I.Fecha,I.Hora 
FROM ingresos I 
INNER JOIN tipo_operacion T ON I.Tipo_Operacion=T.idOperacion 
INNER JOIN procedencias P ON I.Procedencia=P.idProcedencia 
LEFT JOIN iso_codes IC ON I.Iso_Code=IC.isocode
WHERE I.Fecha = CURRENT_DATE
ORDER BY I.fecha desc,I.hora desc" ;
$result=mysqli_query($conn,$sql4);
while($row=mysqli_fetch_array($result)){
	echo "<tr>
		<td>".$row['patente']."</td>
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
    <br>
    </br>
</div>



</body>
</html>