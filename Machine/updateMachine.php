<?php
include '../database/connect.php';
if ( isset( $_POST['updatedata'] ) ) {
    $id = $_POST['XVVehCode'];
    $XVVehName = $_POST['XVVehName'];
    $XVVehRegistration = $_POST['XVVehRegistration'];
    $XVVehNumber = $_POST['XVVehNumber'];
    $XVVehMango = $_POST['XVVehMango'];
    $XVVehBrand = $_POST['XVVehBrand'];
    $XVVehModel = $_POST['XVVehModel'];
    $XVVehChassisNumber = $_POST['XVVehChassisNumber'];
    $XVVehEngineNumber = $_POST['XVVehEngineNumber'];
    $XVVehTypeCode = $_POST['XVVehTypeName'];
  $sql = "UPDATE tmstvehicle
     SET  XVVehName ='$XVVehName',
     XVVehRegistration ='$XVVehRegistration',
     XVVehNumber ='$XVVehNumber',
     XVVehMango ='$XVVehMango',
     XVVehBrand ='$XVVehBrand',
     XVVehModel ='$XVVehModel',
     XVVehChassisNumber ='$XVVehChassisNumber',
     XVVehEngineNumber ='$XVVehEngineNumber',
     XVVehTypeCode ='$XVVehTypeCode'
     WHERE XVVehCode = $id;
     ";
    $result = mysqli_query($connect,$sql);
   if ( $result ) {
        echo '<script>';
        echo "alert('ทำการแก้ไขชื่อเครื่องจักรเรียบร้อย');";
        echo "window.location='ListMachine.php';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('ไม่สามารถทำการแก้ไขชื่อเครื่องจักรได้!!!');";
        echo "window.location='ListMachine.php';";
        echo '</script>';
    }
}
mysqli_close($connect);
?>
