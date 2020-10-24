<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
    // $sql = "SELECT * FROM DocTMaMachine_parts_use WHERE XVMajDocNo = $XVMajDocNo AND XIMajdSeqNo = $seqqq";
    // $query = mysqli_query( $connect, $sql );
    // $arry = array();
    // while($r=mysqli_fetch_array($result)){
        //     $arry = $r['XIMachinePartsSeqNo'];
        // }
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
            
        }
        
    }else{
        echo mysqli_error( $connect );

    }

   

?>
</body>

</html>