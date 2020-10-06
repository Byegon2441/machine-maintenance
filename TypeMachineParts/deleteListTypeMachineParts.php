<?php
    include '../database/connect.php';
    if ( isset( $_POST['deletedata'] ) ) {
    $XVMachinePartsTypeCode = $_POST['delete_id'];
    $query = "DELETE FROM tmstmmachine_parts_type WHERE XVMachinePartsTypeCode = $XVMachinePartsTypeCode";
    $sql = mysqli_query($connect,$query);
    mysqli_close($connect);
    if ( $sql ) {
        echo '<script>';
        echo "alert('ทำการลบประเภทอะไหล่เรียบร้อยแล้ว !!!');";
        echo "window.location='ListTypeMachineParts.php';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('ไม่สามารถทำการลบประเภทอะไหลที่เลือกได้ !!!');";
        echo "window.location='ListTypeMachineParts.php';";
        echo '</script>';
    }
}
?>
