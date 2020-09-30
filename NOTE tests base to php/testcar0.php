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
<form class="" action="testcar0.php" method="post">
<input type="text" name="type">
<input type="submit" name="submit">
 </form>
 <?php
mysqli_close($conn);
$conn = mysqli_connect("localhost","root","","cars") or die ("Error connect");
$type = $_POST["type"];
$insertsql = "INSERT INTO tmstmmachine_parts_type(XVMachinePartsTypeName) VALUES ($type)";
mysqli_query($conn,$insertsql);
mysqli_close($conn);
  ?>
<table>
  <tbody>
    <tr>รหัสประเภท</tr>
    <tr>ชื่อประเภท</tr>
    <tr>แก้ไข</tr>
    <tr>ลบ</tr>
  </tbody>
</table>

  </body>
</html>
