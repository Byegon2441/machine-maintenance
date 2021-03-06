<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบซ่อมบำรุงเครื่องจักร : ประเภทอะไหล่</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include '../Template/templsidebar.php';
    include "../database/connect.php";
    ?>

<!--  modal เพิ่มประเภทเครื่องจักร -->
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลประเภทอะไหล่</h5>
                </div>
                <form class="form-horizontal" id="insert" role="form" method="POST"
                    action="insertListTypeMachineParts.php" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ชื่อประเภทอะไหล่:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder=""
                                    required>
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
<!-- จบการสร้าง Modal -->

<!--  modal แก้ไขชื่อเครื่องจักร -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลประเภทอะไหล่</h5>
                </div>
                <form class="form-horizontal" id="insert" role="form" method="POST"
                    action="updateListTypeMachineParts.php" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ชื่อประเภทอะไหล่:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="XVMachinePartsTypeName" name="XVMachinePartsTypeName"
                                    placeholder="" required>
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
<!-- จบการสร้าง Modal -->

<!-- ลบ -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">ลบประเภทอะไหล่</h5>
                </div>
                <form action="deleteListTypeMachineParts.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="delete_id" id="delete_id">
                    ท่านต้องการลบประเภทอะไหล่นี้หรือไม่?<br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-danger" name="deletedata">ลบประเภทอะไหล่</button>
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
                    <h1 class="page-header">ประเภทอะไหล่<button type="button" class="btn btn-success btn-circle"
                            style="float: right;" data-toggle="modal" data-target="#insertModal"><i
                                class="fa fa-plus"></i>
                        </button></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ประเภทอะไหล่
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover"
                                id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ลำดับที่</th>
                                        <th>รหัสประเภทอะไหล่</th>
                                        <th>ชื่อประเภทอะไหล่</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
    $sql = "SELECT ty.XVMachinePartsTypeCode,ty.XVMachinePartsTypeName
    FROM tmstmmachine_parts_type ty";
    $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
    $count = 1;
    while ($row=mysqli_fetch_array($result)){
?>
                                    <tr class="odd gradeA">
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row["XVMachinePartsTypeCode"];?></td>
                                        <td><?php echo $row["XVMachinePartsTypeName"];?></td>

                                        <td align="center"><input class='btn btn-primary editbtn' type='button'
                                                value='แก้ไข'></td>
                                        <td align="center"><input class='btn btn-danger deletebtn' type='button'
                                                value='ลบ'></td>
                                    </tr>
                                    <?php $count++;} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            "scrollY": true,
            "scrollX": true
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
            $('#update_id').val(data[1])
            $('#XVMachinePartsTypeName').val(data[2])
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
