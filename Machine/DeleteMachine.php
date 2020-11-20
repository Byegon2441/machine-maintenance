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
//ลบข้อมูลเครื่องจักร

if(!isset($_SESSION)){
    session_start();
}
  
    if($_SESSION['XVPrgCode'] == 'P-03'){

        if(in_array("M-000040",$_SESSION['menu']) ){



    include '../database/connect.php';
    if ( isset( $_POST['deletedata'] ) ) {
    $id = $_POST['delete_id'];
    $sql = "delete FROM tmstvehicle WHERE XVVehCode = $id;";
    $stmt = $dbh->query($sql);
    if ( $sql ) {
        // echo '<script>';
        // echo "alert('ทำการลบเครื่องจักรเรียบร้อยแล้ว !!!');";
        // echo "window.location='ListMachine.php';";
        // echo '</script>';
        echo '<script>';
        echo "Swal.fire({
            title: 'สำเร็จ!',
            text: 'ทำการลบเครื่องจักรเรียบร้อยแล้ว!!!',
            icon: 'success',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListMachine.php';
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
            text: 'ไม่สามารถทำการลบเครื่องจักรได้!',
            icon: 'error',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListMachine.php';
        });";
        echo '</script>';



    }
    $dbh = null;
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