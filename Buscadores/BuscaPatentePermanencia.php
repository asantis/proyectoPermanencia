<!-- Se llama al js y se envia a la ventana que se señala la tabla -->
<?php
	session_start();	
if(empty($_SESSION['active']))
{
	header('location: Login.php');
}
 ?>
 
  <?php
    	$mysqli = new mysqli("localhost", "root", "", "proyecto");
  //Busqueda por fecha de camiones dentro del terminal
  	$exit = "";
	$Sentence = "SELECT I.patente AS 'patente',
	T.operacion AS 'operacion',
	P.Procedencia AS 'procedencia',
	ifnull(IC.descrip,'N/A') AS 'descripcion',
	ifnull(I.Contenedor, 'N/A') AS'contenedor',
	ifnull(I.Observacion, 'N/A') AS 'observacion',
	I.Mes AS 'mes',
	date_format(I.Fecha,'%d-%m-%Y') AS 'fecha',
	I.Hora AS 'hora' 
	FROM ingresos I
	INNER JOIN tipo_operacion T ON I.Tipo_Operacion=T.idOperacion 
INNER JOIN procedencias P ON I.Procedencia=P.idProcedencia 
left JOIN iso_codes IC ON I.Iso_Code=IC.isocode
LEFT JOIN salidas S on I.idIngreso=S.idIngreso
WHERE S.idIngreso is null
order by I.Fecha desc, I.hora desc";
  
  	if(isset($_POST['question'])){
		//Busqueda que permite filtrar los datos
		$y = $mysqli -> real_escape_string($_POST['question']);
		$Sentence = "select 
		I.patente AS 'patente',
		T.operacion AS 'operacion',
		P.Procedencia AS 'procedencia',
		ifnull(IC.descrip,'N/A') AS 'descripcion',
		ifnull(I.Contenedor, 'N/A') AS'contenedor',
		ifnull(I.Observacion, 'N/A') AS 'observacion',
		I.Mes AS 'mes',
		date_format(I.Fecha,'%d-%m-%Y') AS 'fecha',
		I.Hora AS 'hora' 
	FROM ingresos I 
	INNER JOIN tipo_operacion T ON I.Tipo_Operacion=T.idOperacion 
	INNER JOIN procedencias P ON I.Procedencia=P.idProcedencia 
	left JOIN iso_codes IC ON I.Iso_Code=IC.isocode
	LEFT JOIN salidas s on I.idIngreso=s.idIngreso
	WHERE s.idIngreso is null AND I.Fecha LIKE '%".$y."%'
	order by I.Fecha, I.Hora DESC";	
	}
	

	
	
		$result = $mysqli->query($Sentence);
	
		if ($result->num_rows > 0 ){
		$exit.="<table>
		<thread>
			<tr>
                <th>Patente</th>
                <th >Hora Ingreso</th>
                <th >Fecha</th>
                <th >Mes</th>
                <th >Tipo Operacion</th>
                <th >Procedencia</th>
                <th >Iso Code</th>
                <th >Contenedor</th>
                <th >Observacion</th>
			</tr>
		</thead>
		<tbody>";
	
	while($fila = $result-> fetch_assoc()){
	$exit.="<tr>
				<td>".$fila['patente']."</td>
				<td>".$fila['hora']."</td>
				<td>".$fila['fecha']."</td>
				
				
				<td>".$fila['mes']."</td>
				<td>".$fila['operacion']."</td>
				<td>".$fila['procedencia']."</td>
				<td>".$fila['descripcion']."</td>
				<td>".$fila['contenedor']."</td>
				<td>".$fila['observacion']."</td>
				</tr>";
	}
	$exit.= "<tbody></table>";
} else {
	$exit.= "<table> 
				<tr>
					<th>Patente</th>
					<th >Hora Ingreso</th>
					<th >Fecha</th>
					<th >Mes</th>
					<th >Tipo Operacion</th>
					<th >Procedencia</th>
					<th >Iso Code</th>
					<th >Contenedor</th>
					<th >Observacion</th>
				</tr>
			</table>";
}

	echo($exit);
	$mysqli->close();
   ?>
   
   