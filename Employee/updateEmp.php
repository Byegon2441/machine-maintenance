<?php
include '../database/connect.php';
if ( isset( $_POST['updatedata'] ) ) {
    $XVEpyCode = $_POST['XVEpyCode'];
    $XVEpyFirstname = $_POST['XVEpyFirstname'];
    $XVpyLastname = $_POST['XVpyLastname'];
    $XVIdCardNumber = $_POST['XVIdCardNumber'];
    $XVEpyJobPosition = $_POST['XVEpyJobPosition'];

  $sql = "UPDATE tmstmtemployee
     SET  XVEpyFirstname ='$XVEpyFirstname',
     XVpyLastname ='$XVpyLastname',
     XVIdCardNumber ='$XVIdCardNumber',
     XVEpyJobPosition ='$XVEpyJobPosition'
     WHERE XVEpyCode = $XVEpyCode;
     ";
    $result = mysqli_query($connect,$sql);
   if ( $result ) {
        echo '<script>';
        echo "alert('ทำการแก้ไขข้อมูลพนักงานได้');";
        echo "window.location='ListEmployee.php';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('ไม่สามารถทำการแก้ไขข้อมูลพนักงานได้');".mysqli_error($connect);
        echo "window.location='ListEmployee.php';";
        echo '</script>';
    }
}
mysqli_close($connect);
?>