<?php
//fetch.php
if ( isset( $_POST['id'] ) )
 {
    include '../database/connect.php';
    $query = "SELECT * FROM tmstvehicle v, TMstMDepartment p WHERE v.XVVehCode = '".$_POST['id']."' AND v.XVDptCode = p.XVDptCode";
    $result = mysqli_query( $connect, $query );
    while( $row = mysqli_fetch_array( $result ) )
 {
        $data['numb'] = $row['XVVehCode'];
        $data['dcode'] = $row['XVDptCode'];
        $data['dname'] = $row['XVDptname'];
        $data['dnum'] = $row['XVDptNumber'];
        $data['dsub'] = $row['XVDptSub-district'];
        $data['ddis'] = $row['XVDptDistrict'];
        $data['dpro'] = $row['XVDptProvince'];
    }

    echo json_encode( $data );
}
?>