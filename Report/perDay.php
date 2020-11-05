<?php
date_default_timezone_set( 'Asia/Bangkok' );
include '../database/connect.php';
$date1 = $_GET['date_fi'];
$oldDate1 = "$date1";
// echo $oldDate1;
$newDate1 = date( 'Y-m-d', strtotime( $oldDate1 ) );
$sql = "SELECT m.XVMajDocNo,m.XVVehCode,p.XVDptName,m.XVMajStatus FROM TDocTMaJobDate d, TDocTMaJob m, TMstVehicle v, TMstMDepartment p WHERE d.XVMajDocNo = m.XVMajDocNo AND m.XVVehCode = v.XVVehCode AND v.XVDptCode = p.XVDptCode AND DATE(d.XDMajFinishRepairDate) = '$newDate1'";
$query = mysqli_query( $connect, $sql );
$data = array();
while( $row = mysqli_fetch_array( $query ) )
 {
         $data['data'][] = array(
             'XVMajDocNo'=>$row['XVMajDocNo'],
             'XVVehCode'=>$row['XVVehCode'],
             'XVDptName'=>$row['XVDptName'],
             'XVMajStatus'=>$row['XVMajStatus']
         );
}
echo json_encode( $data );
?>