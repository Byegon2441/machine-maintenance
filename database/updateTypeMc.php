<?php
include 'connect.php';
if ( isset( $_POST['updatedata'] ) ) {
    $id = $_POST['update_id'];
    $name = $_POST['XVVehTypeName'];
    $sql = "UPDATE tmstmvehicletype SET XVVehTypeName='$name' WHERE XVVehTypeCode = '$id'";
    $result = mysqli_query( $connect, $sql );

    if ( $result ) {
        echo '<script>';
        echo "alert('ทำการแก้ไขชื่อประเภทเครื่องจักรเรียบร้อยแล้ว !!!');";
        echo "window.location='../pages/ListTypeMachine.php';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('ไม่สามารถทำการแก้ไขชื่อประเภทเครื่องจักรได้ !!!');";
        echo "window.location='../pages/ListTypeMachine.php';";
        echo '</script>';
    }
}

?>