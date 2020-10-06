<?php
include '../database/connect.php';
if ( isset( $_POST['updatedata'] ) ) {
    $XVMachinePartsTypeCode = $_POST['XVMachinePartsTypeCode'];
    $XVMachinePartsTypeName = $_POST['XVMachinePartsTypeName'];
  $sql = "UPDATE tmstmmachine_parts_type
     SET  XVMachinePartsTypeName ='$XVMachinePartsTypeName'
     WHERE XVMachinePartsTypeCode = $XVMachinePartsTypeCode";
    $result = mysqli_query($connect,$sql);
   if ( $result ) {
        echo '<script>';
        echo "alert('ทำการแก้ไขชื่อประเภทอะไหลเรียบร้อย');";
        echo "window.location='ListTypeMachineParts.php';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('ไม่สามารถทำการแก้ไขประเภทอะไหล่ได้!!!');";
        echo "window.location='ListTypeMachineParts.php';";
        echo '</script>';
    }
}
mysqli_close($connect);
?>
