<?php
    include '../database/connect.php';
    // $XVVehCode = $_POST['XVVehCode'];
    $XVVehName = $_POST['XVVehName'];
    $XVVehRegistration = $_POST['XVVehRegistration'];
    $XVVehNumber = $_POST['XVVehNumber'];
    $XVVehMango = $_POST['XVVehMango'];
    $XVVehBrand = $_POST['XVVehBrand'];
    $XVVehModel = $_POST['XVVehModel'];
    $XVVehChassisNumber = $_POST['XVVehChassisNumber'];
    $XVVehEngineNumber = $_POST['XVVehEngineNumber'];
    $XVVehTypeCode = $_POST['XVVehTypeName'];
    $query = "INSERT INTO tmstvehicle(XVVehName,XVVehRegistration,XVVehNumber,XVVehMango,XVVehBrand,XVVehModel,XVVehChassisNumber,XVVehEngineNumber, XVVehTypeCode)
     VALUES ('$XVVehName','$XVVehRegistration','$XVVehNumber','$XVVehMango','$XVVehBrand','$XVVehModel','$XVVehChassisNumber','$XVVehEngineNumber','$XVVehTypeCode');";  

    if(mysqli_query($connect,$query)){
        echo '<script>';
        echo "alert('ทำการเพิ่มเครื่องจักรเรียบร้อยแล้ว !!!');";
        echo "window.location='ListMachine.php';";
        echo '</script>';
      }else{
        echo '<script>';
        echo "alert('ไม่สามารถทำการเพิ่มเครื่องจักรได้  !!!');";
        echo "window.location='ListMachine.php';";
        echo '</script>';
      }
    mysqli_close($connect);
    
?>



