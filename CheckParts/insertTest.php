<?php
include '../database/connect.php';
$ide = $_POST['XVMajDocNo'];
$sql = "UPDATE TDocTMaJob SET XVMaCarStatus = 'รออนุมัติซ่อม' WHERE XVMajDocNo = '$ide' ";
$query = mysqli_query( $connect, $sql );
if ( $query ) {
    echo 'success';
} else {
    echo mysqli_error( $connect );
}

?>