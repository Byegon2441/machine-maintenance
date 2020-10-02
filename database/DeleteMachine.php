<?php
//ลบข้อมูลเครื่องจักร
    include 'connect.php';
    $id = $_GET['id'];
    $query = "delete FROM tmstvehicle WHERE XVVehCode = $id;";
    $sql = mysqli_query($connect,$query);
    mysqli_close($connect);
    echo "<script>window.location='../pages/ListMachine.php'</script>";
?>