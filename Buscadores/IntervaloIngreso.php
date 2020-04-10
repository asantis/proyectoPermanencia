
<?php
	session_start();	
if(empty($_SESSION['active']))
{
	header('location: Login.php');
}
 ?>
 
 <!-- Select de patetes de ingreso: lo mismo con las de salida ayuda a poder llamarlas desde la funcion de la venta ingreso.php para poder actualizarlas automaticamente -->
 <select name="patente" id="patente" onchange="stop()">
                
   	<option value="0"> -- SELECCIONAR -- </option>
    <?php
	 include("../Connections/con_proyectoV2.php");
		$sql = "SELECT 
					plate_recognized,
					lpr_id,
					time_enter
				FROM t_log 
				WHERE lpr_id  = '1'
				ORDER BY time_enter desc
				LIMIT 7";
$result=pg_query($con,$sql);

	while($row = pg_fetch_array($result)){
	?> <option value="<?php echo $row['plate_recognized'];?>"> <?php echo $row['plate_recognized']; ?> </option> 
    
    <?php } ?>    </select>