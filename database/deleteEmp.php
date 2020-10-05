<?php
include 'connect.php';
if ( isset( $_POST['deletedata'] ) ) {
    $id = $_POST['delete_id'];
    // $name = $_POST['XVVehTypeName'];
    $sql = "DELETE FROM tmstmtemployee WHERE XVEpyCode = '$id'";
    $result = mysqli_query( $connect, $sql );

    if ( $result ) {
        echo '<script>';
        echo "alert('ทำการลบข้อมูลพนักงานเรียบร้อยแล้ว !!!');";
        echo "window.location='../pages/ListEmployee.php';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('ไม่สามารถทำการลบข้อมูลพนักงานได้ !!!');";
        echo "window.location='../pages/ListEmployee.php';";
        echo '</script>';
    }
}

?>