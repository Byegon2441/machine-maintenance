<?php
include("../connect/cn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>จัดการสินค้า</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

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
    
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"><i class="glyphicon glyphicon-gift"></i>PRODUCT</a>
            </div>
            <!-- /.navbar-header -->

            
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="maintype.php"><i class="fa fa-table fa-fw"></i> ชนิดสินค้า</a>
                        </li>
                        <li>
                            <a href="mainproduct.php"><i class="fa fa-edit fa-fw"></i> สินค้า</a>
                        </li>
                        
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <h1 class="page-header"><i class="glyphicon glyphicon-gift"></i><b>MAINPRODUCT</b></h1>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-6">
                        <div class="panel panel-red">
                        <div class="panel-heading">
                           <h4>ชนิดสินค้า</h4>
                        </div>
                        <div class="panel-body">

                           <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <div class="row">
                            <div class="col-lg-10"></div>
                            <div class="col-lg-2">
                            <a href="mainadd.php"><button type="button" class="btn btn-warning">เพิ่ม</button>
                            </div>
                        </div>
                        <br>
                                <thead>
                                    <tr>
                                        <th>รหัสชนิดสินค้า</th>
                                        <th>ชื่อชนิดสินค้า</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql="SELECT * FROM tbdatatype";
                                        $result = mysqli_query($mysqli_cn, $sql);
                                        while($row = mysqli_fetch_array($result)) { 
                                    ?>
                                        <tr>
                                            <td><?php echo $row['typeid']; ?></td>
                                            <td><?php echo $row['typename']; ?></td>
                                            <td><a href="type.php?typeid=<?php echo $row['typeid']; ?>"><center><button type="button" class="btn btn-warning">แก้ไข</button></center></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                        </div>

                    </div>
                        
                        </div>

                    </div>
                
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

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