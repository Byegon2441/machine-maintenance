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
        echo "alert('ทำการแก้ไขข้อมูลอะไหล่เรียบร้อย');";
        echo "window.location='ListMachineParts.php';";
        echo '</script>';
    } else {

        $error_detail = mysqli_error($connect);
        if(strpos($error_detail, "XVMachinePartsName_UQ")){
            echo '<script>';
            echo "alert('ไม่สามารถทำการแก้ไขข้อมูอะไหล่ได้ ".'\n'."อะไหล่ ($XVMachinePartsName) มีการลงทะเบียนแล้ว');";
            echo "window.location='ListMachineParts.php';";
            echo '</script>';
        }


     
    }
}
mysqli_close($connect);
?>
