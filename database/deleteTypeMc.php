<?php
include 'connect.php';
if ( isset( $_POST['deletedata'] ) ) {
    $id = $_POST['delete_id'];
    // $name = $_POST['XVVehTypeName'];
    $sql = "DELETE FROM tmstmvehicletype WHERE XVVehTypeCode = '$id'";
    $result = mysqli_query( $connect, $sql );

    if ( $result ) {
        echo '<script>';
        echo "alert('ทำการลบประเภทเครื่องจักรเรียบร้อยแล้ว !!!');";
        echo "window.location='../pages/ListTypeMachine.php';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('ไม่สามารถทำการลบประเภทเครื่องจักรได้ !!!');".mysqli_error($connect);
        echo "window.location='../pages/ListTypeMachine.php';";
        echo '</script>';
    }
}

?>