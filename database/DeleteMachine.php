<?php
//ลบข้อมูลเครื่องจักร
    include 'connect.php';
    if ( isset( $_POST['deletedata'] ) ) {
    $id = $_POST['delete_id'];
    $query = "delete FROM tmstvehicle WHERE XVVehCode = $id;";
    $sql = mysqli_query($connect,$query);
    mysqli_close($connect);
    if ( $sql ) {
        echo '<script>';
        echo "alert('ทำการลบเครื่องจักรเรียบร้อยแล้ว !!!');";
        echo "window.location='../pages/ListMachine.php';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('ไม่สามารถทำการลบเครื่องจักรได้ !!!');";
         echo "window.location='../pages/ListMachine.php';";
        echo '</script>';
    }
}
?>