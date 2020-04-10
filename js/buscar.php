 <?php
  	$mysqli = new mysqli("localhost", "root", "", "proyecto");
	$salida1 = "";
	$query1 = "SELECT i.Patente as Patente,i.Fecha as Fecha,i.Hora as Hora,i.idIngreso as idIngreso FROM INGRESOS i
LEFT JOIN SALIDAS s ON i.idIngreso=s.idIngreso
WHERE s.idIngreso is null ORDER BY i.fecha desc, i.hora desc limit 5";
	
	if(isset($_POST['consulta'])){
		$q = $mysqli -> real_escape_string($_POST['consulta']);
		$query1 = "SELECT  i.Patente as Patente,i.Fecha as Fecha,i.Hora as Hora,i.idIngreso as idIngreso FROM INGRESOS i
LEFT JOIN SALIDAS s ON i.idIngreso=s.idIngreso
WHERE s.idIngreso is null and i.Patente LIKE '".$q."' ORDER BY i.fecha desc, i.hora desc limit 5";
					
	}
	$resultado1 = $mysqli->query($query1);
	
	if ($resultado1->num_rows > 0 ){
		$salida1.="<table >
		<thread >
			<tr>
				<td>Patente</td>
				<td>Hora de ingreso</td>
				<td>Fecha de ingreso</td>
				<td>Seleccionar</td>
			</tr>
		</thead>
		<tbody>";
	 

	
	 
	while($fila1 = $resultado1-> fetch_assoc()){

	$salida1.="<tr>
				<td>".$fila1["Patente"]."</td>
				<td>".$fila1['Hora']."</td>
				<td>".$fila1['Fecha']."</td>
				<td><INPUT type=\"radio\" name=\"idingreso\" value=\"".$fila1['idIngreso']."\"></td>
				</tr>";
		
	}
	$salida1.= "<tbody></table>";
} else {
	$salida1.= "No hay datos";
}

	echo($salida1);
	$mysqli->close();
	
  ?>