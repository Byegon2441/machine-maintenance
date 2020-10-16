<?php
include '../database/connect.php';
$name = $_POST['nameofuser'];
$dnum = $_POST['dnum'];
$dsub = $_POST['dsub'];
$ddis = $_POST['ddis'];
$dpro = $_POST['dpro'];
$noof = $_POST['noof'];

$sql = "INSERT INTO tdoctmajob(XVMajWhoInformant,XVMajDocStatus,XVMajNumber,`XVMajSub-district`,XVMajDistrict,XVMajProvince,XVVehCode) VALUES ('$name', '1', '$dnum', '$dsub', '$ddis', '$dpro', '$noof')";
$query = mysqli_query( $connect, $sql );
if ( $query ) {
    $sql = "SELECT XVMajDocNo FROM tdoctmajob ORDER BY XVMajDocNo DESC LIMIT 1";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $last_id = $row["XVMajDocNo"];
    // echo $last_id = mysqli_insert_id( $connect );
    
    $cnt = 1;
    // //ลำดับ
    $nvals = count( $_REQUEST['n_sub'] );
    //จำนวนอาเรย์
    for ( $i = 0; $i < $nvals; $i++ ) {
        $n_sub = $_REQUEST['n_sub'][$i];
        $sub = $_REQUEST['sub'][$i];
        // echo 'n_sub : '.$_REQUEST['n_sub'][$i];
        // echo 'sub : '.$_REQUEST['sub'][$i].'<br>';
        $sql1 = "INSERT INTO tdoctmajobdetail(XVMajDocNo,XIMajdSeqNo,XVMajdSubject,XVMajdCause) VALUES ('$last_id', '$cnt', '$n_sub', '$sub')";
        $query1 = mysqli_query( $connect, $sql1 );
        $cnt++;
        if ( $query1 ) {
            echo 'สำเร็จ';
        } else {

            echo mysqli_error( $connect );
        }
    }
} else {
    echo mysqli_error( $connect );
}

?>