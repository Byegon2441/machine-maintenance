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
if ( isset( $_POST['updatedata'] ) ) {
    $id = $_POST['XVVehCode'];
    $XVDptCode = $_POST['XVDptCode'];
    $XVVehName = $_POST['XVVehName'];
    $XVVehRegistration = $_POST['XVVehRegistration'];
    $XVVehNumber = $_POST['XVVehNumber'];
    $XVVehMango = $_POST['XVVehMango'];
    $XVVehBrand = $_POST['XVVehBrand'];
    $XVVehModel = $_POST['XVVehModel'];
    $XVVehChassisNumber = $_POST['XVVehChassisNumber'];
    $XVVehEngineNumber = $_POST['XVVehEngineNumber'];
    $XVVehTypeCode = $_POST['XVVehTypeName'];
  $sql = "UPDATE tmstvehicle
     SET  XVVehName ='$XVVehName',
     XVVehRegistration ='$XVVehRegistration',
     XVVehNumber ='$XVVehNumber',
     XVVehMango ='$XVVehMango',
     XVVehBrand ='$XVVehBrand',
     XVVehModel ='$XVVehModel',
     XVVehChassisNumber ='$XVVehChassisNumber',
     XVVehEngineNumber ='$XVVehEngineNumber',
     XVVehTypeCode ='$XVVehTypeCode',
     XVDptCode ='$XVDptCode'
     WHERE XVVehCode = $id;
     ";
    $stmt = $dbh->query($sql);
   if ( $stmt ) {
        // echo '<script>';
        // echo "alert('ทำการแก้ไขชื่อเครื่องจักรเรียบร้อย');";
        // echo "window.location='ListMachine.php';";
        // echo '</script>';

        echo '<script>';
        echo "Swal.fire({
            title: 'สำเร็จ!',
            text: 'ทำการแก้ไขชื่อเครื่องจักรเรียบร้อย!',
            icon: 'success',
            confirmButtonText: 'Back'
          }).then(function() {
            window.location = 'ListMachine.php';
        });";
        echo '</script>';

    } else {



        $error_detail = mysqli_error($connect);
        $error_show="";
        if(strpos($error_detail, "XVVehRegistration_UQ")){
          $error_show="ทะเบียนรถ ($XVVehRegistration) มีการลงทะเบียนแล้ว";
        }else if(strpos($error_detail, "XVVehNumber_UQ")){
          $error_show="เบอร์รถ ($XVVehNumber) มีการลงทะเบียนแล้ว";
        }else if(strpos($error_detail, "XVVehMango_UQ")){
          $error_show="เลขทะเบียน Mango ($XVVehMango) มีการลงทะเบียนแล้ว";
        }else if(strpos($error_detail, "XVVehChassisNumber_UQ")){
          $error_show="หมายเลขคัทซี ($XVVehChassisNumber) มีการลงทะเบียนแล้ว";
        }else if(strpos($error_detail, "XVVehChassisNumber_UQ")){
          $error_show="หมายเลขเครื่อง ($XVVehEngineNumber) มีการลงทะเบียนแล้ว";
        }

        // echo '<script>';
        // echo "alert('ไม่สามารถทำการแก้ไขข้อมูลเครื่องจักรได้".'\n'.$error_show."');";
        // //echo "alert('$error_show');";
        // echo "window.location='ListMachine.php';";
        // echo '</script>';

        echo '<script>';
            echo "Swal.fire({
                title: 'เกิดข้อผิดพลาด!',
                text: 'ไม่สามารถทำการแก้ไขข้อมูลเครื่องจักรได้ ".'\n'."รหัสบัตรประชาชน ($XVIdCardNumber) มีการลงทะเบียนแล้ว!',
                icon: 'error',
                confirmButtonText: 'Back'
              }).then(function() {
                window.location = 'ListMachine.php';
            });";
            echo '</script>';
    }
}
$dbh = null;
?>
