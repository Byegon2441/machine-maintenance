<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบซ่อมบำรุงเครื่องจักร : ใบแจ้งซ่อม</title>

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

    <?php include '../Template/templsidebar.php';?>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>ใบแจ้งซ่อม</label>
                    <div class="row">
                        <label for="name" class="col-sm-5">ชื่อประเภทเครื่องจักร:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="XVVehTypeName" name="XVVehTypeName"
                                placeholder="" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-8"></div>
                        <div class="col-6 col-md-4">
                            <label for="numb">เลขที่ใบแจ้งซ่อม :<input type="text" name="numb"></label>
                        </div>
                    </div>

                        

                    <div class="row">
                        <div class="col-md-6">
                            <label for="numb">ชื่องานหรือชื่อเครื่องจักร :<input type="text" name="numb"
                                    class="form-control"></label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <label for="numb">หมายเลขเครื่องจักร :<input type="text" name="numb"
                                    class="form-control"></label>
                        </div>
                    </div>
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
                    <h1 class="page-header">ใบแจ้งซ่อม<button type="button" class="btn btn-success btn-circle"
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
                            ใบแจ้งซ่อม
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover"
                                id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>เลขที่ใบแจ้งซ่อม</th>
                                        <th>วันที่แจ้ง</th>
                                        <th>หมายเลขเครื่องจักร</th>
                                        <th>ชื่องานหรือชื่อเครื่องจักร</th>
                                        <th>สถานะ</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <?php
          include '../database/connect.php';
          $sql = " SELECT vj.XVMajDocNo , vj.XVMajWhoInformant, vj.XVMajStatus, vj.XVMaCarStatus,vj.XVMajFinishRmk, v.XVVehCode, vp.XVDptCode 
          FROM  tdoctmajob vj , tmstmdepartment vp , tmstvehicle v
          where  vj.XVMajDocNo = v.XVVehCode
          and vj.XVMajDocNo = vp.XVDptCode";
         
          
          $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
          $count = 1;
          while ($row=mysqli_fetch_array($result)){
          ?>

                                        <tr class="odd gradeA">
                                            <td><?php echo $count;?></td>
                                            <td><?php echo $row["XVMajDocNo"];?></td>
                                            <td><?php echo $row["XVMajWhoInformant"];?></td>
                                            <td><?php echo $row["XVMajStatus"];?></td>
                                            <td><?php echo $row["XVMaCarStatus"];?></td>
                                            <td><?php echo $row["XVMajFinishRmk"];?></td>
                                            <td><?php echo $row["XVVehCode"];?></td>
                                            <td><?php echo $row["XVDptCode"];?></td>
                                            <td><?php if($row['XVVehCode']==NULL){echo "ไม่สามารถระบุเครื่องจักรได้";}else {echo $row["XVVehName"];}?></td>
                                            <td style="display:none;"><?php echo $row["XVVehCode"];?></td>

                                            <td><?php if($row['XVDptCode']==NULL){echo "ไม่สามารถระบุไซต์งานได้";}else {echo $row["XVDptName"];}?></td>
                                            <td style="display:none;"><?php echo $row["XVVehCode"];?></td>

                                            <td align="center"><input class='btn btn-primary editbtn' type='button'
                                                    value='แก้ไข'></td>
                                            <td align="center"><input class='btn btn-danger deletebtn' type='button'
                                                    value='ลบ'></td>

                                        </tr>
                                        <?php $count++;}
                                        mysqli_close($connect);
                                        ?>
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