<?php
include '../database/connect.php';
if ( isset( $_POST['updatedata'] ) ) {
    $XVMachinePartsCode = $_POST['XVMachinePartsCode'];
    $XVMachinePartsName = $_POST['XVMachinePartsName'];
    $idcode = $_POST['idcode'];
  $sql = "UPDATE tmstmmachine_parts
     SET  XVMachinePartsName ='$XVMachinePartsName',
     XVMachinePartsTypeCode ='$idcode'
     WHERE XVMachinePartsCode = $XVMachinePartsCode";
    $result = mysqli_query($connect,$sql);
   if ( $result ) {
        echo '<script>';
        echo "alert('ทำการแก้ไขชื่อรายการอะไหล่เรียบร้อย');";
        echo "window.location='ListMachineParts.php';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('ไม่สามารถทำการแก้ไขรายการอะไหล่ได้!!!');";
        echo "window.location='ListMachineParts.php';";
        echo '</script>';
    }
}
mysqli_close($connect);
?>
