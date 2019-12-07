<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_con_proyectoV2 = "localhost";
$database_con_proyectoV2 = "proyecto";
$username_con_proyectoV2 = "root";
$password_con_proyectoV2 = "";
$con_proyectoV2 = mysql_pconnect($hostname_con_proyectoV2, $username_con_proyectoV2, $password_con_proyectoV2) or trigger_error(mysql_error(),E_USER_ERROR); 
?>