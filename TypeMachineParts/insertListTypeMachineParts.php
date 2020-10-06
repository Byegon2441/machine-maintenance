<?php
include '../database/connect.php';
	$XVMachinePartsTypeName = $_POST['XVMachinePartsTypeName'];
  $sql  = "INSERT INTO tmstmmachine_parts_type(XVMachinePartsTypeName) VALUES ('$XVMachinePartsTypeName')";
  $query = mysqli_query( $connect, $sql );
if($query){
    echo '<script>';
    echo "alert('ทำการเพิ่มประเภทอะไหล่เรียบร้อยแล้ว !!!');";
    echo "window.location='ListTypeMachineParts.php';";
    echo '</script>';
  }else{
    echo '<script>';
    echo "alert('ไม่สามารถทำการเพิ่มประเภทอะไหล่ได้  !!!');";
    echo "window.location='ListTypeMachineParts.php';";
    echo '</script>';
  }
mysqli_close($connect);
 ?>
