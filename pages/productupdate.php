<?php
include("../connect/cn.php");
$tempid=$_POST['a'];
$tempname=$_POST['b'];
$tempnum=$_POST['c'];
$temptypeid=$_POST['typeid'];
$sql="UPDATE tbproduct set proname='".$tempname."', pronum='".$tempnum."',typeid='".$temptypeid."' where proid='".$tempid."'";
$result = mysqli_query($mysqli_cn, $sql);
echo "<script>window.location='mainproduct.php'</script>";
?>