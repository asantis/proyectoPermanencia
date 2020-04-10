<!-- Lo mismo se llama la variable si dirige a los JS y por ultimo a su tabla correspondiente
La unica funcion de esta seccion es poder llamar a la variable y asi filtrar los datos 
Esta ventana corresponde para las tablas de [Ingresos.php y salida.php]
 --> 

<?php
	session_start();	
if(empty($_SESSION['active']))
{
	header('location: Login.php');
}
 ?>
 
 <?php
  	$mysqli = new mysqli("localhost", "root", "", "proyecto");
	$salida1 = "";
	//query para mostrar 
	$query1 = "SELECT 
				i.Patente as 'Patente',
				i.Fecha as 'Fecha',
				i.Hora as 'Hora',
				i.idIngreso as 'idIngreso' 
				FROM ingresos i
				LEFT JOIN salidas s ON i.idIngreso=s.idIngreso
				WHERE s.idIngreso is null
				ORDER BY i.fecha desc, i.hora desc limit 5";
	//query para filtrar
	if(isset($_POST['consulta'])){
		$q = $mysqli -> real_escape_string($_POST['consulta']);
		$query1 = "SELECT
		i.Patente as 'Patente',
		i.Fecha as 'Fecha',
		i.Hora as 'Hora',
		i.idIngreso as 'idIngreso' 
		FROM ingresos i
		LEFT JOIN salidas s ON i.idIngreso=s.idIngreso
		WHERE s.idIngreso is null and i.Patente LIKE '%".$q."%' 
		ORDER BY i.fecha desc, i.hora desc limit 5";
					
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
	$salida1.= "<table >
		
			<tr>
				<td>Patente</td>
				<td>Hora de ingreso</td>
				<td>Fecha de ingreso</td>
				<td>Seleccionar</td>
			</tr>
		</table>";
}

	echo($salida1);
	$mysqli->close();
	
  ?>