<?php
include("../connect/cn.php");
$tempname=$_POST['typename'];
$sql="INSERT INTO tbdatatype (typename) values('".$tempname."')";
$result = mysqli_query($mysqli_cn, $sql);
echo "<script>window.location='maintype.php'</script>";
?>