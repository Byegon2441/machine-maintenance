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

      if(in_array("M-000030",$_SESSION['menu']) || in_array("M-000031",$_SESSION['menu'])){

          


  date_default_timezone_set('Asia/Bangkok');
  include '../database/connect.php';
  $idno = $_POST['id'];
  $date = $_POST['XDMajRepairAppPlanDate'];
  $oldDate = "$date";
  $newD = str_replace('/', '-', $oldDate);
  $newDate =  date('Y-m-d', strtotime($newD));
  $showDate = date('d/m/Y', strtotime($newD));
  //$newtime = date("H:i:s");
                                                                //$newtime
  $query = "UPDATE tdoctmajobdate  SET XDMajRepairAppPlanDate = '$newDate' WHERE XVMajDocNo = '$idno'";
  $stmt = $dbh->query($query);
  // $sql = mysqli_query( $connect, $query );
  $query1 = "UPDATE tdoctmajob  SET XVMajStatus = 'รอนำรถเข้าซ่อม' WHERE XVMajDocNo = '$idno'";
  $stmt1 = $dbh->query($query1);
  // $sql1 = mysqli_query( $connect, $query1 );
  if($stmt1){
    echo '<script>';
    echo "Swal.fire({
        title: 'สำเร็จ!',
        text: 'ทำการนัดวันซ่อมเรียบร้อยแล้ว วันที่ ($showDate)',
        icon: 'success',
        confirmButtonText: 'Back'
      }).then(function() {
        window.location = 'ListFixDate.php';
    });";
    echo '</script>';

  }else{
    echo '<script>';
    echo "Swal.fire({
        title: 'เกิดข้อผิดพลาด!',
        text: 'ไม่สามารถทำการนัดวันซ่อมได้',
        icon: 'error',
        confirmButtonText: 'Back'
      }).then(function() {
        window.location = 'ListFixDate.php';
    });";
    echo '</script>';
  }
  // mysqli_close( $connect );
  $dbh= NULL;

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
