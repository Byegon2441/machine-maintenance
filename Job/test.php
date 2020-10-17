<?php
    include '../database/connect.php';
    // $locID = $_POST['locationID'];
    $locID = $_POST['id'];
    // echo 'Result: '.$locID;
    // echo json_encode($locID);
    
    
    $sql = " SELECT * FROM tdoctmajobdetail WHERE XVMajDocNo = '$locID'";
    $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
    $rows = array();
    while ($r=mysqli_fetch_array($result)){
        $rows[] = $r['XVMajdSubject'];
    }
    echo json_encode($rows);
    // if($result){
    //     echo 'สำเร็จ';
    // }else{
    //     echo mysqli_error($connect);
    // }
?>