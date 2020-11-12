<?php
    include '../database/connect.php';
    $locID = $_POST['id']; //คือลำดับอาการ
    $job = $_POST['jobid']; // เลขใบแจ้ง
    $sql = "SELECT * FROM TDocTMaMachine_parts_use u, TMstMMachine_parts p WHERE u.XVMajDocNo = '$job' AND u.XIMajdSeqNo = $locID AND u.XVMachinePartsCode = p.XVMachinePartsCode";
    $stmt = $dbh->query($sql);
    $rows = array();
    while ($r=$stmt->fetch(PDO::FETCH_ASSOC)){
        $rows[] = $r['XVMachinePartsCode'];
        $rows[] = $r['XVMachinePartsName'];
        $rows[] = $r['XVAmount'];
    }
    echo json_encode($rows);
?>