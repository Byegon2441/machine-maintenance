<?php
    include '../database/connect.php';
    // $XVVehCode = $_POST['XVVehCode'];
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
    $query = "INSERT INTO tmstvehicle(XVVehName,XVVehRegistration,XVVehNumber,XVVehMango,XVVehBrand,XVVehModel,XVVehChassisNumber,XVVehEngineNumber, XVVehTypeCode , XVDptCode)
     VALUES ('$XVVehName','$XVVehRegistration','$XVVehNumber','$XVVehMango','$XVVehBrand','$XVVehModel','$XVVehChassisNumber','$XVVehEngineNumber','$XVVehTypeCode','$XVDptCode');";

    if(mysqli_query($connect,$query)){
        echo '<script>';
        echo "alert('ทำการเพิ่มเครื่องจักรเรียบร้อยแล้ว !!!');";
        echo "window.location='ListMachine.php';";
        echo '</script>';
      }else{

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

        echo '<script>';
        echo "alert('ไม่สามารถทำการเพิ่มข้อมูลเครื่องจักรได้".'\n'.$error_show."');";
        //echo "alert('$error_show');";
        echo "window.location='ListMachine.php';";
        echo '</script>';

      }
    mysqli_close($connect);

?>
