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
<?php 
    if(!isset($_SESSION)){
        session_start();
    }
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
              <?php
                if(in_array("M-000024",$_SESSION['menu'])){
                   
                   echo "<a class='navbar-brand' href='../CheckParts/listEvaluate.php'>ระบบซ่อมบำรุงเครื่องจักร</a>";
                }else if(in_array("M-000021",$_SESSION['menu']) || in_array("M-000018",$_SESSION['menu']) ){
                   echo  "<a class='navbar-brand' href='../Job/ListJob.php'>ระบบซ่อมบำรุงเครื่องจักร</a>";
                }else if (in_array("R-000008",$_SESSION['report'])) {
                    echo "<a class='navbar-brand' href='../Report/AdminReport.php'>ระบบซ่อมบำรุงเครื่องจักร</a>";
                }
              ?>
              
               


            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <label for="Username"><?php echo "ชื่อผู้ใช้งาน : ".$_SESSION['XVUsrName'] ?>  </label>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> -->
                        <!-- <li class="divider"></li> -->
                        <li><a href="../Login/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                    <?php 
                        //echo $key['XVMnuCode'];
                        if(in_array("M-000021",$_SESSION['menu']) || in_array("M-000018",$_SESSION['menu']) || in_array("M-000024",$_SESSION['menu'])){
                     ?>
                        <li>
                        <a href="#"><i class="fa fa-bars  fa-fw"></i> ใบแจ้งซ่อม<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                               <?php if(in_array("M-000021",$_SESSION['menu']) || in_array("M-000018",$_SESSION['menu']) ){ //ใบแจ้งซ่อมทั้งหมด
                                   ?>
                                <li>
                                    <a href="../Job/ListJob.php"><i class="fa fa-edit fa-fw"></i> ใบแจ้งซ่อมทั้งหมด</a>
                                </li>
                               <?php } ?>
                               <?php  if(in_array("M-000022",$_SESSION['menu']) || in_array("M-000023",$_SESSION['menu'])){//กำหนดวันนัดประเมิน
                                   ?>
                                <li>
                                    <a href="../CheckCars/ListCheck.php"><i class="fa fa-edit fa-fw"></i> กำหนดวันนัดประเมิน</a>   <!-- คือรายการที่ต้องใส่วันนัด-->
                                </li>
                               <?php } ?>
                               <?php if(in_array("M-000043",$_SESSION['menu']) || in_array("M-000044",$_SESSION['menu'])){//รถรอประเมิน  ?>
                                <li>
                                    <a href="../CheckCars/ListCheckDataEngi.php"><i class="fa fa-edit fa-fw"></i> รถรอประเมิน</a>   <!-- listที่show คือใบที่ใส่วันนัดประเมินแล้ว-->
                                </li>
                               <?php  }?>
                                <?php  if(in_array("M-000024",$_SESSION['menu'])){ //ใบประเมินการซ่อม
                                    ?>
                                <li>
                                <a href="../CheckParts/listEvaluate.php"><i class="fa fa-edit fa-fw"></i> ใบประเมินการซ่อม</a>
                                </li>
                                <?php } ?>
                                    <?php if(in_array("M-000025",$_SESSION['menu']) || in_array("M-000026",$_SESSION['menu'])){ //อนุมัติการซ่อม
                                         ?>
                                <li>
                                <a href="../AllowMainte/ListAllowMainte.php"><i class="fa fa-edit fa-fw"></i> อนุมัติการซ่อม</a> <!-- หรือก็คือ รถประเมินแล้ว อันเดียวกัน-->
                                </li>
                                    <?php } ?>
                                    <?php  if(in_array("M-000027",$_SESSION['menu']) || in_array("M-000028",$_SESSION['menu'])){ //รายการส่งมอบอะไหล่
                                        ?>
                                <li>
                                <a href="../ConfirmParts/ListConParts.php"><i class="fa fa-edit fa-fw"></i> รายการส่งมอบอะไหล่</a><!-- หรือก็คือ หน้ารอธุรการส่ง อันเดียวกัน-->
                                </li>
                                    <?php  } ?>
                                    <?php  if(in_array("M-000029",$_SESSION['menu'])){//รับอะไหล่
                                    ?>
                                <li>
                                <a href="../GetParts/ListGetParts.php"><i class="fa fa-edit fa-fw"></i> รับอะไหล่</a>
                                </li>
                                    <?php }?>
                                    <?php if(in_array("M-000030",$_SESSION['menu']) || in_array("M-000031",$_SESSION['menu'])){//กำหนดวันนัดซ่อม ?>
                                <li>
                                    <a href="../AllowMainte/ListFixDate.php"><i class="fa fa-edit fa-fw"></i> กำหนดวันนัดซ่อม</a>   <!-- คือรายการที่ต้องใส่วันนัด-->
                                </li>
                                    <?php }?>
                                        <?php if(in_array("M-000032",$_SESSION['menu']) || in_array("M-000033",$_SESSION['menu'])){//รับรถเข้าซ่อม ?>
                                <li>
                                <a href="../CheckCars/ListEngiRepair.php"><i class="fa fa-edit fa-fw"></i> รับรถเข้าซ่อม</a>
                                </li>
                                        <?php } ?>
                                        <?php if(in_array("M-000034",$_SESSION['menu']) || in_array("M-000035",$_SESSION['menu'])){//แจ้งซ่อมเสร็จ  ?>
                                <li>
                                <a href="../JobDone/ListDone.php"><i class="fa fa-edit fa-fw"></i> แจ้งซ่อมเสร็จ</a>
                                </li>
                                        <?php }?>
                                            <?php if(in_array("M-000036",$_SESSION['menu']) || in_array("M-000037",$_SESSION['menu'])){//ปิดงาน   ?>
                                <li>
                                <a href="../Finish/ListFinish.php"><i class="fa fa-edit fa-fw"></i> ปิดงาน</a>
                                </li>
                                        <?php }?>

                                        <?php if(in_array("M-000038",$_SESSION['menu']) || in_array("M-000039",$_SESSION['menu'])){//ปิดงานแล้ว   ?>
                                <li>
                                <a href="../Finish/ListFinishDone.php"><i class="fa fa-check-square-o"></i> ปิดงานแล้ว</a>
                                </li>
                                        <?php }?>
                                
                            </ul>
                               <?php } ?>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                           
                        </li>
                         <?php if(in_array("M-000040",$_SESSION['menu'])){

                          ?>    
                        <li>
                            <a href="#"><i class="fa fa-bars  fa-fw" ></i> กำหนดค่า<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../TypeMachine/ListTypeMachine.php"><i class="fa fa-edit fa-fw"></i> ประเภทเครื่องจักร</a>
                                </li>
                                <li>
                                    <a href="../Machine/ListMachine.php"><i class="fa fa-edit fa-fw"></i> เครื่องจักร</a>
                                </li>
                                <li>
                                    <a href="../Department/ListDepartment.php"><i class="fa fa-edit fa-fw"></i> ไซต์งาน</a>
                                </li>
                                
                                <li>
                                    <a href="../MachineParts/ListMachineParts.php"><i class="fa fa-edit fa-fw"></i> อะไหล่</a>
                                </li>
                                <li>
                                    <a href="../TypeMachineParts/ListTypeMachineParts.php"><i class="fa fa-edit fa-fw"></i> ประเภทอะไหล่</a>
                                </li>
                                <!-- <li>
                                    <a href="../Employee/ListEmployee.php"><i class="fa fa-edit fa-fw"></i> พนักงาน</a>
                                </li> -->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <?php } ?>

                        <!-- <li>
                            <a href="../User/ManageMember.php"><i class="fa fa-user fa-fw"></i> จัดการผู้ใช้งาน</a>
                        </li> -->
                            <?php  if (in_array("R-000008",$_SESSION['report'])) {  //รายงาน
                                ?>
                        <li>
                            <a href="../Report/AdminReport.php"><i class="fa fa-file-o fa-fw"></i> รายงาน</a>
                        </li>
                            <?php } ?>
                    </ul>
            
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <!-- <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
