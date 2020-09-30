<?php
$host ='localhost';
$user ='root';
$pass="";
$database="cars";
$connect = mysqli_connect($host,$user,$pass,$database);
mysqli_set_charset($connect,"utf8");

if(!$connect){
    die ("Connect Fail : ".mysqli_connect_error());
} 

?>