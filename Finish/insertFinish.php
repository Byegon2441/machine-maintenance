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
  $date = $_POST['XDMajPickupActualDate'];
  $date1 = $_POST['XDMajFinishDate'];

  $oldDate = "$date";
  $newD = str_replace('/', '-', $oldDate);
  $newDate =  date('Y-m-d', strtotime($newD));
  $showDate = date('d/m/Y', strtotime($newD));
  $newtime = date("H:i:s");

  $oldDate1 = "$date1";
  $newD1 = str_replace('/', '-', $oldDate1);
  $newDate1 =  date('Y-m-d', strtotime($newD1));
  $showDate1 = date('d/m/Y', strtotime($newD1));
  $newtime1 = date("H:i:s");
  
  $query = "UPDATE tdoctmajobdate  SET XDMajPickupActualDate = '$newDate $newtime',
            XDMajFinishDate = '$newDate1 $newtime1' WHERE XVMajDocNo = '$idno'";
  $sql = mysqli_query( $connect, $query );
  $query1 = "UPDATE tdoctmajob  SET XVMajStatus = 'ปิดงาน' WHERE XVMajDocNo = '$idno'";
  $sql1 = mysqli_query( $connect, $query1 );
  if($sql){
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
  mysqli_close( $connect );

  ?>
  </body>
  </html>
