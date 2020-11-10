<?php 
    $dsn = 'sqlsrv:Server=localhost\sqlexpress;Database=cars';
    $username = null;
    $password = null;
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );

    try {
        $dbh = new PDO($dsn, $username, $password, $options);
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo 'Connected';
    } catch (PDOException $e) {
        //echo 'Unconnected'.$e->getMessage();
    }
    
?>