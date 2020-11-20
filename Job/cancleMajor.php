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
//ยกเลิใบแจ้งซ่อม
if(!isset($_SESSION)){
    session_start();
}
  
    if($_SESSION['XVPrgCode'] == 'P-03'){

        if(in_array("M-000021",$_SESSION['menu']) || in_array("M-000018",$_SESSION['menu'])){

    include '../database/connect.php';
    if ( isset( $_POST['cancle'] ) ) {
    $id = $_POST['cancle_id'];
    $sql = "UPDATE tdoctmajob
             SET XVMajDocStatus = '3',
                 XVMajStatus = 'ยกเลิกใบแจ้งซ่อม'
             WHERE XVMajDocNo ='$id'";
    $stmt = $dbh->query($sql);
    $dbh = null;
    if ( $stmt ) {
        // echo '<script>';
        // echo "alert('ทำการลบเครื่องจักรเรียบร้อยแล้ว !!!');";
        // echo "window.location='ListMachine.php';";
        // echo '</script>';
        echo '<script>';
        echo "Swal.fire({
            title: 'สำเร็จ!',
            text: 'ทำการยกเลิกใบแจ้งซ่อมเรียบร้อยแล้ว!!!',
            icon: 'success',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListJob.php';
        });";
        echo '</script>';

    } else {
        // echo '<script>';
        // echo "alert('ไม่สามารถทำการลบเครื่องจักรได้ !!!');";
        //  echo "window.location='ListMachine.php';";
        // echo '</script>';

        echo '<script>';
        echo "Swal.fire({
            title: 'เกิดข้อผิดพลาด!',
            text: 'ไม่สามารถทำการยกเลิกใบแจ้งซ่อมได้!',
            icon: 'error',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListJob.php';
        });";
        echo '</script>';



    }
}

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
