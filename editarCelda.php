<?php
$con = mysqli_connect("localhost","root","","proyecto");
$id=$_REQUEST['idUsuario'];
$query = "SELECT * from usuarios where idUsuario='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['idUsuario'];
$trn_date = date("Y-m-d H:i:s");
$nombre =$_REQUEST['nombre'];
$apellido =$_REQUEST['apellido'];
$usuario =$_REQUEST['usuario'];
$contraseña =$_REQUEST['contrasena'];
$rol =$_REQUEST['idRol'];
$submittedby = $_SESSION["usuario"];
$update="update new_record set trn_date='".$trn_date."',
nombre='".$nombre."', apellido='".$apellido."', usuario='".$usuario."',contrasena='".$contraseña."',idRol='".$rol."',
submittedby='".$submittedby."' where idUsuario='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="idUsuario" type="hidden" value="<?php echo $row['idUsuario'];?>" />
<p><input type="text" name="nombre" placeholder="Enter Name" 
required value="<?php echo $row['nombre'];?>" /></p>
<p><input type="text" name="apellido" placeholder="Enter Last Name" 
required value="<?php echo $row['apellido'];?>" /></p>
<p><input type="text" name="usuario" placeholder="Enter User" 
required value="<?php echo $row['usuario'];?>" /></p>
<p><input type="text" name="contrasena" placeholder="Enter Pass" 
required value="<?php echo $row['contrasena'];?>" /></p>
<p><input type="text" name="idRol" placeholder="Enter Role" 
required value="<?php echo $row['idRol'];?>" /></p>
<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>