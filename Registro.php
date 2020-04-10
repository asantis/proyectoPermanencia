<!-- Seccion de registro de usuarios -->
  
<?php
	session_start();	
if(empty($_SESSION['active']))
{
	header('location: Login.php');
}
 ?>


 
  <?php
   $conn = mysqli_connect("localhost","root","","proyecto");
  
	if($_SESSION['rol'] != 1)
	{
		header("location: Buscadores/salir.php");
	}
 ?>
 


<?php
	
	if(!empty($_POST))
	{
		##Validar datos vacios
		$alert='';
		if(empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['usuario']) || empty($_POST['pass']) || ($_POST['rol']==0))
		{?>
        <div class="alert">
          <span class="closebtn">&times;</span>  
          <strong>¡Los datos no han podido ser guardados!</strong> Algunos campos pueden no estar completos.
        </div> 
        <!--Query para registrar a un usuario validando que la cuenta no exista-->
		<?php }else
		{
				$conn = mysqli_connect("localhost","root","","proyecto");
				$nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
				$usuario = $_POST['usuario'];
				$pass = $_POST['pass'];
				$rol = $_POST['rol'];
				
				
				$query = mysqli_query($conn,"select * from usuarios where usuario = '$usuario'");
				$result = mysqli_fetch_array($query);
				
				if($result > 0 )
				{
					?>
                    <div class="alert">
                      <span class="closebtn">&times;</span>  
                      <strong>¡Los datos no han podido ser guardados!</strong> El usuario ya existe
                    </div> 
                     <?php
				}else
				{
					$query_insert = mysqli_query($conn, "INSERT INTO usuarios (nombre, apellido, usuario, contrasena, idRol) VALUES ('$nombre' , '$apellido' , '$usuario' ,'$pass' , '$rol')");
					if($query_insert)
					{
						?> <div class="alert success">
                              <span class="closebtn">&times;</span>  
                              <strong>¡Datos guardados!</strong> Los datos ingresados han sido enviados y guardados exitosamente.
                            </div> 
 <?php
					}else{
						?> <div class="alert">
                      <span class="closebtn">&times;</span>  
                      <strong>¡Los datos no han podido ser guardados!</strong> El usuario ya existe
                    </div>  <?php
					}
				}
		}
	}
	
?>


 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Registro de usuarios</title>
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


.Formulario_registro {
	margin-left: 700px;
	
}

input{
	width: 400px;
	height: 50px;
	border: 1px solid #06F;
	border-radius:5px; 
	font-size:20px;
	text-align: center;
	
}

select {
	width: 400px;
	height: 50px;
	border: 1px solid #06F;
	border-radius:5px; 
	font-size:20px;
	
}

label {
	font-size: 25px;
	
	
	}
	
@media
screen and (max-width:1366px) {
	.Formulario_registro {
	margin-left: 500px;
	
}
}
	
@media 
only screen and (max-width: 1024px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
	
	.Formulario_registro {
	margin-left:200px;	
	
}

	
	input{
	width: 600px;
	height: 70px;
	border: 2px outset #06F;
	border-radius:10px; 
	font-size:30px;
	text-align: center;
	
}

select {
	width: 600px;
	height: 70px;
	border: 2px thick #06F;
	border-radius:10px; 
	font-size:35px;
	text-align:center;
	
}

label {
	font-size: 35px;
	
	
	}
}
	


</style>

<script> 
<!--Boton para cerrar cuadro de error-->
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
</head>

<body>



<!--Validacion de telefono-->
 <?php
	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'android') !== false or stripos($ua,'IPhone') !== false) {
 ?><center>
<a href="Telefono_Admin.php"><img style="height: 150px" src="../img/tcvalLogo-2.png" />
</a></center> 
<?php }else{ ?>
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
<?php } ?>
<br />


<div class="Formulario_registro"> 

<h1> Registro nuevo usuario </h1> 


<br />


<form action="" method="post">

	<label for="nombre">Nombre</label>
    <br />
    <input type="text" name="nombre" id="nombre" placeholder="Nombre"  />
    <br /> <br />
  <label for="apellido">Apellido</label>
  <br />
  <input type="text" name="apellido" id="apellido" placeholder="Apellido"/>
      <br /> <br />
  <label for="usuario">Usuario</label>
  <br />
  <input type="text" name="usuario" id="usuario" placeholder="Nombre usuario"/>
      <br /> <br />
  <label for="pass">Contraseña</label>
  <br />
  <input type="password" name="pass" id="pass" placeholder="Contraseña"/>
  <br /> <br />


  <label for="rol">Tipo usuario</label>
  <br />
    <!--Para mostrar el nombre del rol en vez de la ID-->
	<?php 
		
		$query_rol = mysqli_query($conn, "SELECT * FROM `rol_usuario`");
		$result_rol = mysqli_num_rows($query_rol);
	?>
    
    

  
  <select name="rol" id="rol">
	<option value="0">--SELECCIONAR-- </option>
   	<?php
		if($result_rol > 0)
		{
			while($rol = mysqli_fetch_array($query_rol)){
	?>	
    	<option value="<?php echo $rol["idRol"];?> "> <?php echo $rol["rol"] ?></option>
        <?php
			}
		}
	?>
    </select>
    <br /> <br />
    <input type="submit" value="Crear Usuario" class="btn_save" />
    <br /> <br />
 </form>

</center>
</div>
</body>
</html>