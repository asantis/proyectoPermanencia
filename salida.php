<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<form action="listadosalida.php" target="" method="post">
<p><img src="img/tcvalLogo.png" width="268" height="86"></p>
<p>Registrar Salida</p>
<table>
  <tr>
	<td>Patente</td>
    <td>Operacion</td>
    <td>Faena</td>
    <td>Iso Code</td>
    <td>Contenedor</td>
    <td>Nro B/L</td>
    <td>Consignatario</td>
    <td>Observacion</td>
    <td></td>
</tr>
<tr>
	<td><input type="text" size="10"></td>
    <td><select>
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
    
    <td><input type="text" size="10"></td>
    
    <td><select>
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
    
    <td><input type="text"></td> 
  
    <td><input type="text"></td> 
    
    <td><select>
    
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
    
    <td><select>
    
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
    
    <td><input type="submit"></td>
</tr>
</table>
</form>
<form name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>Datos de Arrastre  </p>
  	
 <table>
  <tr>
    <td>Tipo Bulto</td>
    <td>Cantidad</td>
    <td>Guia</td>
    <td>Folio</td>
  </tr>
  
   	<td><input type="text"></td>
    <td><input type="text"></td>
    <td><input type="text"></td>
    <td><input type="text"></td>
    
  </tr>
  </table>
</form>
</body>
</html>