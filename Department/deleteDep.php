<?php
include '../database/connect.php';
if ( isset( $_POST['deletedata'] ) ) {
    $id = $_POST['delete_id'];
    // $name = $_POST['XVVehTypeName'];
    $sql = "DELETE FROM tmstmdepartment WHERE XVDptCode = '$id'";
    $result = mysqli_query( $connect, $sql );

    if ( $result ) {
        echo '<script>';
        echo "alert('ทำการลบไซต์งานเรียบร้อยแล้ว !!!');";
        echo "window.location='ListDepartment.php';";
        echo '</script>';
    } else {
        echo '<script>';
        echo "alert('ไม่สามารถทำการลบไซต์งานได้ !!!');";
        echo "window.location='ListDepartment.php';";
        echo '</script>';
    }
}

?>