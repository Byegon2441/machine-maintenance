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

session_start();

//หาค่า read edit

        $_SESSION['menu'] = array();
        $_SESSION['report'] = array();
        $_SESSION['read']= array();//XBUmnIsRead
        $_SESSION['save']=array();//XBUmnIsSave
        $_SESSION['cancle']=array();//XBUmnIsCancel
        if(isset($_SESSION['XVMnuCode'])){
            for ($i = 0;$i<count($_SESSION['XVMnuCode']);$i++){
                $_SESSION['menu'][$i] = $_SESSION['XVMnuCode'][$i]['XVMnuCode'] ;
                $_SESSION['read'][$i] = $_SESSION['XVMnuCode'][$i]['XBUmnIsRead'];
                $_SESSION['save'][$i] = $_SESSION['XVMnuCode'][$i]['XBUmnIsSave'] ;
                $_SESSION['cancle'][$i] = $_SESSION['XVMnuCode'][$i]['XBUmnIsCancel'] ;
            }//ย้ายmenu code มาไว้อีกarray
        }
           
         
     
        //   if(array_search('M-000050',$_SESSION['menu'])==null){
        //     echo "null";
        //   }
        //     echo  $_SESSION['read'][array_search('M-000050',$_SESSION['menu'])];
        //     echo  $_SESSION['save'][array_search('M-000050',$_SESSION['menu'])];
        //     echo  $_SESSION['cancle'][array_search('M-000050',$_SESSION['menu'])];


            if(isset($_SESSION['XVRptCode'])){
            for ($i = 0;$i<count($_SESSION['XVRptCode']);$i++){
                $_SESSION['report'][$i] = $_SESSION['XVRptCode'][$i]['XVRptCode'] ;

            }//ย้าย report code มาไว้อีกarray

            }




  
  
    if(in_array("M-000024",$_SESSION['menu'])){
        echo '<script>';
            echo "Swal.fire({
                title: 'ยินดีต้อนรับ',
                text: 'เข้าสู่ระบบเรียบร้อยแล้ว',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location = '../CheckParts/listEvaluate.php';
            });";
            echo '</script>';
    }else if(in_array("M-000021",$_SESSION['menu']) || in_array("M-000018",$_SESSION['menu']) ){
        echo '<script>';
        echo "Swal.fire({
            title: 'ยินดีต้อนรับ',
            text: 'เข้าสู่ระบบเรียบร้อยแล้ว',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location = '../Job/ListJob.php';
        });";
        echo '</script>';
    }else if (in_array("R-000008",$_SESSION['report'])) {
        echo '<script>';
        echo "Swal.fire({
            title: 'ยินดีต้อนรับ',
            text: 'เข้าสู่ระบบเรียบร้อยแล้ว',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location = '../Report/AdminReport.php';
        });";
        echo '</script>';
    }

    

?>

</body>
  </html>
