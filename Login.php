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
		
		$conn = mysqli_connect("localhost","root","","proyecto");
		
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inicio de sesion TCVAL</title>

<script> 
<!--Funcion para cerrar el cuadro de error -->
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

<style>

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
	border: 1px double black;
	border-radius:5px;	
	font-size:18px;
	text-align:center;
}
.pc a {
	font-size:20px;	
}

.pc .boton {
	height: 50px;
	width: 250px;
	font-size:20px
}

.celular input {
	height: 80px;
	width: 400px;
	border: 2px double black;
	border-radius:5px;	
	font-size:50px;
	text-align:center;
}

.celular a {
	font-size:50px;	
}

.celular .boton {
	height: 80px;
	width: 300px;
	font-size:50px;
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
        <table width="200">
          <tr>
            <td><img src="img/tcvalLogo.png" width="500" height="250"></td>
          </tr>
        </table>
        <table width="200">
          <tr>
            <td><img src="img/bienvenido.png" width="700" height="200"></td>
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


<center>
<table width="200">
  <tr>
    <td><img src="img/tcvalLogo.png" width="271" height="90"></td>
  </tr>
  
</table>
<table width="200">
  <tr>
    <td><img src="img/bienvenido.png" width="685" height="124"></td>
  </tr>
</table>
<br />

<div class="pc">

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