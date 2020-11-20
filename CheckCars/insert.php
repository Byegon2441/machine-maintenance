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
if(!isset($_SESSION)){
  session_start();
}

  if($_SESSION['XVPrgCode'] == 'P-03'){

      if(in_array("M-000043",$_SESSION['menu']) || in_array("M-000044",$_SESSION['menu'])){

 date_default_timezone_set('Asia/Bangkok');
  include '../database/connect.php';
 $statuscar = $_POST['statuscar'];
 $id = $_GET['id'];
 $empar = $_POST['empar'];
 $j = 0;
  for ($i=0; $i < strlen($empar) ; $i++){
   if(is_numeric($empar[$i])){
     if(is_numeric($empar[$i+1])){
       $arr[$j] = $empar[$i];
     }else{
       error_reporting(E_ALL & ~E_NOTICE);
       $arr[$j] .= $empar[$i];
       $j++;
     }
    }
   }
  //var_dump($arr);
 $sqldate = "SELECT XDMajDate,XDMajEstActualDate FROM tdoctmajobdate WHERE XVMajDocNo = '$id'";
 $stmt = $dbh->query($sqldate);
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 if($row['XDMajEstActualDate'] != null){
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
    //$newtime = Date("H:i:s");
   for ($i=0; $i < count($arr); $i++) {
    $sqlarr = "INSERT INTO tdoctmaestimation_tnc(XVEpyCode,XVMajDocNo) VALUES ($arr[$i],'$id')";
    $stmt = $dbh->query($sqlarr);
   }
                                                              //$newtime
   $sqlda =  "UPDATE tdoctmajobdate  SET XDMajEstActualDate = '$newDate' WHERE XVMajDocNo = '$id'";
   $stmtda = $dbh->query($sqlda);
   $sqlda1 =  "UPDATE tdoctmajob  SET XVMaCarStatus = '$statuscar' WHERE XVMajDocNo = '$id'";
   $stmtda1 = $dbh->query($sqlda1);

   if($stmtda && $stmtda1){
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
 $dbh = null;
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
 </body>
 </html>
