<?php
include '../database/connect.php';
	$XVMachinePartsName = $_POST['XVMachinePartsName'];
  $XVMachinePartsTypeCode = $_POST['XVMachinePartsTypeCode'];

  $check = "SELECT XVMachinePartsName FROM tmstmmachine_parts WHERE XVMachinePartsName = '$XVMachinePartsName';";
  $result = mysqli_query( $connect, $check );
  $num=mysqli_num_rows($result);

  if($num>0){
    echo '<script>';
    echo "alert('ไม่สามารถทำการเพิ่มข้อมูลอะไหล่ได้ ".'\n'."อะไหล่ ($XVMachinePartsName) มีการลงทะเบียนแล้ว');";
    echo "window.location='ListMachineParts.php';";
    echo '</script>';
  }else{
    $sql  = "INSERT INTO tmstmmachine_parts(XVMachinePartsName,XVMachinePartsTypeCode) VALUES ('$XVMachinePartsName','$XVMachinePartsTypeCode')";
    $query = mysqli_query( $connect, $sql );
  
      echo '<script>';
      echo "alert('ทำการเพิ่มข้อมูลอะไหล่เรียบร้อย');";
      echo "window.location='ListMachineParts.php';";
      echo '</script>';
  

  }

  
mysqli_close($connect);
 ?>
