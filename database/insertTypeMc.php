<?php
    include 'connect.php';
    $name = $_POST['name'];
    $query = "INSERT INTO tmstmvehicletype(XVVehTypeName) VALUES ('".$name."');";
    $sql = mysqli_query($connect,$query);
    mysqli_close($connect);
    echo "<script>window.location='../pages/ListTypeMachine.php'</script>";
?>