<!-- Se llama la variable x para luego conseguirla en la ventana de los JS y asi que se actualice la tabla segun lo solicitado -->

<?php
	session_start();	
if(empty($_SESSION['active']))
{
	header('location: Login.php');
}
 ?>
 
<?php
$mysqli = new mysqli("localhost","root","","proyecto");

$exit = "";

//query que muestra los datos
$sql = "SELECT tb.bulto AS 'bulto_1', SUM(s.cantidad) AS 'count_bulto'
 	 	FROM salidas s 
		JOIN tipo_bultos tb ON s.Tipo_Bulto=tb.idBulto
		GROUP BY tb.bulto";
//query que sirve para filtrar 		
if(isset($_POST['consulta'])){
$x = $mysqli ->real_escape_string($_POST['consulta']);	
$sql =  "SELECT tb.bulto AS 'bulto_1', SUM(s.cantidad) AS 'count_bulto'
  		FROM salidas s 
		JOIN tipo_bultos tb ON s.Tipo_Bulto=tb.idBulto
		WHERE s.fecha = '" .$x. "'
		GROUP BY tb.bulto"	;
}

$result = $mysqli->query($sql);
if ($result->num_rows > 0 ){
$exit.= "<table>
			<thead>
				<tr> 
					<td>Nombre bulto</td>
					<td>Cantidad</td>
				</tr> 
			</thead>
 		<tbody>";
		
while($row =$result->fetch_assoc()){
	$exit.="<tr> 
				<td>".$row['bulto_1']. "</td>
				<td>".$row['count_bulto']."</td>
			</tr>";
	
	}$exit.= "<tbody></table>";

}else {
	$exit.= "No se encuentran datos";

}
	echo($exit);
	$mysqli->close();
?>