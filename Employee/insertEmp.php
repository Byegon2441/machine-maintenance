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
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$number = $_POST['number'];
$role = $_POST['role'];

$check = "SELECT XVIdCardNumber FROM tmstmtemployee WHERE XVIdCardNumber = '$number';";
$result_check = mysqli_query( $connect, $check );
$num=mysqli_num_rows($result_check);

if($num>0){
        echo '<script>';
        //echo "alert('ไม่สามารถทำการเพิ่มข้อมูลพนักงานได้ ".'\n'."รหัสบัตรประชาชน ($number) มีการลงทะเบียนแล้ว');".mysqli_error($connect);
        echo "Swal.fire({
                title: 'เกิดข้อผิดพลาด!',
                text: 'ไม่สามารถทำการเพิ่มข้อมูลพนักงานได้ ".'\n'."รหัสบัตรประชาชน ($number) มีการลงทะเบียนแล้ว',
                icon: 'error',
                confirmButtonText: 'Back'
              }).then(function() {
                window.location = 'ListEmployee.php';
            });";
        //echo "window.location='ListEmployee.php';";
        echo '</script>';
}else{
        $query = "INSERT INTO tmstmtemployee(XVEpyFirstname,XVpyLastname,XVIdCardNumber,XVEpyJobPosition) VALUES ('$fname','$lname','$number','$role');";
        $sql = mysqli_query( $connect, $query );
        echo '<script>';
        //echo "alert('ทำการเพิ่มพนักงานเรียบร้อย');";
        //echo "window.location='ListEmployee.php';";
        echo "Swal.fire({
                title: 'สำเร็จ!',
                text: 'ทำการเพิ่มพนักงานเรียบร้อย',
                icon: 'success',
                confirmButtonText: 'Back'
              }).then(function() {
                window.location = 'ListEmployee.php';
            });";
        echo '</script>';
}

        

mysqli_close( $connect );
?>
</body>
</html>


