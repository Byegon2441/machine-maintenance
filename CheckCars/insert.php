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
 $statuscar = $_POST['statuscar'];
 $id = $_GET['id'];
 $empar = $_POST['empar'];
 $arr = explode(" ",$empar);
 $sqldate = "SELECT XDMajDate,XDMajEstActualDate FROM tdoctmajobdate WHERE XVMajDocNo = '$id'";
 $querydate = mysqli_query($connect,$sqldate)or die("ERROR SELECT DATE");
 $rowdate = mysqli_fetch_array($querydate);
 if($rowdate['XDMajEstActualDate'] != "0000-00-00 00:00:00"){
   echo '<script>';
   echo "Swal.fire({
       title: 'เกิดข้อผิดพลาด!',
       text: 'มีการระบุวันที่ประเมินลงไปแล้ว!!',
       icon: 'error',
       confirmButtonText: 'Back'
     }).then(function() {
       window.location = 'addEngiCheck.php?id=$id';
   });";
   echo '</script>';
 }else{
  if($empar != ""){
    $date = $_POST['datee'];
    $oldDate = "$date";
    $newD = str_replace('/', '-', $oldDate);
    $newDate =  date('Y-m-d', strtotime($newD));
    $newtime = date("h:i:sa");
   for ($i=0; $i < count($arr)-1; $i++) {
    $sqlarr = "INSERT INTO tdoctmaestimation_tnc(XVEpyCode,XVMajDocNo) VALUES ('$arr[$i]','$id')";
    $queryarr = mysqli_query($connect,$sqlarr)or die("ERROR INSERT");
   }
   $sqlda =  "UPDATE tdoctmajobdate  SET XDMajEstActualDate = '$newDate $newtime' WHERE XVMajDocNo = '$id'";
   $queryda = mysqli_query( $connect, $sqlda );
   $sqlda1 =  "UPDATE tdoctmajob  SET XVMaCarStatus = '$statuscar' WHERE XVMajDocNo = '$id'";
   $queryda1 = mysqli_query( $connect, $sqlda1 );
   if($queryda1 && $queryda){
     echo '<script>';
     echo "Swal.fire({
         title: 'สำเร็จ!',
         text: 'ทำการระบุ วันประเมิน,ช่าง,และสถานะ เรียบร้อยแล้ว',
         icon: 'success',
         confirmButtonText: 'Back'
       }).then(function() {
         window.location = 'ListCheckDataEngi.php';
     });";
     echo '</script>';

   }else{
     echo '<script>';
     echo "Swal.fire({
         title: 'เกิดข้อผิดพลาด!',
         text: 'ไม่สามารถทำการระบุวันประเมิน,ช่าง,และสถานะได้',
         icon: 'error',
         confirmButtonText: 'Back'
       }).then(function() {
         window.location = 'ListCheckDataEngi.php';
     });";
     echo '</script>';
   }
 }else{
   echo '<script>';
   echo "Swal.fire({
       title: 'เกิดข้อผิดพลาด!',
       text: 'ไม่ได้ระบุช่างประเมิน',
       icon: 'error',
       confirmButtonText: 'Back'
     }).then(function() {
       window.location = 'addEngiCheck.php?id=$id';
   });";
   echo '</script>';
 }
}
 mysqli_close( $connect );

 ?>
 </body>
 </html>
