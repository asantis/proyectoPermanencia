  <?php
    	$mysqli = new mysqli("localhost", "root", "31Ordnajela$", "proyecto");
  //Busqueda por fecha de camiones dentro del terminal
  	$exit = "";
	$Sentence = "SELECT I.patente AS 'patente',
	T.operacion AS 'operacion',
	P.Procedencia AS 'procedencia',
	IC.descrip AS 'descripcion',
	I.Contenedor AS'contenedor',
	I.Observacion AS 'observacion',
	I.Mes AS 'mes',
	date_format(I.Fecha,'%d-%m-%Y') AS 'fecha',
	I.Hora AS 'hora' 
	FROM ingresos I
	INNER JOIN tipo_operacion T ON I.Tipo_Operacion=T.idOperacion 
INNER JOIN procedencias P ON I.Procedencia=P.idProcedencia 
INNER JOIN iso_codes IC ON I.Iso_Code=IC.isocode
LEFT JOIN salidas s on I.idIngreso=s.idIngreso
order by i.Fecha desc, i.hora desc";
  
  	if(isset($_POST['question'])){
		$y = $mysqli -> real_escape_string($_POST['question']);
		$Sentence = "select I.patente AS 'patente',
	T.operacion AS 'operacion',
	P.Procedencia AS 'procedencia',
	IC.descrip AS 'descripcion',
	I.Contenedor AS'contenedor',
	I.Observacion AS 'observacion',
	I.Mes AS 'mes',
	date_format(I.Fecha,'%d-%m-%Y') AS 'fecha',
	I.Hora AS 'hora' 
FROM ingresos I 
INNER JOIN tipo_operacion T ON I.Tipo_Operacion=T.idOperacion 
INNER JOIN procedencias P ON I.Procedencia=P.idProcedencia 
INNER JOIN iso_codes IC ON I.Iso_Code=IC.isocode
LEFT JOIN salidas s on i.idIngreso=s.idIngreso
WHERE s.idIngreso is null AND i.Fecha LIKE '%".$y."%'
order by i.Fecha, i.Hora DESC";	
	}
	
	  	if(isset($_POST['question'])){
		$y = $mysqli -> real_escape_string($_POST['question']);
		$Sentence = "select I.patente AS 'patente',
	T.operacion AS 'operacion',
	P.Procedencia AS 'procedencia',
	IC.descrip AS 'descripcion',
	I.Contenedor AS'contenedor',
	I.Observacion AS 'observacion',
	I.Mes AS 'mes',
	date_format(I.Fecha,'%d-%m-%Y') 'fecha',
	I.Hora AS 'hora' 
FROM ingresos I 
INNER JOIN tipo_operacion T ON I.Tipo_Operacion=T.idOperacion 
INNER JOIN procedencias P ON I.Procedencia=P.idProcedencia 
INNER JOIN iso_codes IC ON I.Iso_Code=IC.isocode
LEFT JOIN salidas s on i.idIngreso=s.idIngreso
WHERE s.idIngreso is null AND i.Fecha LIKE '%".$y."%'
order by i.Fecha, i.Hora DESC";	
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
	$exit.= "No hay datos";
}

	echo($exit);
	$mysqli->close();
   ?>
   
   