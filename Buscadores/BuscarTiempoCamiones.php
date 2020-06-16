<!--Ventana que permite el uso de ajax trayendo los datos desde esta venta en donde lo unico que hace es llamar a la variable (q y x para poder hacer las busquedas mas facil en la seccion de la tabla se hace un select segun la variable llamada) -->


<?php
	session_start();	
if(empty($_SESSION['active']))
{
	header('location: Login.php');
}
 ?>
 
	<?php
  	$mysqli = new mysqli("localhost", "root", "31Ordnajela$", "proyecto");
	$salida = "";
	$query = "SELECT 
				i.Patente, 
				i.hora as 'HoraI', 
				s.hora as 'HoraS',
				time_format(timediff(concat(s.fecha, concat(' ', s.hora)), 
				concat(i.fecha, concat(' ', i.hora))), '%H:%i:%s') as 'TiempoPermanencia' , 
				date_FORMAT(i.Fecha, '%d-%m-%Y') AS 'Fecha_Ingreso', 
				date_FORMAT(s.Fecha,'%d-%m-%Y') as 'Fecha_retiro'
			FROM ingresos i 
			JOIN salidas s on i.idIngreso = s.idIngreso
			ORDER BY s.fecha desc";
	//query para filtrar la fecha 
	if(isset($_POST['consulta'])){
		$q = $mysqli -> real_escape_string($_POST['consulta']);
		$query = "SELECT 
					i.Patente, 
					i.hora as 'HoraI', 
					s.hora as 'HoraS',
					time_format(timediff(concat(s.fecha, concat(' ', s.hora)), 
					concat(i.fecha, concat(' ', i.hora))), '%H:%i:%s') as 'TiempoPermanencia' , 
					date_FORMAT(i.Fecha, '%d-%m-%Y') AS 'Fecha_Ingreso', 
					date_FORMAT(s.Fecha,'%d-%m-%Y') as 'Fecha_retiro'
				FROM ingresos i 
				JOIN salidas s on i.idIngreso = s.idIngreso
				WHERE s.Fecha LIKE '%".$q."%'
				ORDER BY s.fecha desc";	
	}
	//query para filtrar por patente
		if(isset($_POST['pregunta'])){
		$x = $mysqli -> real_escape_string($_POST['pregunta']);
		$query = "SELECT i.Patente, 
						i.hora as 'HoraI', 
						s.hora as 'HoraS',
						time_format(timediff(concat(s.fecha, concat(' ', s.hora)), concat(i.fecha, concat(' ', i.hora))), '%H:%i:%s') as 'TiempoPermanencia' , 
						date_FORMAT(i.Fecha, '%d-%m-%Y') AS 'Fecha_Ingreso',
						date_FORMAT(s.Fecha,'%d-%m-%Y') as 'Fecha_retiro'
				FROM ingresos i 
				JOIN salidas s on i.idIngreso = s.idIngreso
				WHERE i.Patente LIKE'%".$x. "%'
				ORDER BY s.fecha desc, s.hora desc";
	
	}
	
	
//tabla de busqueda de camiones por tiempo de permanencia	
	$resultado = $mysqli->query($query);
	$encontrado=false;

	if ($resultado->num_rows > 0 ){
		$salida.="<table class='tabla'>
		<thread>
			<tr>
				
			<th>Patente</th>
			<th>Fecha Ingreso</th>
			<th>Hora Ingreso</th>
			<th>Fecha Retiro</th>
			<th>Hora Retiro</th>
			<th>Tiempo de permanencia</th>	
			</tr>
		</thead>
		<tbody>";
	
	while($fila = $resultado-> fetch_assoc()){
		$encontrado=true;
	$salida.="<tr>

				<td>".$fila['Patente']."</td>
				<td>".$fila['Fecha_Ingreso']."</td>
				<td>".$fila['HoraI']."</td>
				<td>".$fila['Fecha_retiro']."</td>
				<td>".$fila['HoraS']."</td>
				<td>".$fila['TiempoPermanencia']."</td>

				</tr>";
	}
	$salida.= "<tbody></table>";
} else {
	$salida.= "<tabla>
			<tr>
				<th>Patente</th>
				<th>Fecha Ingreso</th>
				<th>Hora Ingreso</th>
				<th>Fecha Retiro</th>
				<th>Hora Retiro</th>
				<th>Tiempo de permanencia</th>	
			</tr> 
				</table";
}
	//if ($encontrado){
	echo($salida);
	//else{echo "No hay datos.";}
	$mysqli->close();
  
  ?>



