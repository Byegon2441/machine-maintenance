<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title></title>
</head>

<body>
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
    $sql = 'SELECT XVMajDocNo FROM tdoctmajob ORDER BY XVMajDocNo DESC LIMIT 1';
    $result = mysqli_query( $connect, $sql );
    $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
    $last_id = $row['XVMajDocNo'];
    $cnt = 1;
    $nvals = count( $_REQUEST['n_sub'] );
    date_default_timezone_set( 'Asia/Bangkok' );
    echo $ti =  date ( 'Y-m-d H:i:S' );
    $query1 = false;
    for ( $i = 0; $i < $nvals; $i++ ) {
        $n_sub = $_REQUEST['n_sub'][$i];
        $sub = $_REQUEST['sub'][$i];
        $sql1 = "INSERT INTO tdoctmajobdetail(XVMajDocNo,XIMajdSeqNo,XVMajdSubject,XVMajdCause) VALUES ('$last_id', '$cnt', '$n_sub', '$sub')";
        $query1 = mysqli_query( $connect, $sql1 );

        $cnt++;
    }
    if ( $query1 ) {
        $sql2 = "INSERT INTO tdoctmajobdate(XVMajDocNo,XDMajDate,XDMajKeyTime) VALUES ('$last_id', '$ti', '$ti')";
        $query2 = mysqli_query( $connect, $sql2 );
        if ( $query2 ) {
            echo '<script>';
            echo "Swal.fire({
                title: 'สำเร็จ!',
                text: 'ทำการบันทึกข้อมูลใบแจ้งซ่อมเรียบร้อยแล้ว',
                icon: 'success',
                confirmButtonText: 'Back'
              }).then(function() {
                window.location = 'ListJob.php';
            });";
            echo '</script>';
        }else{
            echo mysqli_error( $connect );
        }
    } else {
        echo mysqli_error( $connect );
    }
} else {
    echo mysqli_error( $connect );
}
?>
</body>

</html>