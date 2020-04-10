<!--Simplemente elimina al usuario seleccionado de la tabla editarUsuarios.php-->

<?php

	session_start();	
if(empty($_SESSION['active']))
{
	header('location: Login.php');
}

$con = mysqli_connect("localhost","root","","proyecto");
##id Extraida de la tabla editarUsuarios
$id=$_REQUEST['id'];
$query = "DELETE FROM usuarios WHERE idUsuario=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
if ($_SESSION['idUser']==$id  ){
		session_destroy();
		header("Location: Login.php");
}else {
	header("Location: editarUsuarios.php");
}
?>