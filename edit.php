<!-- Pantalla para editar al usuario se llama la id de la cual fue extraida de la tabla editarUsuarios.php -->

<!-- Comentarios en ingles por que saque un template para editar a los usuarios :p -->
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


// including the database connection file
$conn = mysqli_connect("localhost","root","","proyecto");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $usuario=$_POST['usuario'];  
	$contraseña=$_POST['contraseña'];
    $rol=$_POST['rol'];
     

    // checking empty fields
    if(empty($nombre) || empty($apellido) || empty($usuario) || empty($contraseña) || empty($rol)) {            
	echo "Campos Incompletos";      
    } else {  

        //updating the table
        $result = mysqli_query($conn, "UPDATE usuarios SET  
						nombre='$nombre',
						apellido='$apellido',
						usuario='$usuario',
						contrasena='$contraseña',
						idRol='$rol' 
						WHERE idUsuario=$id");
	}?>
 <?php        //redirectig to the display page.
        header("Location: editarUsuarios.php");
    }

?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM usuarios WHERE idUsuario=$id");

				
				
while($row = mysqli_fetch_array($result))
{
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $usuario = $row['usuario'];
	$contraseña = $row['contrasena'];
    $rol = $row['idRol'];
}
?>
<html>
<head>    

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Edit Data</title>
    
    
    <style>
	#formulario{
		margin:0;
		padding:0;
		margin-left: 39%;
		
	}
		input {
			width:400px;	
			height: 30px;
			border: 1px solid #06F;
			border-radius:5px;
			font-size:18px;
			text-align:center;
			
		}
		
		#formulario a{
			font-size:20px;
			color:#000;
			text-decoration: none;
			
			
			
		}
		
		select {
			width: 400px;	
			height: 30px;
			border: 1px solid #06F;
			border-radius:5px;
			font-size:18px;
			text-align: center;	
		}
		
		#button{
			width:200px;	
			height: 35px;
			border: 1px solid #000;
			border-radius:5px;
			font-size:15px;
			text-align: center;
			margin-left:100px;
			
		}
		

	</style>
</head>


<body>


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
 

<br>  <br>
<div id="Formulario"> 
    
    <form name="form1" method="post" action="">
        
          <h1> Editar Usuario </h1>
          <br>   
                <a>Nombre</a>
                <br>
                <input type="text" name="nombre" value="<?php echo $nombre;?>">
                <br><br>
                <a>Apellido</a>
                <br>
                <input type="text" name="apellido" value="<?php echo $apellido;?>">
				<br><br>
                <a>Usuario</a>
                <br>
               <input type="text" name="usuario" value="<?php echo $usuario;?>">
            	<br><br>
                <a>Contraseña</a>
                <br>
                <input type="password" name="contraseña" value="<?php echo $contraseña;?>">
				<br><br>
                <a>Rol</a>
                <br>

                 	<?php 
		
		$query_rol = mysqli_query($conn, "SELECT * FROM `rol_usuario`");
		$result_rol = mysqli_num_rows($query_rol);
	?>
    <select name="rol" id="rol">
	
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
		<br>
        <br>
        	
               <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
				<input type="submit" name="update" id="button" value="Actualizar">
			

    </form>

</div>
</body>
</html>

