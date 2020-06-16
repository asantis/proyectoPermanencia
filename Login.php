<?php
	$alert = '';
session_start();	
if(!empty($_SESSION['active']))
{
	header('location: inicio.php');
}else{
	if(!empty($_POST))
	{	
		if(empty($_POST['usuario']) || empty($_POST['pass']))
	{?>
    <!--Div que viene con css definidos para mostrar un cuadro de error sea de color verde o rojo-->
		        <div class="alert">
                  <span class="closebtn">&times;</span>  
                  <strong>¡Error!</strong> Algunos campos pueden no estar completos.
                </div> 	
	<?php 
	}else {
		
		$conn = mysqli_connect("localhost","root","31Ordnajela$","proyecto");
		
		$user = $_POST['usuario'];
		$pass = $_POST['pass'];
		
		
		$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE usuario = '$user' AND contrasena = '$pass'");
		$result = mysqli_num_rows($query);
		
		if ($result > 0 )
		{
			$data = mysqli_fetch_array($query);
##Verificacion de datos de usuario segun su rol y para enviarlo a su pagina correspondiente
		if($data['idRol'] == 1)
		{
		$_SESSION['active'] = true;
		$_SESSION['idUser'] = $data['idUsuario']; 		
		$_SESSION['nombre'] = $data['nombre'];
		$_SESSION['apellido'] = $data['apellido']; 
		$_SESSION['usuario'] = $data['usuario']; 
		$_SESSION['pass'] = $data['contrasena']; 
		$_SESSION['rol'] = $data['idRol']; 
		header('location: inicio.php');
		}else{
			if($data['idRol'] ==  2)
			{
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['idUsuario']; 		
				$_SESSION['nombre'] = $data['nombre'];
				$_SESSION['apellido'] = $data['apellido']; 
				$_SESSION['usuario'] = $data['usuario']; 
				$_SESSION['pass'] = $data['contrasena']; 
				$_SESSION['rol'] = $data['idRol']; 
				header('location: inicio_operador.php');
			}else
			{
				if($data['idRol'] ==  3)
					$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'android') !== false or stripos($ua,'IPHONE') !== false) {
				{
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['idUsuario']; 		
				$_SESSION['nombre'] = $data['nombre'];
				$_SESSION['apellido'] = $data['apellido']; 
				$_SESSION['usuario'] = $data['usuario']; 
				$_SESSION['pass'] = $data['contrasena']; 
				$_SESSION['rol'] = $data['idRol']; 
				header('location: informes_telefono.php');
				}
			}else{
								$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['idUsuario']; 		
				$_SESSION['nombre'] = $data['nombre'];
				$_SESSION['apellido'] = $data['apellido']; 
				$_SESSION['usuario'] = $data['usuario']; 
				$_SESSION['pass'] = $data['contrasena']; 
				$_SESSION['rol'] = $data['idRol']; 
				header('location: informes.php');
				}
		}
	}                                                
		}else
		{?>
			<div class="alert">
                  <span class="closebtn">&times;</span>  
                  <strong>¡Error al intentar conectar!</strong> El usuario o contraseña son incorrectos
             </div> 
            <?php
			session_destroy();
		}
	}
	}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
<meta charset="utf-8">
<title>Inicio</title>
<!--Boostrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  


</head>




<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
   
      <a class="navbar-brand" href="#"><img style="width:110px; height:40px; margin-top:-10px;" src="img/tcvalLogo-2.png"> </img></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		  <li><a href="http://www.tcval.cl">Acerca de</a></li>
		  <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </div>
  </div>
</nav>
  
</body>
</html>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inicio de sesion TCVAL</title>

<style>
	
	body {
	background: #005B77 !important;	
}

	
	005B77
	
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

	
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

.pc input {
	height: 30px;
	width: 250px;
	border-radius: 12px;
	border: 1px double black;
	font-size:18px;
	text-align:center;
	
	
}

.pc a {
	font-size:20px;
	color: white;
}

.pc .boton:hover {
	height: 30px;
	width: 250px;
	font-size:20px
	background: transparent;
	border: 2px solid #005E25;
	border-radius: 12px;
	background-color: #009C20;
    color: white;
	
	
}


.celular input {
	height: 80px;
	width: 450px;
	border: 2px double #FFFFFF;	
	font-size:50px;
	text-align:center;
	border-radius: 20px;
	
}

.celular a {
	font-size:50px;
	color: white;
	
}

.celular .boton {
	height: 80px;
	width: 300px;
	font-size:50px;
	color: white;
}
	
.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  
  background-color: #007694;
 
	}
	
</style>



</head>

<body>

<?php
#VALIDACION  DEL DISPOSITIVO
	$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
	if(stripos($ua,'android') !== false or stripos($ua,'IPHONE') !== false) { 
?> 

	<center>
        <table width="518">
          <tr>
            <td width="510" height="361"><img src="img/logoV2blanco.png" width="539" height="366"></td>
          </tr>
        </table>
<br />

<div class="celular">
 <br /> <br />

<form action="" method="post">
 <a> Nombre de usuario </a>
  <br />
<input type="text" name="usuario"/>
<br />
<br />
<a> Contraseña </a>
<br />
<input type="password" name="pass"/>

<br />


<br /> 
<br />
<input class="boton" type="submit" name="enviar" value="Entrar"/>
</form>
</div>
</center>

<?php
}else {
 ?>

<body>
<center>	
<br />
	

<div class="form-signin">
<div class="pc">
<td><img src="img/logoV2blanco.png" width="299" height="203"></td>
	<br />
<form action="" method="post">
 <a> Usuario </a> 
   <br />
<input type="text" name="usuario" />
<br />
<a> Contraseña </a>
<br />
<input type="password" name="pass"/>

<br /><br />

<input class="boton" type="submit" name="enviar" value="Entrar" />
</form>
	
</div>
</center>

<?php } ?>
	
</body>
</html>