<?php
    include 'connect.php';
    $id = $_GET['id'];
    $query = "delete FROM tmstmvehicletype WHERE XVVehTypeCode = $id;";
    $sql = mysqli_query($connect,$query);
    mysqli_close($connect);
    echo "<script>window.location='../pages/ListTypeMachine.php'</script>";
?>