<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php include 'templsidebar.php';
    include '../database/connect.php';
?>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">เครื่องจักร
                    
                     <a  href="InsertMachine.php" class="btn btn-success btn-circle" style="float: right;"><i class="fa fa-plus"></i>
                            </a></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            เครื่องจักร
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table width="180%" class="table table-striped table-bordered table-hover"
                                    id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ลำดับที่ </th>
                                            <th>รหัสเครื่องจักร</th>
                                            <th>ชื่อเครื่องจักร</th>
                                            <th>ทะเบียนรถ</th>
                                            <th>เบอร์รถ</th>
                                            <th>เลขทะเบียน MANGO</th>
                                            <th>ยี่ห้อ</th>
                                            <th>รุ่นรถ</th>
                                            <th>เลขคัทซี</th>
                                            <th>เลขเครื่อง</th>
                                            <th>รหัสประเภทเครื่องจักร</th>
                                            <th>แก้ไข</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
          $sql = " SELECT v.XVVehCode,v.XVVehName,v.XVVehRegistration,v.XVVehNumber,v.XVVehMango,v.XVVehBrand,v.XVVehModel,v.XVVehChassisNumber,v.XVVehEngineNumber,vt.XVVehTypeName
          FROM tmstvehicle v,tmstmvehicletype vt
          WHERE v.XVVehCode = vt.XVVehTypeCode";
    $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
    while ($row=mysqli_fetch_array($result)){
      ?>

                                        <tr class="odd gradeA">
                                            <td>x</td>
                                            <td><?php echo $row["XVVehCode"];?></td>
                                            <td><?php echo $row["XVVehName"];?></td>
                                            <td><?php echo $row["XVVehRegistration"];?></td>
                                            <td><?php echo $row["XVVehNumber"];?></td>
                                            <td><?php echo $row["XVVehMango"];?></td>
                                            <td><?php echo $row["XVVehBrand"];?></td>
                                            <td><?php echo $row["XVVehModel"];?></td>
                                            <td><?php echo $row["XVVehChassisNumber"];?></td>
                                            <td><?php echo $row["XVVehEngineNumber"];?></td>
                                            <td><?php echo $row["XVVehTypeName"];?></td>
                                            <td> <a class='btn btn-primary' href="EditMachine.php">แก้ไข</a> </td>
                                            <td> <a class='btn btn-danger' href="DeleteMachine.php">ลบ</a> </td>
                                        </tr>

                                        <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: false
        });
    });
    </script>

</body>

</html>