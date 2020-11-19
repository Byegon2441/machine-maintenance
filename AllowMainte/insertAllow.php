<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
<?php   include '../database/connect.php';
if(isset($_POST['save'])){
    $id = $_POST['id'];

 $date = $_POST['XDMajConfirmDate'];
 $oldDate = "$date";
 $newD = str_replace('/', '-', $oldDate);
 $newDate =  date('Y-m-d', strtotime($newD));
 $showDate = date('d/m/Y', strtotime($newD));
   
 $sql = "UPDATE tdoctmajobdate  SET XDMajConfirmDate = '$newDate' WHERE XVMajDocNo = '$id'";
        if($dbh->query($sql)){

            $sql2 = "UPDATE TDocTMaJob
            SET XVMajStatus = 'รออะไหล่'
            WHERE XVMajDocNo = '$id'";
             if($dbh->query($sql2)){
              
                if(isset($_POST['check'])){
             foreach ($_POST['check'] as $key => $value) {
                    $sql3 = "UPDATE TDocTMaJobDetail
                    SET XVMajConfirm = '$value'
                    WHERE XVMajDocNo = '$id'
                    AND XIMajdSeqNo= '$key'";
                   $dbh->query($sql3);
                }
            }else{
                $sql4 = "UPDATE TDocTMaJob
            SET XVMajStatus = 'ดำเนินการซ่อม'
            WHERE XVMajDocNo = '$id'";
            $dbh->query($sql4);
            }
                    echo '<script>';
                    echo "Swal.fire({
                        title: 'สำเร็จ!',
                        text: 'บันทึกการอนุมัติซ่อมเรียบร้อยแล้ว',
                        icon: 'success',
                        confirmButtonText: 'Back'
                        }).then(function() {
                        window.location = 'ListAllowMainte.php';
                    });";
                    echo '</script>';
                
            }
       }


}



?>
</body>

</html>