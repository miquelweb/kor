<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_kor = "localhost";
$database_kor = "kor";
$username_kor = "root";
$password_kor = "root";
$kor = mysql_pconnect($hostname_kort, $username_kor, $password_kor) or trigger_error(mysql_error(),E_USER_ERROR); 
?>