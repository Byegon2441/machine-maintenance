<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2</title>

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

<?php include 'temTechnician.php'?>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รับอะไหล่ </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        ใบประเมินการซ่อม
                                
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>เลขใบแจ้งซ่อม</th>
                                        <th>วันที่แจ้ง</th>
                                        <th>หมายเลขเครื่องจักร</th>
                                        <th>ชื่องานหรือชื่อเครื่องจักร</th>
                                        <th>สถานะ</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeA">
                                        <td>RQMA20200100213</td>
                                        <td>10/1/2020</td>
                                        <td>MP1FRR90LFT00275</td>
                                        <td>Isuzu FRR90LNXXS 83-3429</td>
                                        <td>รอนำรถประเมินอะไหล่</td>
                                        <td><input class='btn btn-primary' type='button' value='รายละเอียด'/></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXXXXX</td>
                                        <td>XXX</td>
                                        <td>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                                        <td></td>
                                        <td><input class='btn btn-primary' type='button' value='รายละเอียด'/></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXXXXX</td>
                                        <td>XXX</td>
                                        <td>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                                        <td></td>

                                        <td><input class='btn btn-primary' type='button' value='รายละเอียด'/></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXXXXX</td>
                                        <td>XXX</td>
                                        <td>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                                        <td></td>

                                        <td><input class='btn btn-primary' type='button' value='รายละเอียด'/></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXXXXX</td>
                                        <td>XXX</td>
                                        <td>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</td>
                                        <td></td>

                                        <td><input class='btn btn-primary' type='button' value='รายละเอียด'/></td>
                                    </tr>

                                </tbody>
                            </table>
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
            responsive: true
        });
    });
    </script>

</body>

</html>
