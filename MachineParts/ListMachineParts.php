<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบซ่อมบำรุงเครื่องจักร : อะไหล่</title>

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

<!--  modal insertMachinePart -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลอะไหล่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" id="insert" role="form" method="POST"
                action="insertMachineParts.php" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">
                            <span class="required"></span> ชื่ออะไหล่ :</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="INSERTXVMachinePartsName" name="XVMachinePartsName" placeholder=""
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">
                            <span class="required"></span> ชื่อประเภทอะไหล่ :</label>
                        <div class="col-sm-5">
                          <div class="form-group col-lg-6">
                            <select id="" name="XVMachinePartsTypeCode" class="form-control" style="width : auto;">
                                  <?php
                                   include '../database/connect.php';

                                   $sql = "SELECT * FROM tmstmmachine_parts_type";
                                   $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
                                   while ($row=mysqli_fetch_array($result)){
                                       ?>
                                  <option value="<?php echo $row["XVMachinePartsTypeCode"];?>"><?php echo $row["XVMachinePartsTypeName"]; ?></option>
                                  <?php
                                   }
                                  mysqli_close($connect);
                                  ?>
                              </select>
                          </div>
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
<!-- end Modal -->

<!-- modal updateListMachineParts -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขอะไหล่</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" id="insert" role="form" method="POST"
                    action="updateListMachineParts.php" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                        <input type="hidden" name="XVMachinePartsCode" id="XVMachinePartsCode" value="">
                        <div class="form-group">
                            <div class="col-lg-5">
                                <label for="inputEmail4">ชื่ออะไหล่ : </label>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="text" class="form-control nameof" id="XVMachinePartsName" name="XVMachinePartsName"
                                    style="width:120%" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>
                            <div class="col-lg-5">
                                <label for="inputEmail4">ชื่อประเภทอะไหล่ : </label>
                            </div>
                            <div class="form-group col-lg-6">

                                <select id="XVVehSelect" name="idcode" class="form-control">
                                    <?php
                                     include '../database/connect.php';

                                     $sql = "SELECT * FROM tmstmmachine_parts_type";
                                     $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
                                     while ($row=mysqli_fetch_array($result)){
                                         ?>
                                    <option value="<?php echo $row["XVMachinePartsTypeCode"];?>"><?php echo $row["XVMachinePartsTypeName"]; ?></option>
                                    <?php
                                     }
                                    mysqli_close($connect);
                                    ?>
                                </select>
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

<!-- end Modal -->

<!-- ลบ -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ลบรายการอะไหล่</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="deleteListMachineParts.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                          ท่านต้องการลบข้อมูลอะไหล่นี้หรือไม่?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger" name="deletedata">ลบรายการข้อมูลอะไหล่</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- จบลบ -->

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">อะไหล่<button type="button" class="btn btn-success btn-circle"
                        style="float: right;" data-toggle="modal" data-target="#insertModal"><i
                            class="fa fa-plus"></i></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                            อะไหล่
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รหัสอะไหล่</th>
                                        <th>ชื่ออะไหล่</th>
                                        <th>ชื่อประเภทอะไหล่</th>
                                        <th style="display:none;">ชื่อประเภทเครื่องจักร</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  <?php   include '../database/connect.php';
                                  $sql = "SELECT p.XVMachinePartsCode,p.XVMachinePartsName,p.XVMachinePartsTypeCode,pt.XVMachinePartsTypeName AS XVMPTN
                                  FROM tmstmmachine_parts p
                                  LEFT JOIN tmstmmachine_parts_type pt
                                  ON p.XVMachinePartsTypeCode = pt.XVMachinePartsTypeCode";
                                  $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
                                  $count = 1;
                                  while ($row=mysqli_fetch_array($result)){
                                  ?>
                                    <tr class="odd gradeA">
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $row["XVMachinePartsCode"];?></td>
                                    <td><?php echo $row["XVMachinePartsName"];?></td>
                                    <td><?php if($row['XVMachinePartsTypeCode']==NULL){echo "ไม่สามารถระบุประเภทได้";}else {echo $row["XVMPTN"];}?></td>
                                    <td style="display:none;"><?php echo $row["XVMachinePartsTypeCode"];?></td>

                                    <td align="center"><input class='btn btn-primary editbtn' type='button' value='แก้ไข'></td>
                                    <td align="center"><input class='btn btn-danger deletebtn' type='button' value='ลบ'></td>

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
                "scrollY": true,
                "scrollX": true
            });
        });
        $(document).ready(function() {
            $('.deletebtn').on('click', function() {
                $('#deleteModal').modal('show')
                $tr = $(this).closest('tr')

                var data = $tr.children("td").map(function() {
                    return $(this).text()
                }).get()

                console.log(data)
                $('#delete_id').val(data[1])
            })
        })
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#editModal').modal('show')
                $tr = $(this).closest('tr')

                var data = $tr.children("td").map(function() {
                    return $(this).text()
                }).get()

                console.log(data)
                $('#XVMachinePartsCode').val(data[1])
                $('#XVMachinePartsName').val(data[2])
                $("#XVMPTN").val(data[3])
                $("#XVVehSelect").val(data[4])
            })
        })
    </script>

</body>

</html>
