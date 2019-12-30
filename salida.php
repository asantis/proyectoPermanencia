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
<form action="listadosalida.php" target="pListadoS" method="post" name="enviar" id="enviar">
<p><img src="img/tcvalLogo.png" width="268" height="86"></p>
<p>Registrar Salida</p>
<table>
  <tr>
	<td>Patente</td>
    <td>Operacion</td>
    <td>Faena</td>
    <td>Iso Code</td>
    <td>Contenedor</td>
    <td>Consignatario</td>
    <td>Observacion</td>
    <td></td>
</tr>
<tr>
	<td><input type="text" size="10" name="patente" id="patente"></td>
    <td><select name="operacion" id="operacion">
    <option value="0"> -- SELECCIONAR -- </option>
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
    
    
    
    <td><select name="isocode" id="isocode">
    <option value="0"> -- SELECCIONAR -- </option>
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
    
    <td><input type="text" name="observacion" id="observacion"></td>
</tr>
</table>
  <p>Datos de Arrastre  </p>
  	
 <table>
  <tr>
  	<td>Nro B/L</td>
    <td>Tipo Bulto</td>
    <td>Cantidad</td>
    <td>Guia</td>
    <td>Folio</td>
  </tr>
  
  	<td><input type="text" name="nrobl" id="nrobl"></td>
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
    
    </select></td>
   	<td><input type="text" name="cantidad" id="cantidad"></td>
    <td><input type="text" name="guia" id="guia"></td>
    <td><input type="text" name="folio" id="folio"></td>
    
    
  </tr>
  </table>
  <input type="button" value="Enviar" onClick="envio();">
</form>
</body>
</html>