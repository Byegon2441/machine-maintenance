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
if ( isset( $_POST['updatedata'] ) ) {
    $id = $_POST['update_id'];
    $name = $_POST['XVMachinePartsTypeName'];
    $sql = "SELECT XVMachinePartsTypeName FROM tmstmmachine_parts_type WHERE XVMachinePartsTypeName = '$name';";
    $stmt = $dbh->query($sql);
    $stmt->fetchAll();
    $cnt = $stmt->rowCount();

    if ( $cnt > 0 ) {
        echo '<script>';
        echo "Swal.fire({
            title: 'เกิดข้อผิดพลาด!',
            text: 'ไม่สามารถทำการแก้ไขชื่อประเภทอะไหล่ได้ ".'\n'."ประเภทอะไหล่ ($name) มีการลงทะเบียนแล้ว',
            icon: 'error',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListTypeMachineParts.php';
        });";
        echo '</script>';
    } else {

        $sql1 = "UPDATE tmstmmachine_parts_type SET XVMachinePartsTypeName='$name' WHERE XVMachinePartsTypeCode = '$id'";
        $stmt = $dbh->query($sql1);
        echo '<script>';
        echo "Swal.fire({
            title: 'สำเร็จ!',
            text: 'ทำการแก้ไขชื่อประเภทอะไหล่เรียบร้อย',
            icon: 'success',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListTypeMachineParts.php';
        });";
        echo '</script>';
    }
    $dbh = null;
}

?>
</body>
</html>
