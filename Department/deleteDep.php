<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
<?php
include '../database/connect.php';
if ( isset( $_POST['deletedata'] ) ) {
    $id = $_POST['delete_id'];
    // $name = $_POST['XVVehTypeName'];
    $sql = "DELETE FROM tmstmdepartment WHERE XVDptCode = '$id'";
    $result = $dbh->query($sql);

    if ( $result ) {
        echo '<script>';
        // echo "alert('ทำการลบไซต์งานเรียบร้อยแล้ว !!!');";
        // echo "window.location='ListDepartment.php';";
        echo "Swal.fire({
            title: 'สำเร็จ!',
            text: 'ทำการลบไซต์งานเรียบร้อยแล้ว',
            icon: 'success',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListDepartment.php';
        });";
        echo '</script>';
    } else {
        echo '<script>';
        // echo "alert('ไม่สามารถทำการลบไซต์งานได้ !!!');";
        // echo "window.location='ListDepartment.php';";
        echo "Swal.fire({
            title: 'เกิดข้อผิดพลาด!',
            text: 'ไม่สามารถทำการลบไซต์งานได้',
            icon: 'error',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListDepartment.php';
        });";
        echo '</script>';
    }
}
$dbh = NULL;
?>
</body>
</html>
