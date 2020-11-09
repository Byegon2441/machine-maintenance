<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
    <title></title>
</head>
<body>
<?php
include '../database/connect.php';
session_start();
$ide = $_POST['XVMajDocNo'];
$XDMajFinishEstDate = $_POST['XDMajFinishEstDate'];
foreach ($_POST['sequency'] as $key => $selectedOption){
    echo 'ลำดับอาการที่ : '.$selectedOption.'<br>';
    $make_dir = mkdir("$ide/$selectedOption",0777,true);
    $img = (isset($_POST["multiImg$selectedOption"])) ? $_POST["multiImg$selectedOption"] : NULL;//ภาพมีหรือเปล่า
    if(!$img){
        echo 'มีรูป';
        $countfiles = count($_FILES["multiImg$selectedOption"]["name"]);//นับไฟล์
        for ($i=0; $i < $countfiles; $i++) {
            $upload = "$ide/$selectedOption/".$_FILES["multiImg$selectedOption"]["name"][$i];
            move_uploaded_file($_FILES["multiImg$selectedOption"]["tmp_name"][$i],$upload);
            $upload = "";
            $upload = "$ide/$selectedOption/";
            $sql1 = "UPDATE tdoctmajobdetail SET XVPicturePath = '$upload' WHERE XVMajDocNo = '$ide' AND XIMajdSeqNo = $selectedOption";
            $query1 = mysqli_query( $connect, $sql1 );
        }
    }else{
        echo 'ไม่มีรูป';
    }
}
 $oldDate = "$XDMajFinishEstDate";
  $newD = str_replace('/', '-', $oldDate);
  $newDate =  date('Y-m-d', strtotime($newD));
  $showDate = date('d/m/Y', strtotime($newD));
//  $newtime = date("H:i:s");
                                                            //$newtime
    $sql1 ="UPDATE tdoctmajobdate SET XDMajFinishEstDate = '$newDate' WHERE XVMajDocNo = '$ide'";
    $query1 = mysqli_query( $connect, $sql1);
    $sql = "UPDATE TDocTMaJob SET XVMajStatus = 'รออนุมัติซ่อม' WHERE XVMajDocNo = '$ide' ";
    $query = mysqli_query( $connect, $sql );
    if ( $query1) {
        echo '<script>';
                echo "Swal.fire({
                    title: 'สำเร็จ!',
                    text: 'ทำการส่งข้อมูลใบแจ้งซ่อมให้หัวหน้าช่างเรียบร้อยแล้ว',
                    icon: 'success',
                    confirmButtonText: 'Back'
                    }).then(function() {
                    window.location = 'listEvaluate.php';
                });";
                echo '</script>';
    } else {
        echo mysqli_error( $connect );
    }

?>
</body>
</html>
