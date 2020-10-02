<?php
    include 'connect.php';
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
     
    //  $query = "UPDATE tmstvehicle SET XVVehCode = '".$XVVehCode."' WHERE XVVehCode= '".$XVVehCode."' ;";
    
    
    

    if(mysqli_query($connect,$query)){
        echo "YeaH";
    }else{
        echo 'fail'.mysqli_error($connect);
    }
    mysqli_close($connect);
     echo "<script>window.location='../pages/ListMachine.php'</script>";
?>