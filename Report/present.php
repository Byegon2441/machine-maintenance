<?php
// error_reporting( E_ALL ^ E_NOTICE );
date_default_timezone_set( 'Asia/Bangkok' );
include '../database/connect.php';
isset($_GET['date_fi']) ? $date1 = $_GET['date_fi'] : NULL;
$date1 = str_replace('/', '-', $date1);
$date1 =  date('Y-m-d', strtotime($date1));
// echo $date1;
$stts = "";
if(empty($_GET['stts'])){
    $sql = "SELECT m.XVMajDocNo,m.XVVehCode,p.XVDptName,m.XVMajStatus,FORMAT(d.XDMajDate, 'yyyy-MM-dd') as XDMajDate,FORMAT(d.XDMajEstAppPlanDate, 'yyyy-MM-dd') as XDMajEstAppPlanDate,FORMAT(d.XDMajFinishEstDate, 'yyyy-MM-dd') as XDMajFinishEstDate,FORMAT(d.XDMajConfirmDate, 'yyyy-MM-dd') as XDMajConfirmDate,FORMAT(d.XDMajSpareDate, 'yyyy-MM-dd') as XDMajSpareDate,FORMAT(d.XDMajRepairAppPlanDate, 'yyyy-MM-dd') as XDMajRepairAppPlanDate,FORMAT(d.XDMajRepairActualDate, 'yyyy-MM-dd') as XDMajRepairActualDate FROM TDocTMaJobDate d, TDocTMaJob m, TMstVehicle v, TMstMDepartment p WHERE d.XVMajDocNo = m.XVMajDocNo AND m.XVVehCode = v.XVVehCode AND v.XVDptCode = p.XVDptCode";
}else{
    $stts = $_GET['stts'];
    $sql = "SELECT m.XVMajDocNo,m.XVVehCode,p.XVDptName,m.XVMajStatus,FORMAT(d.XDMajDate, 'yyyy-MM-dd') as XDMajDate,FORMAT(d.XDMajEstAppPlanDate, 'yyyy-MM-dd') as XDMajEstAppPlanDate,FORMAT(d.XDMajFinishEstDate, 'yyyy-MM-dd') as XDMajFinishEstDate,FORMAT(d.XDMajConfirmDate, 'yyyy-MM-dd') as XDMajConfirmDate,FORMAT(d.XDMajSpareDate, 'yyyy-MM-dd') as XDMajSpareDate,FORMAT(d.XDMajRepairAppPlanDate, 'yyyy-MM-dd') as XDMajRepairAppPlanDate,FORMAT(d.XDMajRepairActualDate, 'yyyy-MM-dd') as XDMajRepairActualDate FROM TDocTMaJobDate d, TDocTMaJob m, TMstVehicle v, TMstMDepartment p WHERE d.XVMajDocNo = m.XVMajDocNo AND m.XVVehCode = v.XVVehCode AND v.XVDptCode = p.XVDptCode AND m.XVMaCarStatus = '$stts'";
}
// $oldDate1 = "$date1";
// $DN = str_replace('/', '-', $oldDate1);
//     $newDate1 = date('Y-m-d', strtotime($DN));
$newDate1 =  $date1;

$arry = array( "XDMajDate", "XDMajEstAppPlanDate", "XDMajFinishEstDate", "XDMajConfirmDate", "XDMajSpareDate", "XDMajRepairAppPlanDate", "XDMajRepairActualDate" );
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