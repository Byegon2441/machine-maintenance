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
$img = (isset($_POST["multiImg"])) ? $_POST["multiImg"] : NULL;//ภาพมีหรือเปล่า
$countfiles = count($_FILES['multiImg']['name']);//นับไฟล์
$upload = "";

foreach ($_POST['sequency'] as $key => $selectedOption){
    echo $selectedOption;
        $make_dir = mkdir("$ide/$selectedOption",0777,true);
        $upload = "$ide/$selectedOption/".$_FILES["multiImg"]["name"][$key];
        move_uploaded_file($_FILES['multiImg']['tmp_name'][$key],$upload);
    }

    $upload = "$ide/$selectedOption/";
    $sql = "UPDATE TDocTMaJob SET XVMajStatus = 'รออนุมัติซ่อม' WHERE XVMajDocNo = '$ide' ";
    $query = mysqli_query( $connect, $sql );
    $sql1 = "UPDATE tdoctmajobdetail SET XVPicturePath = '$upload' WHERE XVMajDocNo = '$ide' AND XIMajdSeqNo = $selectedOption";
    $query1 = mysqli_query( $connect, $sql1 );
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


// echo 'ลำดับที่ : '.$sq;
// echo 'จำนวนไฟล์ : '.$countfiles;


// echo $sq;

// if($make_dir){
//     echo 'created';
// }else{
//     echo 'not created';
// }


?>
</body>
</html>
