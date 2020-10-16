<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
<?php
include '../database/connect.php';
if ( isset( $_POST['updatedata'] ) ) {
    $XVDptCode = $_POST['XVDptCode'];
    $XVDptname = $_POST['XVDptname'];
    $XVDptNumber = $_POST['XVDptNumber'];
    $XVDptDistrict = $_POST['XVDptDistrict'];
    $XVDptSub = $_POST['XVDptSub-district'];
    $XVDptProvince = $_POST['XVDptProvince'];

  $sql = "UPDATE tmstmdepartment
     SET  XVDptname ='$XVDptname',
     XVDptNumber ='$XVDptNumber',
     XVDptProvince ='$XVDptProvince',
     XVDptDistrict ='$XVDptDistrict',
     `XVDptSub-district` ='$XVDptSub'
     WHERE XVDptCode = $XVDptCode;
     ";
    $result = mysqli_query($connect,$sql);
   if ( $result ) {
        echo '<script>';
        // echo "alert('ทำการแก้ไขข้อมูลไซต์งานได้');";
        // echo "window.location='ListDepartment.php';";
        echo "Swal.fire({
            title: 'สำเร็จ!',
            text: 'ทำการแก้ไขข้อมูลไซต์งานได้',
            icon: 'success',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListDepartment.php';
        });";
        echo '</script>';
    } else {
        echo '<script>';
        // echo "alert('ไม่สามารถทำการแก้ไขข้อมูลไซต์งานได้');".mysqli_error($connect);
        // echo "window.location='ListDepartment.php';";
        echo "Swal.fire({
            title: 'เกิดข้อผิดพลาด!',
            text: 'ไม่สามารถทำการแก้ไขข้อมูลไซต์งานได้',
            icon: 'error',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListDepartment.php';
        });";
        echo '</script>';
    }
}
mysqli_close($connect);
?>

</body>
</html>
