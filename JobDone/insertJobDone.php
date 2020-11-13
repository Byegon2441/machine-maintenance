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
  $idno = $_POST['id'];
  $date = $_POST['XDMaPickupAppPlanDate'];
  $oldDate = "$date";
  $newD = str_replace('/', '-', $oldDate);
  $newDate =  date('Y-m-d', strtotime($newD));
  $showDate = date('d/m/Y', strtotime($newD));
  //$newtime = date("H:i:s");


  $date1 = $_POST['XDMajFinishRepairDate'];
  $oldDate1 = "$date1";
  $newD1 = str_replace('/', '-', $oldDate1);
  $newDate1 =  date('Y-m-d', strtotime($newD1));
  $showDate1 = date('d/m/Y', strtotime($newD1));
  //$newtime1 = date("H:i:s");



  $query = "UPDATE tdoctmajobdate  SET XDMaPickupAppPlanDate = '$newDate'
            , XDMajFinishRepairDate = '$newDate1'  WHERE XVMajDocNo = '$idno'"; //$newtime and $newtime1
 $stmt = $dbh->query($query);
  $query1 = "UPDATE tdoctmajob  SET XVMajStatus = 'ซ่อมเสร็จ' WHERE XVMajDocNo = '$idno'";
  $stmt1 = $dbh->query($query1);
  if($stmt1){
    echo '<script>';
    echo "Swal.fire({
        title: 'สำเร็จ!',
        text: 'ทำการนัดวันรับรถเรียบร้อยแล้ว วันที่ ($showDate)',
        icon: 'success',
        confirmButtonText: 'Back'
      }).then(function() {
        window.location = 'ListDone.php';
    });";
    echo '</script>';

  }else{
    echo '<script>';
    echo "Swal.fire({
        title: 'เกิดข้อผิดพลาด!',
        text: 'ไม่สามารถทำการนัดวันรับรถได้',
        icon: 'error',
        confirmButtonText: 'Back'
      }).then(function() {
        window.location = 'ListDone.php?id=$idno';
    });";
    echo '</script>';
  }
  $dbh = null;

  ?>
  </body>
  </html>
