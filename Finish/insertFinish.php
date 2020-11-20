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

      if(in_array("M-000036",$_SESSION['menu']) || in_array("M-000037",$_SESSION['menu'])){

  date_default_timezone_set('Asia/Bangkok');
  include '../database/connect.php';
  $idno = $_POST['id'];
  $date = $_POST['XDMajPickupActualDate'];
  $date1 = $_POST['XDMajFinishDate'];
  $note = $_POST['XVMajFinishRmk'];
  $oldDate = "$date";
  $newD = str_replace('/', '-', $oldDate);
  $newDate =  date('Y-m-d', strtotime($newD));
  $showDate = date('d/m/Y', strtotime($newD));
  //$newtime = date("H:i:s");

  $oldDate1 = "$date1";
  $newD1 = str_replace('/', '-', $oldDate1);
  $newDate1 =  date('Y-m-d', strtotime($newD1));
  $showDate1 = date('d/m/Y', strtotime($newD1));
  //$newtime1 = date("H:i:s");

  $sql2 = "UPDATE tdoctmajob SET XVMajFinishRmk = '$note' WHERE XVMajDocNo = '$idno'";
  $stmt2 = $dbh->query($sql2);
  $sql = "UPDATE tdoctmajobdate  SET XDMajPickupActualDate = '$newDate',
            XDMajFinishDate = '$newDate1' WHERE XVMajDocNo = '$idno'"; //$newtime and $newtime1
  $stmt = $dbh->query($sql);
  $sql1 = "UPDATE tdoctmajob  SET XVMajStatus = 'ปิดงาน' WHERE XVMajDocNo = '$idno'";
  $stmt1 = $dbh->query($sql1);
  if($stmt){
    echo '<script>';
    echo "Swal.fire({
        title: 'สำเร็จ!',
        text: 'ทำการปิดงานเรียบร้อยแล้ว วันที่ ($showDate1)',
        icon: 'success',
        confirmButtonText: 'Back'
      }).then(function() {
        window.location = 'ListFinish.php';
    });";
    echo '</script>';

  }else{
    echo '<script>';
    echo "Swal.fire({
        title: 'เกิดข้อผิดพลาด!',
        text: 'ไม่สามารถทำการปิดงานได้',
        icon: 'error',
        confirmButtonText: 'Back'
      }).then(function() {
        window.location = 'ListFinish.php?id=$idno';
    });";
    echo '</script>';
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
