<?php
include '../database/connect.php';
error_reporting( error_reporting() & ~E_NOTICE );
$XVVehName = $_POST["XVVehName"];
$XVVehRegistration = $_POST["XVVehRegistration"];
$XVVehNumber = $_POST["XVVehNumber"];
$XVVehMango = $_POST["XVVehMango"];
$XVVehBrand = $_POST["XVVehBrand"];
$XVVehModel = $_POST["XVVehModel"];
$XVVehChassisNumber = $_POST["XVVehChassisNumber"];
$XVVehEngineNumber = $_POST["XVVehEngineNumber"];
$XVVehTypeCode = $_POST["XVVehTypeCode"];
$sql = "INSERT INTO TMstVehicle VALUES (NULL,'".$XVVehName."','".$XVVehRegistration."','".$XVVehNumber."','".$XVVehMango."','".$XVVehBrand."','".$XVVehModel."','".$XVVehChassisNumber."','".$XVVehEngineNumber."',$XVVehTypeCode)";
$result = mysqli_query($connect,$sql);
if($result){
  echo '<script>';
  echo "alert('การส่งข้อมูลสำเร็จ !!!');";
  echo "window.location='../pages/ListMachine.php';";
  echo '</script>';
}else{
  echo '<script>';
  echo "alert('ผิดพลาด !!!');";
  echo "window.location='../pages/EditMachine.php';";
  echo '</script>';
}
mysqli_close($connect);
 ?>
