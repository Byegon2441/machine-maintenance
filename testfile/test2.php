<?php
session_start();
if($_SESSION['XVPrgCode']== 'P-02' && $_SESSION['XVMnuCode']=='M-000018'){


    echo "Page 2"."<br>";
    echo   $_SESSION['XVEmpCode']."<br>";
    echo  $_SESSION['XVEmpName']."<br>";
    echo  $_SESSION['XVUsrCode']."<br>";
    echo  $_SESSION['XVUsrEmail']."<br>";
    echo  $_SESSION['XVUsrName']."<br>";
    echo  $_SESSION['XVMnuCode']."<br>";
    echo  $_SESSION['XVPrgCode']."<br>";
    echo $_SESSION['exp']."<br>";
    
    echo "<a href='test1.php'>go to 1</a>";
    echo " <a href='logout.php'>logout</a>";

}else{
    
    echo "<script>
    alert('Not Access');
    window.location.href='senddata.php';
    </script>
    ";
}
?>