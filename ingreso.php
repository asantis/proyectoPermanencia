<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<script language="javascript" type="text/javascript">
function envio(){
document.getElementById('enviar').submit();
document.getElementById('enviar').reset();
//location.reload();
}
</script>
</head>

<body>
<form action="listado.php" target="pListado" method="post" id="enviar">
<p><img src="img/tcvalLogo.png" width="268" height="86"></p>
<table>
  <tr>
	<td>Patente</td>
    <td>Operacion</td>
    <td>Procedencia</td>
    <td>Iso Code</td>
    <td>Contenedor</td>
    <td>Observacion</td>
    <td></td>
</tr>
<tr>
	<td><input type="text" size="10" name="patente" id="patente"></td>
    <td><select name="operacion" id="operacion">
    <?php
	//consulta
	$conn=mysqli_connect("localhost","root","","proyecto");
	$Sql="SELECT * FROM tipo_operacion ORDER BY operacion";
	$result=mysqli_query($conn,$Sql);
	while($row=mysqli_fetch_array($result)){
		?>
        <option value="<?php echo $row["idOperacion"];?>"><?php echo $row["operacion"];?></option>
        <?php
		}
	?> 
    </select></td>
    
    <td><select name="procedencia" id="procedencia">
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
    
    
    <td><select name="isocode" id="isocode">
    
    <?php
	
	$Sql="SELECT * FROM iso_codes ORDER BY descrip";
	$result=mysqli_query($conn,$Sql);
	while($row=mysqli_fetch_array($result)){
		?>
        <option value="<?php echo $row["isocode"];?>"><?php echo $row["descrip"];?></option>
        <?php
		}
	?> 
    
    </select></td>
    
    
    
    <td><input type="text" name="contenedor" id="contenedor"></td>
    <td><input type="text" name="observacion" id="observacion"></td>
    <td><input type="button" value="Guardar" name="Guardar" onClick="envio();"></td>
</tr>
</table>
</form>
</body>
</html>