<?php 
    date_default_timezone_set('Asia/Bangkok');
    include '../database/connect.php';
    $date1 = $_GET['date_fi'];
    $oldDate1 = "$date1";
    // echo $oldDate1;
    $DN = str_replace('/', '-', $oldDate1);
    $newDate1 = date('Y-m-d', strtotime($DN));  
    //echo 'date1 : '.$newDate1;

    $sql = "SELECT m.XVMajDocNo,m.XVVehCode,p.XVDptName,m.XVMajStatus FROM TDocTMaJobDate d, TDocTMaJob m, TMstVehicle v, TMstMDepartment p WHERE d.XVMajDocNo = m.XVMajDocNo AND m.XVVehCode = v.XVVehCode AND v.XVDptCode = p.XVDptCode AND DATE(d.XDMajFinishDate) = '$newDate1' AND m.XVMajStatus = 'ปิดงาน'";    $query = mysqli_query($connect,$sql);
    while( $row = mysqli_fetch_array( $query) )
 {
    $data3[] = $row['XVMajDocNo'];
    $data3[] = $row['XVVehCode'];
    $data3[] = $row['XVDptName'];
    $data3[] = $row['XVMajStatus'];
    }
    echo json_encode($data3);
?>
