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
     function success()
    {
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
    }

    function error()
    {
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
    }

include '../database/connect.php';
if(isset($_POST['save'])){
    $id = $_POST['id'];   
        // เพิ่มข้อมูล เฉพาะ จำนวนวัน , วันที่ของมา  , อะไหล่ที่มาจาก 
        if(isset($_POST['check_source'])  ){
           
            foreach ($_POST['check_source'] as $key => $value) {
  
                   if($_POST['check_source'][$key] == "คลัง"){
                     
                     $sql = "UPDATE tdoctmamachine_parts_use
                      SET XVSource= '$value'
                      WHERE XVMajDocNo= '$id'
                      AND XIMachinePartsSeqNo = '$key';
                      ";
  
                          if(mysqli_query( $connect, $sql )){
                            success();
                          }else{
                              echo mysqli_error($connect);
                          }
  
                  }else if($_POST['check_source'][$key] =="สั่งซื้อ" && isset($_POST['dateforcoming']) &&  isset($_POST['XDMachinePartsReady']) ) {
                    
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
                               success();
                          }else{
                              echo mysqli_error($connect);
                              
                          }
  
                  }else{
                    error();
                  }
            }//foreach  
                 
          }//isset($_POST['check_source']


          if(isset($_POST['parts_ready'])){ // เพิ่มข้อมูล เฉพาะ เช็คว่าอะไหล่พร้อม  
            foreach ($_POST['parts_ready'] as $key => $value) {
                $sql = "UPDATE tdoctmamachine_parts_use
                SET XVPartsReady= '$value'
                WHERE XVMajDocNo= '$id'
                AND XIMachinePartsSeqNo = '$key';
                ";
                  if(mysqli_query( $connect, $sql )){
                   success();
                }else{
                echo mysqli_error($connect);
                }
            }//foreach
            

        }//isset($_POST['parts_ready'])
  

        if(isset($_POST['dateforusing']) && isset($_POST['XDMachinePartsUse']) ){  // เพิ่มข้อมูล เฉพาะ เช็คว่าเบิก , วันที่เบิก  
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
                                                    success();
                            }else{
                                   echo mysqli_error($connect);
                            }
            }//foreach 
            
        }//isset($_POST['dateforusing']) && isset($_POST['XDMachinePartsUse']) 

        if(isset($_POST['XDMajSpareDate'])){ // เพิ่มข้อมูล วันที่อะไหล่พร้อม
             $confirm_date = $_POST['XDMajSpareDate'];
             $oldDate = "$confirm_date";
             $newD = str_replace('/', '-', $oldDate);
             $newDate =  date('Y-m-d', strtotime($newD));
            
                            $sql = "UPDATE tdoctmajobdate
                            SET XDMajSpareDate = '$newDate' 
                            WHERE XVMajDocNo= '$id' ;
                            ";
                            if(mysqli_query( $connect, $sql )){
                                
                                        success();
                            }else{
                                error();
                                   echo mysqli_error($connect);
                            }

        }

        success();


}

?>






</body>
</html>
