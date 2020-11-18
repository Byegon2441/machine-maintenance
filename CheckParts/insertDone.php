<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
    <title></title>
</head>

<body>
    <?php
include '../database/connect.php';
session_start();
$ide = $_POST['XVMajDocNo'];
$note = $_POST['XVMajFinishRmk'];
$XDMajFinishEstDate = $_POST['XDMajFinishEstDate'];
 $oldDate = "$XDMajFinishEstDate";
  $newD = str_replace('/', '-', $oldDate);
  $newDate =  date('Y-m-d', strtotime($newD));
  $showDate = date('d/m/Y', strtotime($newD));
    $sql2 = "UPDATE tdoctmajob SET XVMajFinishRmk = '$note' WHERE XVMajDocNo = '$ide'";
    $stmt2 = $dbh->query($sql2);
    $sql1 ="UPDATE tdoctmajobdate SET XDMajFinishEstDate = '$newDate' WHERE XVMajDocNo = '$ide'";
    $stmt1 = $dbh->query($sql1);
    $sql = "UPDATE TDocTMaJob SET XVMajStatus = 'ดำเนินการซ่อม' WHERE XVMajDocNo = '$ide' ";
    $stmt = $dbh->query($sql);
    if ( $stmt1) {
        echo '<script>';
                echo "Swal.fire({
                    title: 'สำเร็จ!',
                    text: 'ทำการส่งข้อมูลใบแจ้งซ่อมให้หัวหน้าช่างเรียบร้อยแล้ว',
                    icon: 'success',
                    confirmButtonText: 'Back'
                    }).then(function() {
                    window.location = 'listEvaluate.php';
                });";
                echo '</script>';
    } else {
        //echo mysqli_error( $connect );
        echo '<script>';
                echo "Swal.fire({
                    title: 'เกิดข้อผิดพลาด!',
                    text: 'ทำการส่งข้อมูลใบแจ้งซ่อมให้หัวหน้าช่างเรียบร้อยแล้ว',
                    icon: 'error',
                    confirmButtonText: 'Back'
                    }).then(function() {
                    window.location = 'listEvaluate.php';
                });";
                echo '</script>';
    }

?>
</body>

</html>