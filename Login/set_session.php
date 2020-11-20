<?php
    session_start();
  echo $_SESSION['XVEmpCode'] = $_POST['XVEmpCode'];
  echo  $_SESSION['XVEmpName'] =  $_POST['XVEmpName'];
  echo  $_SESSION['XVUsrCode'] =  $_POST['XVUsrCode'];
  echo $_SESSION['XVUsrEmail'] =  $_POST['XVUsrEmail'];
  echo  $_SESSION['XVUsrName'] =  $_POST['XVUsrName'];
     $_SESSION['XVMnuCode'] =  $_POST['XVMnuCode'];
    $_SESSION['XVPrgCode'] =  $_POST['XVPrgCode'];
        $_SESSION['XVRptCode'] =  $_POST['XVRptCode'];
  echo $_SESSION['exp'] =  $_POST['exp'];
  // return;
?>