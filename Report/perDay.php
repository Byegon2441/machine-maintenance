<?php 
    date_default_timezone_set('Asia/Bangkok');
    include '../database/connect.php';
    $date1 = $_GET['date_fi'];
    $oldDate1 = "$date1";
    // echo $oldDate1;
    $DN = str_replace('/', '-', $oldDate1);
    $newDate1 = date('Y-m-d', strtotime($DN)); 
    // echo 'date1 : '.$newDate1;

    $sql = "SELECT m.XVMajDocNo,m.XVVehCode,p.XVDptName,m.XVMajStatus 
    FROM TDocTMaJobDate d, TDocTMaJob m, TMstVehicle v, TMstMDepartment p 
    WHERE d.XVMajDocNo = m.XVMajDocNo AND m.XVVehCode = v.XVVehCode AND v.XVDptCode = p.XVDptCode AND format(d.XDMajFinishRepairDate, 'yyyy-MM-dd') = '$newDate1' AND m.XVMajStatus = 'ซ่อมเสร็จ'";    
    // $query = mysqli_query($connect,$sql);
    $stmt = $dbh->query($sql);
    while( $row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data2[] = $row['XVMajDocNo'];
        $data2[] = $row['XVVehCode'];
        $data2[] = $row['XVDptName'];
        $data2[] = $row['XVMajStatus'];
    }
    echo json_encode($data2);
?>