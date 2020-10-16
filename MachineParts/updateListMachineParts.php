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
if ( isset( $_POST['updatedata'] ) ) {
    $XVMachinePartsCode = $_POST['XVMachinePartsCode'];
    $XVMachinePartsName = $_POST['XVMachinePartsName'];
    $idcode = $_POST['idcode'];
  $sql = "UPDATE tmstmmachine_parts
     SET  XVMachinePartsName ='$XVMachinePartsName',
     XVMachinePartsTypeCode ='$idcode'
     WHERE XVMachinePartsCode = $XVMachinePartsCode";
    $result = mysqli_query($connect,$sql);
   if ( $result ) {
        echo '<script>';
        // echo "alert('ทำการแก้ไขข้อมูลอะไหล่เรียบร้อย');";
        // echo "window.location='ListMachineParts.php';";
        echo "Swal.fire({
            title: 'สำเร็จ!',
            text: 'ทำการแก้ไขข้อมูลอะไหล่เรียบร้อย',
            icon: 'success',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListMachineParts.php';
        });";
        echo '</script>';
    } else {

        $error_detail = mysqli_error($connect);
        if(strpos($error_detail, "XVMachinePartsName_UQ")){
            echo '<script>';
            // echo "alert('ไม่สามารถทำการแก้ไขข้อมูอะไหล่ได้ ".'\n'."อะไหล่ ($XVMachinePartsName) มีการลงทะเบียนแล้ว');";
            // echo "window.location='ListMachineParts.php';";
            echo "Swal.fire({
                title: 'เกิดข้อผิดพลาด!',
                text: 'ไม่สามารถทำการแก้ไขข้อมูอะไหล่ได้ ".'\n'."อะไหล่ ($XVMachinePartsName) มีการลงทะเบียนแล้ว',
                icon: 'error',
                confirmButtonText: 'Back'
              }).then(function() {
                window.location = 'ListMachineParts.php';
            });";
            echo '</script>';
        }


     
    }
}
mysqli_close($connect);
?>
</body>
</html>

