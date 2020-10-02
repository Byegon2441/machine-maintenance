<?php
    include 'connect.php';
    $number = $_POST['number'];
    $sub = $_POST['sub'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $name = $_POST['name'];
    $query = "INSERT INTO tmstmdepartment(XVDptNumber,XVDptSub-district,XVDptDistrict,XVDptProvince,XVDptname) VALUES ('".$number."''".$sub."''".$district."''".$province."''".$name."');";
    $sql = mysqli_query($connect,$query);
    mysqli_close($connect);
    echo "<script>window.location='../pages/ListDepartment.php'</script>";
?>