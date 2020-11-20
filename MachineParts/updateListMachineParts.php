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

    
if(!isset($_SESSION)){
    session_start();
}
  
    if($_SESSION['XVPrgCode'] == 'P-03'){

        if(in_array("M-000040",$_SESSION['menu']) ){

include '../database/connect.php';
if ( isset( $_POST['updatedata'] ) ) {
    $XVMachinePartsCode = $_POST['XVMachinePartsCode'];
    $XVMachinePartsName = $_POST['XVMachinePartsName'];
    $idcode = $_POST['idcode'];
  $sql = "UPDATE tmstmmachine_parts
     SET  XVMachinePartsName ='$XVMachinePartsName',
     XVMachinePartsTypeCode ='$idcode'
     WHERE XVMachinePartsCode = $XVMachinePartsCode";
    $stmt = $dbh->query($sql);
   if ( $stmt ) {
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
$dbh = null;


}else{//if check menu
    echo '<script>';
echo "Swal.fire({
    title: 'แจ้งเตือน',
    text: 'คุณไม่มีสิทธ์เข้าถึงเมนูนี้',
    icon: 'warning',
    confirmButtonText: 'Back'
    }).then(function() {
        window.history.back();
});";
echo '</script>';
}

}else{
//if check program
echo '<script>';
echo "Swal.fire({
title: 'คุณยังไม่ได้ลงชื่อเข้าใช้!',
text: 'กรุณาลงชื่อเข้าใช้',
icon: 'warning',
confirmButtonText: 'Back'
}).then(function() {
window.location = '../Login/login.php';
});";
echo '</script>';
}
?>
</body>

</html>