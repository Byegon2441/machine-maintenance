<?php
$host ='localhost';
$user ='root';
$pass="";
$database="cars";
$connect = mysqli_connect("localhost","root","","cars");
mysqli_query($connect,"SET NAMES UTF8");

if(!$connect){
    die ("Connect Fail : ".mysqli_connect_error());
} 

?>