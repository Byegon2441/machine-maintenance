<?php
$mysqli = mysqli_connect("localhost", "root", "1234", "dbpro");
 $result = mysqli_query($mysqli, "SELECT * FROM tbdatatype");
        $row = mysqli_fetch_array($result);
        var_dump($row);
        exit();
?>
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
    <?php
        
        $result = mysqli_query($mysqli, "SELECT * FROM tbdatatype");
        $row = mysqli_fetch_array($result);
        var_dump($row);
        exit();
    ?>
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
                            <a href="type.html"><i class="fa fa-table fa-fw"></i> ชนิดสินค้า</a>
                        </li>
                        <li>
                            <a href="product.html"><i class="fa fa-edit fa-fw"></i> สินค้า</a>
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
                <h1 class="page-header"><i class="glyphicon glyphicon-gift"></i><b>PRODUCT</b></h1>

                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-5">
                        <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <h4>ชนิดสินค้า</h4>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <div class="form-group">   
                                    <div class="row">
                                        <div class="col-lg-3">   
                                            รหัสชนิดสินค้า
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text"readonly value="<?php echo $row['typeid'] ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3">  
                                            ชื่อชนิดสินค้า
                                        </div>
                                        <div class="col-lg-9">
                                            <input class="form-control">
                                        </div>
                                    </div>
                                </div>
                                    <center>
                                    <button type="button" class="btn btn-success">บันทึก</button>
                                    <button type="button" class="btn btn-danger">ยกเลิก</button>
                                    </center>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
