<?php
    include '../database/connect.php';
    if ( isset( $_POST['deletedata'] ) ) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM tmstmmachine_parts WHERE XVMachinePartsCode = $id";
    $sql = mysqli_query($connect,$query);
    mysqli_close($connect);
    if ( $sql ) {
        echo '<script>';
        echo "alert('ทำการลบรายการอะไหล่เรียบร้อยแล้ว !!!');";
        echo "window.location='ListMachineParts.php';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('ไม่สามารถทำการลบรายการอะไหลที่เลือกได้ !!!');";
        echo "window.location='ListMachineParts.php';";
        echo '</script>';
    }
}
?>
