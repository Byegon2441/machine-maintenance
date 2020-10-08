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
        echo "alert('ไม่สามารถทำการเพิ่มข้อมูลพนักงานได้ ".'\n'."รหัสบัตรประชาชน ($number) มีการลงทะเบียนแล้ว');".mysqli_error($connect);
        echo "window.location='ListEmployee.php';";
        echo '</script>';
}else{
        $query = "INSERT INTO tmstmtemployee(XVEpyFirstname,XVpyLastname,XVIdCardNumber,XVEpyJobPosition) VALUES ('$fname','$lname','$number','$role');";
        $sql = mysqli_query( $connect, $query );
        echo '<script>';
        echo "alert('ทำการเพิ่มพนักงานเรียบร้อย');";
        echo "window.location='ListEmployee.php';";
        echo '</script>';
}

        

mysqli_close( $connect );

?>