<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title></title>
</head>

<body>
    <?php
include '../database/connect.php';
	$XVMachinePartsName = $_POST['XVMachinePartsName'];
  $XVMachinePartsTypeCode = $_POST['XVMachinePartsTypeCode'];

  $sql = "SELECT XVMachinePartsName FROM tmstmmachine_parts WHERE XVMachinePartsName = '$XVMachinePartsName';";
  $stmt = $dbh->query($sql);
  $stmt->fetchAll();
  $cnt = $stmt->rowCount();

  if($cnt>0){
    echo '<script>';
    // echo "alert('ไม่สามารถทำการเพิ่มข้อมูลอะไหล่ได้ ".'\n'."อะไหล่ ($XVMachinePartsName) มีการลงทะเบียนแล้ว');";
    // echo "window.location='ListMachineParts.php';";
    echo "Swal.fire({
      title: 'เกิดข้อผิดพลาด!',
      text: 'ไม่สามารถทำการเพิ่มข้อมูลอะไหล่ได้ ".'\n'."อะไหล่ ($XVMachinePartsName) มีการลงทะเบียนแล้ว',
      icon: 'error',
      confirmButtonText: 'Back'
    }).then(function() {
      window.location = 'ListMachineParts.php';
  });";
    echo '</script>';
  }else{
    $sql1  = "INSERT INTO tmstmmachine_parts(XVMachinePartsName,XVMachinePartsTypeCode) VALUES ('$XVMachinePartsName','$XVMachinePartsTypeCode')";
    $stmt = $dbh->query($sql1);
  
      echo '<script>';
      // echo "alert('ทำการเพิ่มข้อมูลอะไหล่เรียบร้อย');";
      // echo "window.location='ListMachineParts.php';";
      echo "Swal.fire({
        title: 'สำเร็จ!',
        text: 'ทำการเพิ่มข้อมูลอะไหล่เรียบร้อย',
        icon: 'success',
        confirmButtonText: 'Back'
      }).then(function() {
        window.location = 'ListMachineParts.php';
    });";
      echo '</script>';
  }
$dbh = null;
 ?>
</body>

</html>