<?php
include("../connect/cn.php");
$tempname=$_POST['productname'];
$tempnum=$_POST['productnum'];
$temptypeid=$_POST['typeid'];
$sql="INSERT INTO tbproduct(proname,pronum,typeid) values('".$tempname."','".$tempnum."','".$temptypeid."')";
$result = mysqli_query($mysqli_cn, $sql);
echo "<script>window.location='mainproduct.php'</script>";
?>