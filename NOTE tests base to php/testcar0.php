<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>testbasecar</title>
  </head>
  <body>
<?php
$conn = mysqli_connect("localhost","root","","cars") or die ("Error connect");// local = server
 ?>
<form class="" action="testcar0.php" method="get">
<input type="text" name="XVMachinePartsTypeName">
<input type="submit" name="submit">
 </form>
 <?php
$type = $_GET["XVMachinePartsTypeName"];
$insertsql = "INSERT INTO tmstmmachine_parts_type(XVMachinePartsTypeName) VALUES ()"
  ?>

  </body>
</html>
