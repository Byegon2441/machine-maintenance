<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="test1.php">1</a>
    <a href="test2.php">2</a>
    <a href="logout.php">logout</a>
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
                    'url':'https://networklink.co.th/ConCenter_Service/api/login',
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
                    // console.log(decoded.TSysSUserMenu[0].XVMnuCode)  
                    // console.log(decoded.TSysSUserProgram[0].XVPrgCode)
                    // console.log(decoded.TSysSUserReport[0].XVRptCode)  

                   
                    $.post( "set_ses.php", {
                        XVEmpCode: decoded.XVEmpCode,
                        XVEmpName: decoded.XVEmpName,
                        XVUsrCode: decoded.XVUsrCode,
                        XVUsrEmail: decoded.XVUsrEmail,
                        XVUsrName: decoded.XVUsrName,
                        XVUsrName: decoded.XVUsrName,
                        XVMnuCode : decoded.TSysSUserMenu[0].XVMnuCode,
                        XVPrgCode : decoded.TSysSUserProgram[0].XVPrgCode,
                        exp: decoded.exp,   
                          
                          })
                          .done(function( data ) {
                          //console.log( "Data Loaded: " +  data );
                            window.location.href='test1.php';
                           });

                   
                },//success
                error: function(error) {
                    console.log('Error: ' , error);
                    
                }

});
<?php } ?>

});
</script>

</html>