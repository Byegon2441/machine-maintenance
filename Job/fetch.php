<?php
//fetch.php
if ( isset( $_POST['id'] ) )
 {
    include '../database/connect.php';
    $sql = "SELECT * FROM tmstvehicle v, TMstMDepartment p WHERE v.XVVehCode = '".$_POST['id']."' AND v.XVDptCode = p.XVDptCode";
    $stmt = $dbh->query($sql);
    while( $row=$stmt->fetch(PDO::FETCH_ASSOC) )
 {
        $data['numb'] = $row['XVVehCode'];
        $data['dcode'] = $row['XVDptCode'];
        $data['dname'] = $row['XVDptname'];
        $data['dnum'] = $row['XVDptNumber'];
        $data['dsub'] = $row['XVDptSub_district'];
        $data['ddis'] = $row['XVDptDistrict'];
        $data['dpro'] = $row['XVDptProvince'];
    }

    echo json_encode( $data );
}
?>