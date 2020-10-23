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
 $id = $_POST['id_Data'];
 $date = $_POST['numDate'];
 $oldDate = "$date";
 $newD = str_replace('/', '-', $oldDate);
 $newDate =  date('Y-m-d', strtotime($newD));
 $showDate = date('d/m/Y', strtotime($newD));
 $query = "UPDATE tdoctmajobdate  SET XDMajEstAppPlanDate = '$newDate' WHERE XVMajDocNo = '$id'";
 $sql = mysqli_query( $connect, $query );
 $query1 = "UPDATE tdoctmajob  SET XVMaCarStatus = 'รอนำรถประเมินอะไหล่' WHERE XVMajDocNo = '$id'";
 $sql1 = mysqli_query( $connect, $query1 );
 if($sql){
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
 mysqli_close( $connect );

 ?>
 </body>
 </html>
