<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title></title>
</head>
<body>
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
    // echo "alert('ทำการเพิ่มไชต์งานได้ !!!');";
    // echo "window.location='../Department/ListDepartment.php';";
    echo "Swal.fire({
        title: 'สำเร็จ!',
        text: 'ทำการเพิ่มไชต์งานได้',
        icon: 'success',
        confirmButtonText: 'Back'
      }).then(function() {
        window.location = 'ListDepartment.php';
    });";
    echo '</script>';
}else{
    echo '<script>';
    // echo "alert('ไม่สามารถทำการเพิ่มไชต์งานได้ !!!');";
    // echo "window.location='../Department/ListDepartment.php';";
    echo "Swal.fire({
        title: 'เกิดข้อผิดพลาด!',
        text: 'ไม่สามารถทำการเพิ่มไชต์งานได้',
        icon: 'error',
        confirmButtonText: 'Back'
      }).then(function() {
        window.location = 'ListDepartment.php';
    });";
    echo '</script>';
}

mysqli_close( $connect );

?>
    
</body>
</html>
