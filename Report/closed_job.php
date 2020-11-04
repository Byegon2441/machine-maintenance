<?php 
    date_default_timezone_set('Asia/Bangkok');
    include '../database/connect.php';
    $date1 = $_GET['date_fi'];
    $oldDate1 = "$date1";
    // echo $oldDate1;
    $newDate1 = date("Y-m-d", strtotime($oldDate1));  
    // echo 'date1 : '.$newDate1;

    $sql = "SELECT m.XVMajDocNo FROM TDocTMaJobDate d, TDocTMaJob m WHERE DATE(d.XDMajFinishDate) = '$newDate1'";
    $query = mysqli_query($connect,$sql);
    while( $row = mysqli_fetch_array( $query) )
 {
        $data['Code'] = $row['XVMajDocNo'];
    }
    echo json_encode($data);
?>