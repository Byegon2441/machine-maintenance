<?php
include '../database/connect.php';
$depname = $_POST['depname'];
$depnumber = $_POST['depnumber'];
$depdistrict = $_POST['depdistrict'];
$depsub = $_POST['depsub'];
$depprovince = $_POST['depprovince'];

$query = "INSERT INTO tmstmdepartment(`XVDptNumber`, `XVDptSub-district`, `XVDptDistrict`, `XVDptProvince`, `XVDptname`) 
VALUES ('$depnumber','$depsub','$depdistrict','$depprovince','$depname')";
$sql = mysqli_query( $connect, $query );

if($sql){
    echo '<script>';
    echo "alert('ทำการเพิ่มไชต์งานได้ !!!');";
    echo "window.location='../Department/ListDepartment.php';";
    echo '</script>';
}else{
    echo '<script>';
    echo "alert('ไม่สามารถทำการเพิ่มไชต์งานได้ !!!');";
    echo "window.location='../Department/ListDepartment.php';";
    echo '</script>';
}

mysqli_close( $connect );

?>