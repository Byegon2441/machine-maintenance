<?php

session_start();
if($_SESSION['XVPrgCode']== 'P-03' && $_SESSION['XVMnuCode']=='M-000018'){

    echo "Page 1"."<br>";
    echo   $_SESSION['XVEmpCode']."<br>";
    echo  $_SESSION['XVEmpName']."<br>";
    echo  $_SESSION['XVUsrCode']."<br>";
    echo  $_SESSION['XVUsrEmail']."<br>";
    echo  $_SESSION['XVUsrName']."<br>";
    echo  $_SESSION['XVMnuCode']."<br>";
    echo  $_SESSION['XVPrgCode']."<br>";
    echo $_SESSION['exp']."<br>";

    echo "<a href='test2.php'>go to 2</a>";
    echo " <a href='logout.php'>logout</a>";
}else{
    
    echo "<script>
    alert('Not Access');
    window.location.href='senddata.php';
    </script>
    ";
}
?>