<?php
    include '../database/connect.php';
    // $locID = $_POST['locationID'];
    $locID = $_POST['id'];
    $job = $_POST['jobid'];
    // echo 'Result: '.$locID;
    // echo json_encode($locID);
    
    
    $sql = "SELECT tp.XVMachinePartsName,tpu.XVAmount FROM tdoctmajob tj,tdoctmajobdetail td,tdoctmamachine_parts_use tpu,tmstmmachine_parts tp WHERE tj.XVMajDocNo = td.XVMajDocNo AND td.XVMajDocNo = tpu.XVMajDocNo AND tp.XVMachinePartsCode = tpu.XVMachinePartsCode AND td.XIMajdSeqNo = $locID AND td.XVMajDocNo = '$job'";
    $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
    $rows = array();
    while ($r=mysqli_fetch_array($result)){
        $rows[] = $r['XVMachinePartsName'];
        $rows[] = $r['XVAmount'];
    }
    echo json_encode($rows);
    // if($result){
    //     echo 'สำเร็จ';
    // }else{
    //     echo mysqli_error($connect);
    // }
?>