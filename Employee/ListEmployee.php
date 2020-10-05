<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบซ่อมบำรุงเครื่องจักร : พนักงาน</title>

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

    <?php include '../Template/templsidebar.php';
    include '../database/connect.php';?>

<!-- model emp insert -->
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลพนักงานใหม่</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" id="insert" role="form" method="POST"
                    action="insertEmp.php" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> รหัสประจำตัว :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="id" name="id" placeholder="AUTO-GEN"
                                    required disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ชื่อ :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> นามสกุล :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> เลขที่บัตรประชาชน :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="number" name="number" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ตำแหน่ง :</label>
                            <div class="col-sm-7">
                                <select id="role" name="role" class="form-control">
                                    <option value="0" selected>Choose...</option>
                                    <option value="ช่าง" >ช่าง</option>
                                    <option value="ธุรการ" >ธุรการ</option>
                                    <option value="แอดมิน" >แอดมิน</option>
                                    <option value="หัวหน้าช่าง" >หัวหน้าช่าง</option>
                                    <option value="ผู้บริหาร" >ผู้บริหาร</option>
                                </select>
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
<!-- end -->

<!-- model emp del -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ลบพนักงาน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="deleteEmp.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        ท่านต้องการลบพนักงานนี้หรือไม่?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger" name="deletedata">ลบพนักงาน</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- end -->

<!-- model emp edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลพนักงาน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" id="insert" role="form" method="POST"
                    action="updateEmp.php" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                        <input type="hidden" name="XVEpyCode" id="XVEpyCode">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ชื่อ:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="XVEpyFirstname" name="XVEpyFirstname"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> นามสกุล:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="XVpyLastname" name="XVpyLastname"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> เลขที่บัตรประชาชน:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="XVIdCardNumber" name="XVIdCardNumber"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ตำแหน่ง :</label>
                            <div class="col-sm-7">
                            <select id="role" name="XVEpyJobPosition" class="form-control">
                                    <option value="0" selected>Choose...</option>
                                    <option value="ช่าง" >ช่าง</option>
                                    <option value="ธุรการ" >ธุรการ</option>
                                    <option value="แอดมิน" >แอดมิน</option>
                                    <option value="หัวหน้าช่าง" >หัวหน้าช่าง</option>
                                    <option value="ผู้บริหาร" >ผู้บริหาร</option>
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
<!-- end -->

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">พนักงาน<button type="button" class="btn btn-success btn-circle"
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
                            พนักงาน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover"
                                id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รหัสพนักงาน</th>
                                        <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>เลขที่บัตรประชาชน</th>
                                        <th>ตำแหน่ง</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
<?php
    $sql = " SELECT *
    FROM tmstmtemployee";
    $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
    $count = 1;
    while ($row=mysqli_fetch_array($result)){
?>
                                    <tr class="odd gradeA">
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row["XVEpyCode"];?></td>
                                        <td><?php echo $row["XVEpyFirstname"];?></td>
                                        <td><?php echo $row["XVpyLastname"];?></td>
                                        <td><?php echo $row["XVIdCardNumber"];?></td>
                                        <td><?php echo $row["XVEpyJobPosition"];?></td>

                                        <td align="center"><input class='btn btn-primary editbtn' type='button'
                                                value='แก้ไข'></td>
                                        <td align="center"><input class='btn btn-danger deletebtn' type='button'
                                                value='ลบ'></td>
                                    </tr>
                                    <?php $count++;} ?>
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
            // "scrollY": true,
            // "scrollX": true
        });
    });

    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $('#editModal').modal('show')
            $tr = $(this).closest('tr')

            var data = $tr.children("td").map(function() {
                return $(this).text()
            }).get()

            console.log(data)
            $('#XVEpyCode').val(data[1])
            $('#XVEpyFirstname').val(data[2])
            $('#XVpyLastname').val(data[3])
            $('#XVIdCardNumber').val(data[4])
            $('#XVEpyJobPosition').val(data[5])
        })
    })
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
    </script>

</body>

</html>