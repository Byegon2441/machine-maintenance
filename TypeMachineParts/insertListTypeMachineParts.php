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
$name = $_POST['name'];

$check = "SELECT XVMachinePartsTypeName FROM tmstmmachine_parts_type WHERE XVMachinePartsTypeName = '$name';";
$result = mysqli_query( $connect, $check );
$num=mysqli_num_rows($result);

if($num > 0){
    echo '<script>';
    echo "Swal.fire({
        title: 'เกิดข้อผิดพลาด!',
        text: 'ไม่สามารถทำการเพิ่มข้อมูลประเภทอะไหล่ได้ ".'\n'."ประเภทอะไหล่ ($name) มีการลงทะเบียนแล้ว',
        icon: 'error',
        confirmButtonText: 'Back'
      }).then(function() {
        window.location = 'ListTypeMachineParts.php';
    });";
    echo '</script>';
}else{
    $query = "INSERT INTO tmstmmachine_parts_type(XVMachinePartsTypeName) VALUES ('".$name."');";
    $sql = mysqli_query( $connect, $query );

    echo '<script>';
    echo "Swal.fire({
        title: 'สำเร็จ!',
        text: 'ทำการเพิ่มข้อมูลประเภทอะไหล่เรียบร้อยแล้ว',
        icon: 'success',
        confirmButtonText: 'Back'
      }).then(function() {
        window.location = 'ListTypeMachineParts.php';
    });";
    echo '</script>';
}
mysqli_close( $connect );

?>
</body>
</html>
