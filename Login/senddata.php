<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
      <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
  
</body>
<!-- <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../vendor/datatables-responsive/dataTables.responsive.js"></script> -->
<script src="../vendor/jquery/jquery.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../jwt-decode-master/build/jwt-decode.js"></script>
<script>
    
$(document).ready(function(){
            // $.ajax({
            //     type: 'POST',
            //     url: 'https://networklink.co.th/ConCenter_Service/api/login',
            //     success: function (data) {
            //         //console.log(data);
            //         console.log("OK");
            //     },
            //     error: function(error) {
            //         console.log('Error: ' , error);
                    
            //     }
            // });
            <?php 
            if(isset($_POST['user']) && isset($_POST['pass'])){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
            
              
            ?>
                    $.ajax({
                    'url':'https://networklink.co.th/ConCenter_Service_test/api/login',
                    'method':'POST',
                    'dataType': 'json',
                    processData: false,
                    'contentType': 'application/json',
                    'data':JSON.stringify({
                        "XVUsrCode": '<?php echo $user;?>',
                        "XVUsrPwd" : '<?php echo $pass;?>'
                    }),
                    'success': function (token) {
                    var data = JSON.stringify(token);
                    var decoded = jwt_decode(data);
                
                    console.log( decoded)//obj
                   
                     //console.log(decoded.TSysSUserMenu[0].XVMnuCode)  
                    // console.log(decoded.TSysSUserProgram[0].XVPrgCode)
                    // console.log(decoded.TSysSUserReport[0].XVRptCode)  

                   
                    $.post( "set_session.php", {
                        XVEmpCode: decoded.XVEmpCode,
                        XVEmpName: decoded.XVEmpName,
                        XVUsrCode: decoded.XVUsrCode,
                        XVUsrEmail: decoded.XVUsrEmail,
                        XVUsrName: decoded.XVUsrName,
                        XVUsrName: decoded.XVUsrName,
                        XVMnuCode : decoded.TSysSUserMenu,
                        XVPrgCode : decoded.TSysSUserProgram[0].XVPrgCode,
                        XVRptCode :  decoded.TSysSUserReport,
                        exp: decoded.exp,   
                          
                          })
                          .done(function( data ) {
                          console.log( "Data Loaded: " +  data );
                           window.location.href='set_path.php';
                       


                           });//done

                   
                },//success
                error: function(error) {
                    console.log('Error: ' , error);
                     Swal.fire({
                            title: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
                            text: 'กรุณาลงชื่อเข้าใช้อีกครั้ง',
                            icon: 'error',
                            confirmButtonText: 'Back'
                        }).then(function() {
                            window.location = 'login.php';
                        })
                    

                }

});
<?php } ?>

});
</script>

</html>