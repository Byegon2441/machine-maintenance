<?php
include '../database/connect.php';
$name = $_POST['nameofuser'];
$cnt = 1;
$nvals = count( $_REQUEST['n_sub'] );
for ( $i = 0; $i < $nvals; $i++ ) {
    // do something with $_REQUEST['shortcut'][$i] and $_REQUEST['ses'][$i]
    echo $name."<br>";
    echo "# : ".$cnt;
    echo "n_sub : ".$_REQUEST['n_sub'][$i];
    echo "sub : ".$_REQUEST['sub'][$i]."<br>";
    $cnt++;
}
?>