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
date_default_timezone_set('Asia/Bangkok');
 include '../database/connect.php';
//  $id = $_POST['id_Data'];
 $id = $_POST['noum'];
 $date = $_POST['numDate'];
 $oldDate = "$date";
 $newD = str_replace('/', '-', $oldDate);
 $newDate =  date('Y-m-d', strtotime($newD));
 $showDate = date('d/m/Y', strtotime($newD));
 $query = "UPDATE tdoctmajobdate  SET XDMajEstAppPlanDate = '$newDate' WHERE XVMajDocNo = '$id'";
 $stmt = $dbh->query($query);
 $query1 = "UPDATE tdoctmajob  SET XVMajStatus = 'รอนำรถประเมินอะไหล่' WHERE XVMajDocNo = '$id'";
 $stmt1 = $dbh->query($query1);
 if($stmt1){
   echo '<script>';
   echo "Swal.fire({
       title: 'สำเร็จ!',
       text: 'ทำการนัดวันประเมินเรียบร้อยแล้ว วันที่ ($showDate)',
       icon: 'success',
       confirmButtonText: 'Back'
     }).then(function() {
       window.location = 'ListCheck.php';
   });";
   echo '</script>';

 }else{
   echo '<script>';
   echo "Swal.fire({
       title: 'เกิดข้อผิดพลาด!',
       text: 'ไม่สามารถทำการนัดวันได้',
       icon: 'error',
       confirmButtonText: 'Back'
     }).then(function() {
       window.location = 'ListCheck.php';
   });";
   echo '</script>';
 }
$dbh=NULL;
 ?>
 </body>
 </html>
