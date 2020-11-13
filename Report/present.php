<?php
// error_reporting( E_ALL ^ E_NOTICE );
date_default_timezone_set( 'Asia/Bangkok' );
include '../database/connect.php';
isset($_GET['date_fi']) ? $date1 = $_GET['date_fi'] : NULL;
$stts = "";
if(empty($_GET['stts'])){
    $sql = "SELECT m.XVMajDocNo,m.XVVehCode,p.XVDptName,m.XVMajStatus,FORMAT(d.XDMajDate, 'yyyy-MM-dd'),FORMAT(d.XDMajEstAppPlanDate, 'yyyy-MM-dd'),FORMAT(d.XDMajFinishEstDate, 'yyyy-MM-dd'),FORMAT(d.XDMajConfirmDate, 'yyyy-MM-dd'),FORMAT(d.XDMajSpareDate, 'yyyy-MM-dd'),FORMAT(d.XDMajRepairAppPlanDate, 'yyyy-MM-dd'),FORMAT(d.XDMajRepairActualDate, 'yyyy-MM-dd') FROM TDocTMaJobDate d, TDocTMaJob m, TMstVehicle v, TMstMDepartment p WHERE d.XVMajDocNo = m.XVMajDocNo AND m.XVVehCode = v.XVVehCode AND v.XVDptCode = p.XVDptCode GROUP BY m.XVMajDocNo";
}else{
    $stts = $_GET['stts'];
    $sql = "SELECT m.XVMajDocNo,m.XVVehCode,p.XVDptName,m.XVMajStatus,FORMAT(d.XDMajDate, 'yyyy-MM-dd'),FORMAT(d.XDMajEstAppPlanDate, 'yyyy-MM-dd'),FORMAT(d.XDMajFinishEstDate, 'yyyy-MM-dd'),FORMAT(d.XDMajConfirmDate, 'yyyy-MM-dd'),FORMAT(d.XDMajSpareDate, 'yyyy-MM-dd'),FORMAT(d.XDMajRepairAppPlanDate, 'yyyy-MM-dd'),FORMAT(d.XDMajRepairActualDate, 'yyyy-MM-dd') FROM TDocTMaJobDate d, TDocTMaJob m, TMstVehicle v, TMstMDepartment p WHERE d.XVMajDocNo = m.XVMajDocNo AND m.XVVehCode = v.XVVehCode AND v.XVDptCode = p.XVDptCode AND m.XVMaCarStatus = '$stts' GROUP BY m.XVMajDocNo";
}
$oldDate1 = "$date1";
$DN = str_replace('/', '-', $oldDate1);
    $newDate1 = date('Y-m-d', strtotime($DN)); 

$arry = array( 'DATE(d.XDMajDate)', 'DATE(d.XDMajEstAppPlanDate)', 'DATE(d.XDMajFinishEstDate)', 'DATE(d.XDMajConfirmDate)', 'DATE(d.XDMajSpareDate)', 'DATE(d.XDMajRepairAppPlanDate)', 'DATE(d.XDMajRepairActualDate)' );
$arry1 = array( 'แจ้งซ่อม', 'รอนำรถประเมินอะไหล่', 'รออนุมัติซ่อม', 'รออะไหล่', 'รอช่างรับอะไหล่', 'รอนำรถเข้าซ่อม', 'ดำเนินการซ่อม' );
$stmt = $dbh->query($sql);
$co = sizeof( $arry );
while( $row=$stmt->fetch(PDO::FETCH_ASSOC) )
 {
    for ( $i = $co-1; $i >= 0; $i-- ) {
        if ( $row[$arry[$i]] == $newDate1 ) {
            // echo $data[] = $row['XVMajDocNo'];
            // echo $data[] = $row['XVVehCode'];
            // echo $data[] = $row['XVDptName'];
            // echo $data[] = $row['XVMajStatus'].'<br>';
            $data1[] = $row['XVMajDocNo'];
            $data1[] = $row['XVVehCode'];
            $data1[] = $row['XVDptName'];
            $data1[] = $arry1[$i];
            // $data1[] = $row['XVMajStatus'];

            // echo $row[$arry[$i]];
            // echo '<br>';
        }
    }
}
echo json_encode( $data1 );
?>