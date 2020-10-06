<?php
include '../database/connect.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$number = $_POST['number'];
$role = $_POST['role'];

$query = "INSERT INTO tmstmtemployee(XVEpyFirstname,XVpyLastname,XVIdCardNumber,XVEpyJobPosition) VALUES ('$fname','$lname','$number','$role');";
$sql = mysqli_query( $connect, $query );

if($sql){
    echo '<script>';
    echo "alert('ทำการเพิ่มพนักงาน !!!');";
    echo "window.location='ListEmployee.php';";
    echo '</script>';
}else{
    echo '<script>';
    echo "alert('ทำการเพิ่มพนักงานไม่สำเร็จ !!!');".mysqli_error($connect);
    echo "window.location='ListEmployee.php';";
    echo '</script>';
}

mysqli_close( $connect );

?>