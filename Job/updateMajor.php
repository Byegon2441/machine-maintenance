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
$XVMajDocNo = $_POST['XVMajDocNo'];
$name = $_POST['nameofuser'];
$dnum = $_POST['dnum'];
$dsub = $_POST['dsub'];
$ddis = $_POST['ddis'];
$dpro = $_POST['dpro'];
$noof = $_POST['noof'];

//การทำงานกรณีแก้ไขแล้วกดบันทึก
//update ส่วนหัวใบแจ้งซ่อม
if(isset($_POST['save'])){
    
    $sql = "UPDATE tdoctmajob
        SET XVMajWhoInformant = '$name' ,
        XVMajNumber = '$dnum',
        `XVMajSub-district` = '$dsub',
        XVMajDistrict = '$ddis',
        XVMajProvince='$dpro',
        XVVehCode='$noof'
        WHERE XVMajDocNo = '$XVMajDocNo' ";

$query = mysqli_query( $connect, $sql );
if ( $query ) {
    
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


}else if(isset($_POST['submit'])){
    $sql = "UPDATE tdoctmajob
        SET XVMajWhoInformant = '$name' ,
        XVMajNumber = '$dnum',
        `XVMajSub-district` = '$dsub',
        XVMajStatus='แจ้งซ่อม',
        XVMajDocStatus ='2',
        XVMajDistrict = '$ddis',
        XVMajProvince='$dpro',
        XVVehCode='$noof'
        WHERE XVMajDocNo = '$XVMajDocNo' ";
        
        $query = mysqli_query( $connect, $sql );
    if ( $query ) {
        
                echo '<script>';
                echo "Swal.fire({
                    title: 'สำเร็จ!',
                    text: 'ทำการส่งข้อมูลใบแจ้งซ่อมให้หัวหน้าช่างเรียบร้อยแล้ว',
                    icon: 'success',
                    confirmButtonText: 'Back'
                }).then(function() {
                    window.location = 'ListJob.php';
                });";
                echo '</script>';
            }else{
                echo mysqli_error( $connect );
        
        }


}


?>
</body>

</html>