<?php
include("../connect/cn.php");
$tempid=$_GET['proid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>แก้ไขสินค้า</title>

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
        <?php
            $sql="SELECT * FROM tbproduct where typeid='".$tempid."'";
            $result = mysqli_query($mysqli_cn, $sql);
            $row = mysqli_fetch_array($result);
            $test=$row['typeid'];
        ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <h1 class="page-header"><i class="glyphicon glyphicon-gift"></i><b>PRODUCT</b></h1>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-5">
                        <div class="panel panel-red">
                        <div class="panel-heading">
                           <h4>สินค้า</h4>
                        </div>
                        <div class="panel-body">
                            <form action="productupdate.php" name="frmEdit" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            รหัสสินค้า
                                        </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <input class="form-control" type="text"readonly name="a" value="<?php echo $row['proid'] ?>">
                                        </div>
                                    </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="row">
                                 <div class="col-lg-3">
                                ชื่อสินค้า
                            </div>
                            <div class="col-lg-9"><input class="form-control" name="b" value="<?php echo $row['proname'] ?>">
                        </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="row">
                                 <div class="col-lg-3">
                                จำนวน
                            </div>
                                        <div class="col-lg-3">
                                            <input class="form-control" name="c" value="<?php echo $row['pronum'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        ชนิดสินค้า
                                    </div>
                                    <div class="col-lg-9">

                                    <?php
                                        $sql1="SELECT * FROM tbdatatype order by typename";
                                        $rsdatatype = mysqli_query($mysqli_cn, $sql1);
                                    ?>
                                        <select class="form-control" name="typeid" id="typeid">
                                        <?php
                                            while($rsrow=mysqli_fetch_array($rsdatatype)) {
                                                $temp1=$rsrow['typename'];
                                                $temp2=$rsrow['typeid'];
                                        ?>
                                            <option value="<?php echo $temp2;?>" <?php if ($temp2==$test) echo "selected"; ?> >
                                                <?php echo $temp1; ?>                                                    
                                                </option>
                                        <?php
                                            }
                                        ?>
                                        <!-- <option>a</option>
                                        <option selected="">b</option> -->
                                        </select>
                                    </div>
                                    
                                </div>
                                    <br>
                                    <center>
                                    <button type="submit" class="btn btn-success">บันทึก</button>
                                    <a href="mainproduct.php?proid=<?php echo $row['proid']; ?>"><button type="button" class="btn btn-danger">ยกเลิก</button>
                                    </center>
                                
                            </form>
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

</body>

</html>