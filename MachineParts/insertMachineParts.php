<?php
include '../database/connect.php';
	$XVMachinePartsName = $_POST['XVMachinePartsName'];
  $XVMachinePartsTypeCode = $_POST['XVMachinePartsTypeCode'];
  $sql  = "INSERT INTO tmstmmachine_parts(XVMachinePartsName,XVMachinePartsTypeCode) VALUES ('$XVMachinePartsName','$XVMachinePartsTypeCode')";
  $query = mysqli_query( $connect, $sql );
if($query){
    echo '<script>';
    echo "alert('ทำการเพิ่มอะไหล่เรียบร้อยแล้ว !!!');";
    echo "window.location='ListMachineParts.php';";
    echo '</script>';
  }else{
    echo '<script>';
    echo "alert('ไม่สามารถทำการเพิ่มอะไหล่ได้  !!!');";
    echo "window.location='ListMachineParts.php';";
    echo '</script>';
  }
mysqli_close($connect);
 ?>
