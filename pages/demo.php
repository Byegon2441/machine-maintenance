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

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

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

<?php include 'templsidebar.php';?>

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    จัดการผู้ใช้งาน
                </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ชื่อผู้ใช้</th>
                                        <th>รหัสผ่าน</th>
                                        <th>ชื่อ/สกุล</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeA">
                                        <td>WK852741963</td>
                                        <td>password</td>
                                        <td>Dee Makmak</td>
                                        <td><input class='btn btn-primary' type='button' value='แก้ไข'/></td>
                                        <td><input class='btn btn-danger' type='button' value='ลบ'/></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXXXXX</td>
                                        <td>XXX</td>
                                        <td><input class='btn btn-primary' type='button' value='แก้ไข'/></td>
                                        <td><input class='btn btn-danger' type='button' value='ลบ'/></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXXXXX</td>
                                        <td>XXX</td>
                                        <td><input class='btn btn-primary' type='button' value='แก้ไข'/></td>
                                        <td><input class='btn btn-danger' type='button' value='ลบ'/></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXX</td>
                                        <td>XXX</td>
                                        <td><input class='btn btn-primary' type='button' value='แก้ไข'/></td>
                                        <td><input class='btn btn-danger' type='button' value='ลบ'/></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXX XX</td>
                                        <td>XXX</td>
                                        <td><input class='btn btn-primary' type='button' value='แก้ไข'/></td>
                                        <td><input class='btn btn-danger' type='button' value='ลบ'/></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
        </div>
        <!-- /#page-wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
