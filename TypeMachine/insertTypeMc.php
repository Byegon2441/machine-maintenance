<?php
include '../database/connect.php';
$name = $_POST['name'];

$check = "SELECT XVVehTypeName FROM tmstmvehicletype WHERE XVVehTypeName = '$name';";
$result = mysqli_query( $connect, $check );
$num=mysqli_num_rows($result);

if($num > 0){
    echo '<script>';
    echo "alert('ไม่สามารถทำการเพิ่มข้อมูลประเภทเครื่องจักรได้ ".'\n'."ประเภทเครื่องจักร ($name) มีการลงทะเบียนแล้ว');";
    echo "window.location='ListTypeMachine.php';";
    echo '</script>';
}else{
    $query = "INSERT INTO tmstmvehicletype(XVVehTypeName) VALUES ('".$name."');";
    $sql = mysqli_query( $connect, $query );
  
    echo '<script>';
    echo "alert('ทำการเพิ่มข้อมูลประเภทเครื่องจักรเรียบร้อยแล้ว');";
    echo "window.location='ListTypeMachine.php';";
    echo '</script>';
}
mysqli_close( $connect );

?>