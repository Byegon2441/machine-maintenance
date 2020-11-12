<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    $.ajax({
                    'url':'https://networklink.co.th/ConCenter_Service/api/login',
                    'method':'POST',
                    'dataType': 'json',
                    processData: false,
                    'contentType': 'application/json',
                    'data':JSON.stringify({
                        "XVUsrCode": "TestPBRU",
                        "XVUsrPwd" : "123456789"
                    }),
                    'success': function (token) {
                    var data = JSON.stringify(token);
                    var decoded = jwt_decode(data);
                
                    console.log( decoded)//obj
                    console.log(decoded.XVEmpCode)
                   
                },
                error: function(error) {
                    console.log('Error: ' , error);
                    
                }

});
            
});
</script>

</html>