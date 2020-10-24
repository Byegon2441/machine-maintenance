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
$ide = $_POST['XVMajDocNo'];
$sql = "UPDATE TDocTMaJob SET XVMaCarStatus = 'รออนุมัติซ่อม' WHERE XVMajDocNo = '$ide' ";
$query = mysqli_query( $connect, $sql );
if ( $query ) {
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
    echo mysqli_error( $connect );
}

?>
</body>
</html>
