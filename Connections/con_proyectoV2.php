
<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"


$hostname_con_proyectoV2 = "localhost";
$database_con_proyectoV2 = "proyecto";
$username_con_proyectoV2 = "root";
$password_con_proyectoV2 = "31Ordnajela$";


$con_proyectoV2 = mysql_pconnect($hostname_con_proyectoV2, $username_con_proyectoV2, $password_con_proyectoV2) or trigger_error(mysql_error(),E_USER_ERROR);

#$hostname_con_patentes = "192.168.0.75";
#$database_con_patentes = "auto";
#$username_con_patentes = "postgres";
#$password_con_patentes = "postgres";


#$con_patentes = mysql_pconnect($hostname_con_patentes, $username_con_patentes, $password_con_patentes) or trigger_error(mysql_error(),E_USER_ERROR);



?>

<?php
function Conexion(){ 
  if (!($link=pg_connect("host=192.168.0.75 port=5432 dbname=auto user=postgres password=postgres")))
  {
    echo "Error: could not connect to the server";
    exit(); 
  }
return $link;
}
$con=Conexion();


?>


