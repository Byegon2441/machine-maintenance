<?php
include("../connect/cn.php");
$tempid=$_POST['typeid'];
$tempname=$_POST['typename'];
$sql="UPDATE tbdatatype set typename='".$tempname."' where typeid='".$tempid."'";
$result = mysqli_query($mysqli_cn, $sql);
echo "<script>window.location='maintype.php'</script>";
?>