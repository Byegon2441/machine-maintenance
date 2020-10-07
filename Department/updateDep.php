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
        echo "alert('ทำการแก้ไขข้อมูลไซต์งานได้');";
        echo "window.location='ListDepartment.php';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('ไม่สามารถทำการแก้ไขข้อมูลไซต์งานได้');".mysqli_error($connect);
        echo "window.location='ListDepartment.php';";
        echo '</script>';
    }
}
mysqli_close($connect);
?>
