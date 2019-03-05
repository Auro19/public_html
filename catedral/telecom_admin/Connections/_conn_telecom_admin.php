<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn_telecom_admin = "localhost";
$database_conn_telecom_admin = "telecom_admin";
$username_conn_telecom_admin = "telecom_admin";
$password_conn_telecom_admin = "AYwfSZK4WdcXmHQa";
$conn_telecom_admin = mysql_pconnect($hostname_conn_telecom_admin, $username_conn_telecom_admin, $password_conn_telecom_admin) or trigger_error(mysql_error(),E_USER_ERROR); 
?>