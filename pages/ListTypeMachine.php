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

    <?php include 'templsidebar.php'?>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form class="form-horizontal" role="form" method="post" action="form_to_email_script.php ">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ชื่อประเภทเครื่องจักร:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder="First & Last"
                                    required>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">
                                <span class="required">*</span> Email: </label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="you@domain.com" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-sm-3 control-label">
                                <span class="required">*</span> Message:</label>
                            <div class="col-sm-9">
                                <textarea name="message" rows="4" required class="form-control" id="message"
                                    placeholder="Comments"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="human" class="col-sm-3 control-label">
                                <span class="required">*</span> Human or Bot:</label>
                            <div class="col-sm-4">
                                <h3 class="human">Six + 6 = ?</h3>
                                <input type="number" class="form-control" id="human" name="human"
                                    placeholder="Enter sum in digits">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                                <button type="submit" id="submit" name="submit"
                                    class="btn-lg btn-primary">SUBMIT</button>
                            </div>
                        </div> -->
                        <!--end Form-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ประเภทเครื่องจักร<button type="button" class="btn btn-success btn-circle"
                            style="float: right;"><i class="fa fa-plus"></i>
                        </button></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ประเภทเครื่องจักร
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover"
                                id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>รหัสประเภทเครื่องจักร</th>
                                        <th>ชื่อประเภทเครื่องจักร</th>

                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXXXXX</td>

                                        <td><input class='btn btn-primary' type='button' value='แก้ไข'
                                                data-toggle="modal" data-target="#exampleModal"></td>
                                        <td><input class='btn btn-danger' type='button' value='ลบ' /></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXXXXX</td>

                                        <td><input class='btn btn-primary' type='button' value='แก้ไข' /></td>
                                        <td><input class='btn btn-danger' type='button' value='ลบ' /></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXXXXX</td>

                                        <td><input class='btn btn-primary' type='button' value='แก้ไข' /></td>
                                        <td><input class='btn btn-danger' type='button' value='ลบ' /></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXX</td>

                                        <td><input class='btn btn-primary' type='button' value='แก้ไข' /></td>
                                        <td><input class='btn btn-danger' type='button' value='ลบ' /></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>XXXXXXXXXXXXXX</td>
                                        <td>XXXX XX</td>

                                        <td><input class='btn btn-primary' type='button' value='แก้ไข' /></td>
                                        <td><input class='btn btn-danger' type='button' value='ลบ' /></td>
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