<?php
    include '../database/connect.php';
    // $locID = $_POST['locationID'];
    $locID = $_POST['id'];
    $job = $_POST['jobid'];
    // echo "this is LocId : ".$locID;
    // "<br>";
    // echo "this is job : ".$job;
    // echo 'Result: '.$locID;
    // echo json_encode($locID);
    
    
    // $sql = "SELECT tp.XVMachinePartsName,tpu.XVAmount FROM tdoctmajob tj,tdoctmajobdetail td,tdoctmamachine_parts_use tpu,tmstmmachine_parts tp WHERE tj.XVMajDocNo = td.XVMajDocNo AND td.XVMajDocNo = tpu.XVMajDocNo AND tp.XVMachinePartsCode = tpu.XVMachinePartsCode AND td.XIMajdSeqNo = $locID AND td.XVMajDocNo = '$job'";
    $sql = "SELECT * FROM tdoctmajob tj,tdoctmajobdetail td,tdoctmamachine_parts_use tpu,tmstmmachine_parts tp WHERE tj.XVMajDocNo = td.XVMajDocNo AND td.XVMajDocNo = tpu.XVMajDocNo AND tp.XVMachinePartsCode = tpu.XVMachinePartsCode AND td.XIMajdSeqNo = $locID AND td.XVMajDocNo = '$job'";
    $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
    $rows = array();
    while ($r=mysqli_fetch_array($result)){

        $rows[] = $r['XVMachinePartsCode'];
        $rows[] = $r['XVMachinePartsName'];
        $rows[] = $r['XVAmount'];
    }
    // $rows[] = $r['XIMachinePartsSeqNo']; ส่งค่ากลับไปให้ tag input ชื่อ pp จากนั้นทำการส่งค่าผ่านฟอร์มแบบปกติไปลบก่อนแล้วค่อยเพิ่ม
    echo json_encode($rows);
    // if($result){
    //     echo 'สำเร็จ';
    // }else{
    //     echo mysqli_error($connect);
    // }
?>