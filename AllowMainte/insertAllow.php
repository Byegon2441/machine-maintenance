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
<?php   include '../database/connect.php';
if(isset($_POST['save'])){
    $id = $_POST['id'];

 $date = $_POST['XDMajConfirmDate'];
 $oldDate = "$date";
 $newD = str_replace('/', '-', $oldDate);
 $newDate =  date('Y-m-d', strtotime($newD));
 $showDate = date('d/m/Y', strtotime($newD));
//  $newtime = date("h:i:sa");  
   
 $sql = "UPDATE tdoctmajobdate  SET XDMajConfirmDate = '$newDate' WHERE XVMajDocNo = '$id'";
        // $stmt0 = $dbh->query($sql);
        if($dbh->query($sql)){
        // if(mysqli_query( $connect, $sql )){

            $sql2 = "UPDATE TDocTMaJob
            SET XVMajStatus = 'รออะไหล่'
            WHERE XVMajDocNo = '$id'";
          
            
            //  $stmt = $dbh->query($sql2);
             if($dbh->query($sql2)){
            //  if(mysqli_query( $connect, $sql2 )){
              
              if(  isset($_POST['check'])  ){

             foreach ($_POST['check'] as $key => $value) {
                
            
                
                   
                    
                    $sql3 = "UPDATE TDocTMaJobDetail
                    SET XVMajConfirm = '$value'
                    WHERE XVMajDocNo = '$id'
                    AND XIMajdSeqNo= '$key'";
                //    mysqli_query( $connect, $sql3); 
                   $dbh->query($sql3);
                }
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