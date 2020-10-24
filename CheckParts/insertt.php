<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<?php 
// Turn off all error reporting
error_reporting(0);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Report all PHP errors
error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
?>
    <title>ระบบซ่อมบำรุงเครื่องจักร : แก้ไขใบแจ้งซ่อม</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
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
    $query = mysqli_query( $connect, $sql );
    $nvals = count($_REQUEST['n_sub']);
    $query2 = false;
    if($query){
        $nvals = count($_REQUEST['n_sub']);
        for ( $i = 0; $i < $nvals; $i++ ) {
            $n_sub = $_REQUEST['n_sub'][$i];
            $sub = $_REQUEST['sub'][$i];
            $sql2 = "INSERT INTO TDocTMaMachine_parts_use(XVMajDocNo,XIMajdSeqNo,XVMachinePartsCode,XVAmount) VALUES ('$XVMajDocNo', '$seqqq', '$n_sub', '$sub')";
            $query2 = mysqli_query( $connect, $sql2 );
            echo $n_sub;
        }
        if ( $query2 ) {
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
            echo mysqli_error( $connect );
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