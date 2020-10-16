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
    if ( isset( $_POST['deletedata'] ) ) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM tmstmmachine_parts WHERE XVMachinePartsCode = $id";
    $sql = mysqli_query($connect,$query);
    mysqli_close($connect);
    if ( $sql ) {
        echo '<script>';
        // echo "alert('ทำการลบรายการอะไหล่เรียบร้อยแล้ว !!!');";
        // echo "window.location='ListMachineParts.php';";
        echo "Swal.fire({
            title: 'สำเร็จ!',
            text: 'ทำการลบรายการอะไหล่เรียบร้อยแล้ว',
            icon: 'success',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListMachineParts.php';
        });";
        echo '</script>';
    } else {
        echo '<script>';
        // echo "alert('ไม่สามารถทำการลบรายการอะไหลที่เลือกได้ !!!');";
        // echo "window.location='ListMachineParts.php';";
        echo "Swal.fire({
            title: 'เกิดข้อผิดพลาด!',
            text: 'ไม่สามารถทำการลบรายการอะไหลที่เลือกได้',
            icon: 'error',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListMachineParts.php';
        });";
        echo '</script>';
    }
}
?>
</body>
</html>

