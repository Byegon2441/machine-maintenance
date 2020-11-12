<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<?php 
?>
    <title>ระบบซ่อมบำรุงเครื่องจักร : แก้ไขใบแจ้งซ่อม</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

<body>
<?php
include '../database/connect.php';
    $XVMajDocNo = $_POST['docno'];
    $seqqq = $_POST['seqq'];
    $sql = "DELETE FROM TDocTMaMachine_parts_use WHERE XVMajDocNo = '$XVMajDocNo' AND XIMajdSeqNo = $seqqq";
    $stmt = $dbh->query($sql);
    $nvals = count($_REQUEST['n_sub']);
    $stmt2 = false;
    if($stmt){
        $nvals = count($_REQUEST['n_sub']);
        for ( $i = 0; $i < $nvals; $i++ ) {
            $n_sub = $_REQUEST['n_sub'][$i];
            $sub = $_REQUEST['sub'][$i];
            $sql2 = "INSERT INTO TDocTMaMachine_parts_use(XVMajDocNo,XIMajdSeqNo,XVMachinePartsCode,XVAmount) VALUES ('$XVMajDocNo', '$seqqq', '$n_sub', '$sub')";
            $stmt2 = $dbh->query($sql2);
            echo $n_sub;
        }
        if ( $stmt2 ) {
            echo '<script>';
            echo "Swal.fire({
                title: 'สำเร็จ!',
                text: 'ทำการเพิ่มอะไหล่เรียบร้อยแล้ว',
                icon: 'success',
                confirmButtonText: 'Back'
                }).then(function() {
                window.location = 'addParts.php?id=$XVMajDocNo';
            });";
            echo '</script>';
        } else {
            //echo mysqli_error( $connect );
            echo '<script>';
            echo "Swal.fire({
                title: 'เกิดข้อผิดพลาด!',
                text: 'กรุณาเพิ่มอะไหล่ที่ต้องการ',
                icon: 'warning',
                confirmButtonText: 'Back'
                }).then(function() {
                window.location = 'addParts.php?id=$XVMajDocNo';
            });";
            echo '</script>';
        }
        
    }else{
        // echo mysqli_error( $connect );
        echo '<script>';
        echo "Swal.fire({
            title: 'เกิดข้อผิดพลาด!',
            text: 'ไม่สามารถเพิ่มข้อมูลได้',
            icon: 'error',
            confirmButtonText: 'Back'
            }).then(function() {
            window.location = 'addParts.php?id=$XVMajDocNo';
        });";
        echo '</script>';
    }

   

?>
</body>

</html>