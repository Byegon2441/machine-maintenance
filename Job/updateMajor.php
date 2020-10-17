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
        $XVMajDocNo = $_POST['XVMajDocNoo'];
        $name = $_POST['nameofuser'];
        $dnum = $_POST['dnum'];
        $dsub = $_POST['dsub'];
        $ddis = $_POST['ddis'];
        $dpro = $_POST['dpro'];
        $noof = $_POST['noof'];
        // echo $XVMajDocNo;
//การทำงานกรณีแก้ไขแล้วกดบันทึก
//update ส่วนหัวใบแจ้งซ่อม
$sql = "SELECT XIMajdSeqNo FROM tdoctmajobdetail WHERE XVMajDocNo = '$XVMajDocNo'";
$query = mysqli_query( $connect, $sql );
$query1 = false;
while( $row = mysqli_fetch_array($query))
 {
    $seq = $row['XIMajdSeqNo'];
    $sql1 = "DELETE FROM tdoctmajobdetail  WHERE XIMajdSeqNo = $seq AND XVMajDocNo = '$XVMajDocNo'";
    $query1 = mysqli_query( $connect, $sql1 );
    echo $seq;
}
echo $XVMajDocNo;
if($query1){
    $cnt = 1;
    $nvals = count( $_REQUEST['n_subb'] );
    $query2 = false;
    for ( $i = 0; $i < $nvals; $i++ ) {
        $n_sub = $_REQUEST['n_subb'][$i];
        $sub = $_REQUEST['subb'][$i];
        if(!empty($n_sub) && !empty($sub)){
            $sql2 = "INSERT INTO tdoctmajobdetail(XVMajDocNo,XIMajdSeqNo,XVMajdSubject,XVMajdCause) VALUES ('$XVMajDocNo', '$cnt', '$n_sub', '$sub')";
            $query2 = mysqli_query( $connect, $sql2 );
            $cnt++;
        }
    }
    if($query2){
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
                }else{ echo mysqli_error( $connect );
               
                                }
}else{
    echo mysqli_error($connect);
}

//     if ( $query1 ) {
    
//                     echo '<script>';
//                     echo "Swal.fire({
//                         title: 'สำเร็จ!',
//                         text: 'ทำการบันทึกข้อมูลใบแจ้งซ่อมเรียบร้อยแล้ว',
//                         icon: 'success',
//                         confirmButtonText: 'Back'
//                       }).then(function() {
//                         window.location = 'ListJob.php';
//                     });";
//                     echo '</script>';
//                 }else{
//                     echo mysqli_error( $connect );
               
//             }
// }


// $sql = "UPDATE tdoctmajob
//         SET XVMajWhoInformant = '$name' ,
//         XVMajNumber = '$dnum',
//         `XVMajSub-district` = '$dsub',
//         XVMajDistrict = '$ddis',
//         XVMajProvince='$dpro',
//         XVVehCode='$noof'
//         WHERE XVMajDocNo = '$XVMajDocNo' ";
// $query = mysqli_query( $connect, $sql );
// if ( $query ) {
    
//             echo '<script>';
//             echo "Swal.fire({
//                 title: 'สำเร็จ!',
//                 text: 'ทำการบันทึกข้อมูลใบแจ้งซ่อมเรียบร้อยแล้ว',
//                 icon: 'success',
//                 confirmButtonText: 'Back'
//               }).then(function() {
//                 window.location = 'ListJob.php';
//             });";
//             echo '</script>';
//         }else{
//             echo mysqli_error( $connect );
       
//     }


// }else if(isset($_POST['submit'])){
//     $sql = "UPDATE tdoctmajob
//         SET XVMajWhoInformant = '$name' ,
//         XVMajNumber = '$dnum',
//         `XVMajSub-district` = '$dsub',
//         XVMajStatus='แจ้งซ่อม',
//         XVMajDocStatus ='2',
//         XVMajDistrict = '$ddis',
//         XVMajProvince='$dpro',
//         XVVehCode='$noof'
//         WHERE XVMajDocNo = '$XVMajDocNo' ";
        
//         $query = mysqli_query( $connect, $sql );
//     if ( $query ) {
        
//                 echo '<script>';
//                 echo "Swal.fire({
//                     title: 'สำเร็จ!',
//                     text: 'ทำการส่งข้อมูลใบแจ้งซ่อมให้หัวหน้าช่างเรียบร้อยแล้ว',
//                     icon: 'success',
//                     confirmButtonText: 'Back'
//                 }).then(function() {
//                     window.location = 'ListJob.php';
//                 });";
//                 echo '</script>';
//             }else{
//                 echo mysqli_error( $connect );
        
//         }


// }


?>
</body>

</html>