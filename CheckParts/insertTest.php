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
    error_reporting(0);
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
    error_reporting(E_ALL & ~E_NOTICE);
    error_reporting(E_ALL);
    error_reporting(-1);
    ini_set('error_reporting', E_ALL);
    include '../database/connect.php';
    session_start();
    (!empty($_POST['done'])) ? $done = $_POST['done'] : $done = NULL;
    if (isset($done)=='ปิดงาน') {
        $ide = $_POST['XVMajDocNo'];
        $note = $_POST['XVMajFinishRmk'];
        $XDMajFinishEstDate = $_POST['XDMajFinishEstDate'];
        $oldDate = "$XDMajFinishEstDate";
        $newD = str_replace('/', '-', $oldDate);
        $newDate =  date('Y-m-d', strtotime($newD));
        $showDate = date('d/m/Y', strtotime($newD));
        $sql2 = "UPDATE tdoctmajob SET XVMajFinishRmk = '$note' WHERE XVMajDocNo = '$ide'";
        $stmt2 = $dbh->query($sql2);
        $sql1 ="UPDATE tdoctmajobdate SET XDMajFinishEstDate = '$newDate' WHERE XVMajDocNo = '$ide'";
        $stmt1 = $dbh->query($sql1);
        $sql = "UPDATE TDocTMaJob SET XVMajStatus = 'ดำเนินการซ่อม' WHERE XVMajDocNo = '$ide' ";
        $stmt = $dbh->query($sql);
        if ( $stmt1) {
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
            //echo mysqli_error( $connect );
            echo '<script>';
                    echo "Swal.fire({
                        title: 'เกิดข้อผิดพลาด!',
                        text: 'ทำการส่งข้อมูลใบแจ้งซ่อมให้หัวหน้าช่างเรียบร้อยแล้ว',
                        icon: 'error',
                        confirmButtonText: 'Back'
                        }).then(function() {
                        window.location = 'listEvaluate.php';
                    });";
                    echo '</script>';
        }
    } else {
        $ide = $_POST['XVMajDocNo'];
        $XDMajFinishEstDate = $_POST['XDMajFinishEstDate'];
        foreach ($_POST['sequency'] as $key => $selectedOption){
        //echo 'ลำดับอาการที่ : '.$selectedOption.'<br>';
        $sttr = "$ide/$selectedOption";
        $img = (isset($_POST["multiImg$selectedOption"])) ? $_POST["multiImg$selectedOption"] : NULL;//ภาพมีหรือเปล่า
        if(!$img){
            if(!is_dir($sttr)){
                $make_dir = mkdir("$ide/$selectedOption",0777,true);
            }
            //echo 'มีรูป';
            $countfiles = count($_FILES["multiImg$selectedOption"]["name"]);//นับไฟล์
            for ($i=0; $i < $countfiles; $i++) {
                $upload = "$ide/$selectedOption/".$_FILES["multiImg$selectedOption"]["name"][$i];
                move_uploaded_file($_FILES["multiImg$selectedOption"]["tmp_name"][$i],$upload);
                $upload = "";
                $upload = "$ide/$selectedOption/";
                $sql1 = "UPDATE tdoctmajobdetail SET XVPicturePath = '$upload' WHERE XVMajDocNo = '$ide' AND XIMajdSeqNo = $selectedOption";
                $stmt1 = $dbh->query($sql1);
                }
            }else{
                echo 'ไม่มีรูป';
            }
            if(!empty($_POST['note'][$selectedOption - 1])){
                $cmmt = $_POST['note'][$selectedOption - 1];
                    $sqll = "UPDATE tdoctmajobdetail SET XVComment = '$cmmt' WHERE XVMajDocNo = '$ide' AND XIMajdSeqNo = $selectedOption" ;
                    $stmtCmmt = $dbh->query($sqll);
            }
        }
        $oldDate = "$XDMajFinishEstDate";
        $newD = str_replace('/', '-', $oldDate);
        $newDate =  date('Y-m-d', strtotime($newD));
        $showDate = date('d/m/Y', strtotime($newD));
        $sql1 ="UPDATE tdoctmajobdate SET XDMajFinishEstDate = '$newDate' WHERE XVMajDocNo = '$ide'";
        $stmt1 = $dbh->query($sql1);
        $sql = "UPDATE TDocTMaJob SET XVMajStatus = 'รออนุมัติซ่อม' WHERE XVMajDocNo = '$ide' ";
        $stmt = $dbh->query($sql);
        if ( $stmt1) {
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
            echo '<script>';
                    echo "Swal.fire({
                        title: 'เกิดข้อผิดพลาด!',
                        text: 'ทำการส่งข้อมูลใบแจ้งซ่อมให้หัวหน้าช่างเรียบร้อยแล้ว',
                        icon: 'error',
                        confirmButtonText: 'Back'
                        }).then(function() {
                        window.location = 'listEvaluate.php';
                    });";
                    echo '</script>';
        }
}
?>
</body>

</html>