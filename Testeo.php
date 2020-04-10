<!-- tabla de ingreso patentes por escaner -->
	<table>
		<tr>
        	<td>Patentes</td>
        	<td>Lpr_id</td>
            <td>time_enter</td>
	

<?php 

include ("Connections/con_proyectoV2.php");

$sql = "select 
			plate_recognized,
			lpr_id,
			time_enter
		from t_log 
		WHERE lpr_id  = '1'
		ORDER BY time_enter desc
		LIMIT 7";
$result=pg_query($con,$sql);

	while($row = pg_fetch_array($result)){
		
	echo "<tr>
		<td>".$row['plate_recognized']. "</td> 
		<td>".$row['lpr_id']. "</td> 
		<td>".$row['time_enter']. "</td> 
	</tr>";
	
	}
	
?>
</tr> </table>



<!-- tabla de salida de patentes por escaner -->
<br /> <br />
	<table>
		<tr>
        	<td>Patentes</td>
        	<td>Lpr_id</td>
            <td>time_enter</td>
	

<?php 


$sql = "select 
			plate_recognized,
			lpr_id,
			time_enter
		from t_log 
		WHERE lpr_id  = '2'
		ORDER BY time_enter desc
		LIMIT 7";
$result=pg_query($con,$sql);

	while($row = pg_fetch_array($result)){
		
	echo "<tr>
		<td>".$row['plate_recognized']. "</td> 
		<td>".$row['lpr_id']. "</td> 
		<td>".$row['time_enter']. "</td> 
	</tr>";
	
	}
	
?>
</tr> </table>



<select name="patente" id="patente">
                
   	<option value="0"> -- SELECCIONAR -- </option>
    
    <?php
		$sql = "select 
			plate_recognized,
			lpr_id,
			time_enter
		from t_log 
		WHERE lpr_id  = '1'
		ORDER BY time_enter desc
		LIMIT 7";
$result=pg_query($con,$sql);

	while($row = pg_fetch_array($result)){
	?> <option value="<?php echo $row['plate_recognized'];?>"> <?php echo $row['plate_recognized']; ?>" </option> 
    
    <?php } ?>
	
    

