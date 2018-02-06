<?php
$server_name = "localhost";
$user_name = "root";
$password = "olegzabara1991thierryhenry14";
$database_name = "cms";
$connect_data = compact('server_name', 'user_name', 'password', 'database_name');
//$connect_data[] = compact('server_name', 'user_name', 'password', 'database_name'); <- mistake!
foreach($connect_data as $key=>$value){
    define(strtoupper($key), $value);
}
if(!$connect = mysqli_connect(SERVER_NAME, USER_NAME, PASSWORD, DATABASE_NAME)) {
    echo "connection failed. info:". mysqli_get_host_info($connect);
}
?>