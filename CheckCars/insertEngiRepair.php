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

        if(in_array("M-000032",$_SESSION['menu']) || in_array("M-000033",$_SESSION['menu'])){

 date_default_timezone_set('Asia/Bangkok');
  include '../database/connect.php';
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
  // var_dump($arr);
 $sqldate = "SELECT XDMajDate,XDMajRepairActualDate FROM tdoctmajobdate WHERE XVMajDocNo = '$id'";
//  $querydate = mysqli_query($connect,$sqldate)or die("ERROR SELECT DATE");
$querydate = $dbh->query($sqldate);
$rowdate = $querydate->fetch(PDO::FETCH_ASSOC);
 if($rowdate['XDMajRepairActualDate'] != NULL){
   echo '<script>';
   echo "Swal.fire({
       title: 'เกิดข้อผิดพลาด!',
       text: 'มีการระบุวันที่ซ่อมลงไปแล้ว!!',
       icon: 'error',
       confirmButtonText: 'Back'
     }).then(function() {
       window.location = 'addEngiRepair.php?id=$id';
   });";
   echo '</script>';
 }else{
  if($empar != ""){
    $date = $_POST['datee'];
    $oldDate = "$date";
    $newD = str_replace('/', '-', $oldDate);
    $newDate =  date('Y-m-d', strtotime($newD));
  //  $newtime = Date("H:i:s");
   for ($i=0; $i < count($arr); $i++) {
    $sqlarr = "INSERT INTO tdoctmarepair_tnc(XVEpyCode,XVMajDocNo) VALUES ($arr[$i],'$id')";
    $queryarr = $dbh->query($sqlarr);
   }
                                                                 //$newtime
   $sqlda =  "UPDATE tdoctmajobdate  SET XDMajRepairActualDate = '$newDate' WHERE XVMajDocNo = '$id'";
  //  $queryda = mysqli_query( $connect, $sqlda );
   $queryda = $dbh->query($sqlda);

   $sqlda1 =  "UPDATE tdoctmajob  SET 	XVMajStatus = 'ดำเนินการซ่อม' WHERE XVMajDocNo = '$id'";
  //  $queryda1 = mysqli_query( $connect, $sqlda1 );
   $queryda1 = $dbh->query($sqlda1);

   if($queryda1 && $queryda){
     echo '<script>';
     echo "Swal.fire({
         title: 'สำเร็จ!',
         text: 'ทำการระบุ วันซ่อม,ช่าง,และสถานะ เรียบร้อยแล้ว',
         icon: 'success',
         confirmButtonText: 'Back'
       }).then(function() {
         window.location = 'ListEngiRepair.php';
     });";
     echo '</script>';

   }else{
     echo '<script>';
     echo "Swal.fire({
         title: 'เกิดข้อผิดพลาด!',
         text: 'ไม่สามารถทำการระบุวันที่ซ่อม,ช่าง,และสถานะได้',
         icon: 'error',
         confirmButtonText: 'Back'
       }).then(function() {
         window.location = 'ListEngiRepair.php';
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
       window.location = 'addEngiRepair.php?id=$id';
   });";
   echo '</script>';
 }
}
//  mysqli_close( $connect );
$dbh=NULL;
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
