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
?>

     <!-- modal แก้ไขเครื่องจักร -->

     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขเครื่องจักร</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" id="insert" role="form" method="POST"
                    action="../database/updateMachine.php" enctype="multipart/form-data">


                    <div class="modal-body mx-3">
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="form-group">
                        <div class="col-lg-5">
                                <label for="inputEmail4">ชื่อประเภทเครื่องจักร : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <select id="cars" name="XVVehTypeName">
                                    <?php
                                     include '../database/connect.php';
                                     $sql = "select * from tmstmvehicletype; ";
                                     $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
                                     while ($row=mysqli_fetch_array($result)){
                                         ?>
                                    <option value="<?php echo $row["XVVehTypeCode"];?>">
                                        <?php echo $row["XVVehTypeName"]; ?></option>
                                    <?php
                                     }
                                    mysqli_close($connect);


                                    ?>

                                </select>
                            </div>




                            <div class="col-lg-5">
                                <label for="inputEmail4">ชื่อเครื่องจักร : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehName" name="XVVehName"
                                    style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">ทะเบียนรถ : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehRegistration"
                                    name="XVVehRegistration" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1"
                                    maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">เบอร์รถ : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehNumber" name="XVVehNumber"
                                    style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">เลขทะเบียน MANGO : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehMango" name="XVVehMango"
                                    style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">ยี่ห้อ : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehBrand" name="XVVehBrand"
                                    style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">รุ่นรถ : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehModel" name="XVVehModel"
                                    style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">เลขคัทซี : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehChassisNumber"
                                    name="XVVehChassisNumber" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1"
                                    maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">เลขเครื่อง : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehEngineNumber"
                                    name="XVVehEngineNumber" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1"
                                    maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>


                        </div>
                </div>


                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <input type="submit" value="แก้ไข" name="updatedata" class="btn btn-primary">
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--  modal เพิ่มประเภทเครื่องจักร -->
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มเครื่องจักร</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form class="form-horizontal" role="form" method="post" action="../database/insertMachine.php ">
                        <div class="form-group">

                            <div class="col-lg-5">
                                <label for="inputEmail4">ชื่อประเภทเครื่องจักร : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <select id="cars" name="XVVehTypeName">
                                    <?php
                                     include '../database/connect.php';
                                     $sql = "select * from tmstmvehicletype; ";
                                     $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
                                     while ($row=mysqli_fetch_array($result)){
                                         ?>
                                    <option value="<?php echo $row["XVVehTypeCode"];?>">
                                        <?php echo $row["XVVehTypeName"]; ?></option>
                                    <?php
                                     }
                                    mysqli_close($connect);


                                    ?>

                                </select>
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">ชื่อเครื่องจักร : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehName" name="XVVehName"
                                    style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">ทะเบียนรถ : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehRegistration"
                                    name="XVVehRegistration" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1"
                                    maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">เบอร์รถ : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehNumber" name="XVVehNumber"
                                    style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">เลขทะเบียน MANGO : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehMango" name="XVVehMango"
                                    style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">ยี่ห้อ : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehBrand" name="XVVehBrand"
                                    style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">รุ่นรถ : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehModel" name="XVVehModel"
                                    style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">เลขคัทซี : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehChassisNumber"
                                    name="XVVehChassisNumber" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1"
                                    maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>

                            <div class="col-lg-5">
                                <label for="inputEmail4">เลขเครื่อง : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVVehEngineNumber"
                                    name="XVVehEngineNumber" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1"
                                    maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>


                        </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" value="ยืนยัน" class="btn btn-primary">
                </div>
                </form>
            </div>

        </div>
    </div>
    </div>
    <!-- จบการสร้าง Modal -->





    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">เครื่องจักร

                        <!-- ปุ่มเพิ่มข้อมูล -->

                        <button type="button" class="btn btn-success btn-circle" style="float: right;"
                            data-toggle="modal" data-target="#insertModal"><i class="fa fa-plus"></i>
                        </button>
                    </h1>

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
                            <div class="table">
                                <table width="180%" class="table table-striped table-bordered table-hover"
                                    id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ลำดับที่ </th>
                                            <th>รหัสเครื่องจักร </th>

                                            <th>ชื่อเครื่องจักร</th>
                                            <th>ทะเบียนรถ</th>
                                            <th>เบอร์รถ</th>
                                            <th>เลขทะเบียน MANGO</th>
                                            <th>ยี่ห้อ</th>
                                            <th>รุ่นรถ</th>
                                            <th>เลขคัทซี</th>
                                            <th>เลขเครื่อง</th>
                                            <th>ชื่อประเภทเครื่องจักร</th>
                                            <th>แก้ไข</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
          include '../database/connect.php';
          $sql = " SELECT v.XVVehCode,v.XVVehName,v.XVVehRegistration,v.XVVehNumber,v.XVVehMango,v.XVVehBrand,v.XVVehModel,v.XVVehChassisNumber,v.XVVehEngineNumber,vt.XVVehTypeName
          FROM tmstvehicle v
          LEFT JOIN tmstmvehicletype vt
          ON  v.XVVehTypeCode = vt.XVVehTypeCode";
    $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
    $count = 1;
    while ($row=mysqli_fetch_array($result)){
      ?>

                                        <tr class="odd gradeA">
                                            <td><?php echo $count;?></td>
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

                                            <!-- แก้ไข -->
                                            <td align="center"><input class='btn btn-primary' type='button'
                                                    value='แก้ไข' data-toggle="modal" data-target="#exampleModal"></td>

                                            <!--ลบ -->
                                            <td align="center"><a
                                                    href="../database/DeleteMachine.php?id=<?php echo $row["XVVehCode"];?>"
                                                    class='btn btn-danger'>ลบ</a></td>

                                        </tr>

                                        <?php $count++;}
                                        mysqli_close($connect);
                                        ?>


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
            "scrollY": true,
            "scrollX": true
        });
    });
    </script>

</body>

</html>