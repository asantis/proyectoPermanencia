  <!--"SELECT * FROM ingresos WHERE Patente LIKE '%".$q. "%' AND idSalida IS NULL ORDER BY Fecha DESC, Hora DESC";-->
	<?php
  	$mysqli = new mysqli("localhost", "root", "31Ordnajela$", "proyecto");
	$salida = "";
	$query = "SELECT i.Patente, i.hora as 'HoraI', s.hora as 'HoraS',time_format(timediff(concat(s.fecha, concat(' ', s.hora)), concat(i.fecha, concat(' ', i.hora))), '%H:%i:%s') as 'TiempoPermanencia' , date_FORMAT(i.Fecha, '%d-%m-%Y') AS 'Fecha_Ingreso', date_FORMAT(S.Fecha,'%d-%m-%Y') as 'Fecha_retiro'
		FROM ingresos i 
		JOIN salidas s on i.idIngreso = s.idIngreso
		ORDER BY s.fecha desc";
	
	if(isset($_POST['consulta'])){
		$q = $mysqli -> real_escape_string($_POST['consulta']);
		$query = "SELECT i.Patente, i.hora as 'HoraI', s.hora as 'HoraS',time_format(timediff(concat(s.fecha, concat(' ', s.hora)), concat(i.fecha, concat(' ', i.hora))), '%H:%i:%s') as 'TiempoPermanencia' , date_FORMAT(i.Fecha, '%d-%m-%Y') AS 'Fecha_Ingreso', date_FORMAT(S.Fecha,'%d-%m-%Y') as 'Fecha_retiro'
		FROM ingresos i 
		JOIN salidas s on i.idIngreso = s.idIngreso
		WHERE s.Fecha LIKE '%".$q."%'
		ORDER BY s.fecha desc";	
	}
	
		if(isset($_POST['pregunta'])){
		$x = $mysqli -> real_escape_string($_POST['pregunta']);
		$query = "SELECT i.Patente, i.hora as 'HoraI', s.hora as 'HoraS',time_format(timediff(concat(s.fecha, concat(' ', s.hora)), concat(i.fecha, concat(' ', i.hora))), '%H:%i:%s') as 'TiempoPermanencia' , date_FORMAT(i.Fecha, '%d-%m-%Y') AS 'Fecha_Ingreso', date_FORMAT(S.Fecha,'%d-%m-%Y') as 'Fecha_retiro'
		FROM ingresos i 
		JOIN salidas s on i.idIngreso = s.idIngreso
		WHERE i.Patente LIKE'%".$x. "%'
		ORDER BY s.fecha desc, s.hora desc";	
	}
	
	
//tabla de busqueda de camiones por tiempo de permanencia	
	$resultado = $mysqli->query($query);
	
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
	$salida.= "No hay datos";
}

	echo($salida);
	$mysqli->close();
  
  ?>



