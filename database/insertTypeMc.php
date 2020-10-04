<?php
include 'connect.php';
$name = $_POST['name'];

$check = "SELECT XVVehTypeName FROM tmstmvehicletype WHERE XVVehTypeName = '$name';";
$result = mysqli_query( $connect, $check );
$num=mysqli_num_rows($result);

if($num > 0){
    echo '<script>';
    echo "alert('รายชื่อนี้มีการลงทะเบียนไปแล้ว !!!');";
    echo "window.location='../pages/ListTypeMachine.php';";
    echo '</script>';
}else{
    $query = "INSERT INTO tmstmvehicletype(XVVehTypeName) VALUES ('".$name."');";
    $sql = mysqli_query( $connect, $query );
    mysqli_close( $connect );
    echo '<script>';
    echo "alert('ทำการเพิ่มประเภทเครื่องจักรเรียบร้อยแล้ว !!!');";
    echo "window.location='../pages/ListTypeMachine.php';";
    echo '</script>';
}

?>