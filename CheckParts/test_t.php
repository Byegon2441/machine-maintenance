<?php
    include '../database/connect.php';
    $locID = $_POST['id']; //คือลำดับอาการ
    $job = $_POST['jobid']; // เลขใบแจ้ง
    $sql = "SELECT * FROM TDocTMaMachine_parts_use u, TMstMMachine_parts p WHERE u.XVMajDocNo = '$job' AND u.XIMajdSeqNo = $locID AND u.XVMachinePartsCode = p.XVMachinePartsCode";
    $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
    $rows = array();
    while ($r=mysqli_fetch_array($result)){
        $rows[] = $r['XVMachinePartsCode'];
        $rows[] = $r['XVMachinePartsName'];
        $rows[] = $r['XVAmount'];
    }
    echo json_encode($rows);
?>