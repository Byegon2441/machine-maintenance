<?php
include '../database/connect.php';

$data=array(
    'carName1'=> $fname

);

for($i = 0; $i<3; $i++) {
    $sql="INSERT INTO car (carName1,carName2,carName3) VALUES '$fname','$fname2','$fname3';";
    $result = mysql_query($connect,$sql);
    if (!$result) {
     die('Invalid query: ' . mysql_error());
    }
}

        

mysqli_close( $connect );

?>