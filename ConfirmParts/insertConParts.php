<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบซ่อมบำรุงเครื่องจักร : แก้ไขใบแจ้งซ่อม</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

<body>
<?php 
include '../database/connect.php';
    if(isset($_POST['save'])){

        $id = $_POST['id'];   

        // เพิ่มข้อมูล เฉพาะ จำนวนวัน , วันที่ของมา  , อะไหล่ที่มาจาก 'สั่งซื้อ' 
        if(isset($_POST['check_source'])  && isset($_POST['dateforcoming']) &&  isset($_POST['XDMachinePartsReady']) ){
           
          foreach ($_POST['check_source'] as $key => $value) {
                if($_POST['check_source'][$key] =="สั่งซื้อ") {
                    $XVNumOfDays = $_POST['dateforcoming'][$key];
                    $XDMachinePartsReady = $_POST['XDMachinePartsReady'][$key];
                    $oldDate = "$XDMachinePartsReady";
                    $newD = str_replace('/', '-', $oldDate);
                    $newDate =  date('Y-m-d', strtotime($newD));
                
                    $sql = "UPDATE tdoctmamachine_parts_use
                    SET XVSource= '$value'
                    , XDMachinePartsReady = '$newDate'
                    ,XVNumOfDays = '$XVNumOfDays'
                    WHERE XVMajDocNo= '$id'
                    AND XIMachinePartsSeqNo = '$key';
                    ";

                        if(mysqli_query( $connect, $sql )){
                            echo '<script>';
                                        echo "Swal.fire({
                                            title: 'บันทึกข้อมูลสำเร็จ!',
                                            text: 'บันทึกข้อมูลสำเร็จ',
                                            icon: 'success',
                                            confirmButtonText: 'Back'
                                            }).then(function() {
                                            window.location = 'ListConParts.php';
                                        });";
                                        echo '</script>';
                        }else{
                            echo mysqli_error($connect);
                        }

                }else if($_POST['check_source'][$key] =="คลัง"){
                    $sql = "UPDATE tdoctmamachine_parts_use
                    SET XVSource= '$value'
                    WHERE XVMajDocNo= '$id'
                    AND XIMachinePartsSeqNo = '$key';
                    ";

                        if(mysqli_query( $connect, $sql )){
                            echo '<script>';
                                        echo "Swal.fire({
                                            title: 'บันทึกข้อมูลสำเร็จ!',
                                            text: 'บันทึกข้อมูลสำเร็จ',
                                            icon: 'success',
                                            confirmButtonText: 'Back'
                                            }).then(function() {
                                            window.location = 'ListConParts.php';
                                        });";
                                        echo '</script>';
                        }else{
                            echo mysqli_error($connect);
                        }

                }
          }//foreach  



        }else{ 

                             echo '<script>';
                             echo "Swal.fire({
                                 title: 'เกิดข้อผิดพลาด!',
                                 text: 'กรุณาใส่ข้อมูลส่งมอบอะไหล่อีกครั้ง',
                                 icon: 'error',
                                 confirmButtonText: 'Back'
                                 }).then(function() {
                                 window.location = 'ConParts.php?id=$id';
                             });";
                             echo '</script>';
        }//if else isset check_source



        // เพิ่มข้อมูล เฉพาะ เช็คว่าเบิก , วันที่เบิก  
        if(isset($_POST['dateforusing']) && isset($_POST['XDMachinePartsUse']) ){
            foreach ($_POST['dateforusing'] as $key => $value) {
                $XDMachinePartsUse = $_POST['XDMachinePartsUse'][$key];
                            $oldDate = "$XDMachinePartsUse";
                             $newD = str_replace('/', '-', $oldDate);
                             $newDate =  date('Y-m-d', strtotime($newD));

                        $sql = "UPDATE tdoctmamachine_parts_use
                            SET XVPickupParts= '$value'
                            , XDMachinePartsUse = '$newDate'
                            WHERE XVMajDocNo= '$id'
                            AND XIMachinePartsSeqNo = '$key';
                            ";
                            if(mysqli_query( $connect, $sql )){
                                                    echo '<script>';
                                                                echo "Swal.fire({
                                                                    title: 'บันทึกข้อมูลสำเร็จ!',
                                                                    text: 'บันทึกข้อมูลสำเร็จ',
                                                                    icon: 'success',
                                                                    confirmButtonText: 'Back'
                                                                    }).then(function() {
                                                                    window.location = 'ListConParts.php';
                                                                });";
                                                                echo '</script>';
                            }else{
                                   echo mysqli_error($connect);
                            }
            }//foreach 
        }//if isset dateforusing XDMachinePartsUse


        if(isset($_POST['parts_ready'])){
            foreach ($_POST['parts_ready'] as $key => $value) {
                $sql = "UPDATE tdoctmamachine_parts_use
                SET XVPartsReady= '$value'
                WHERE XVMajDocNo= '$id'
                AND XIMachinePartsSeqNo = '$key';
                ";
                  if(mysqli_query( $connect, $sql )){
                    echo '<script>';
                                echo "Swal.fire({
                                    title: 'บันทึกข้อมูลสำเร็จ!',
                                    text: 'บันทึกข้อมูลสำเร็จ',
                                    icon: 'success',
                                    confirmButtonText: 'Back'
                                    }).then(function() {
                                    window.location = 'ListConParts.php';
                                });";
                                echo '</script>';
                }else{
                echo mysqli_error($connect);
                }
            }//foreach
            

        }//isset parts_ready


        


    }//isset save







?>

</body>

</html>