<?php
    include 'connect.php';
    $name = $_POST['name'];
    $id = $_POST['id'];
    $query = "UPDATE tmstmvehicletype SET XVVehTypeName = '".$name."' WHERE XVVehTypeCode= '".$id."' ;";
    $sql = mysqli_query($connect,$query);
    mysqli_close($connect);
    echo "<script>window.location='../pages/ListTypeMachine.php'</script>";
?>