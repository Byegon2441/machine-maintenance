<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบซ่อมบำรุงเครื่องจักร : ไซต์งาน</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
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
  
    if($_SESSION['XVPrgCode'] == 'P-03'){

        if(in_array("M-000040",$_SESSION['menu']) ){
include '../Template/templsidebar.php';
include "../database/connect.php";?>

<!--  modal เพิ่มประเภทเครื่องจักร -->
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลไซต์งาน</h5>
                </div>
                <form class="form-horizontal" id="insert" role="form" method="POST"
                    action="insertDepartment.php" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ชื่อไซต์งาน:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="depname" name="depname" placeholder=""
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> เลขที่:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="depnumber" name="depnumber" placeholder=""
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ตำบล:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="depdistrict" name="depdistrict" placeholder=""
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> อำเภอ:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="depsub" name="depsub" placeholder=""
                                    required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> จังหวัด:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="depprovince" name="depprovince" placeholder=""
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
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลไซต์งาน</h5>
                </div>
                <form class="form-horizontal" id="insert" role="form" method="POST"
                    action="updateDep.php" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                        <input type="hidden" name="XVJtyCode" id="XVJtyCode">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ชื่อไซต์งาน:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="XVJtyName" name="XVJtyName"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> เลขที่:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="XVDptNumber" name="XVDptNumber"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> อำเภอ:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="XVDptDistrict" name="XVDptDistrict"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ตำบล:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="XVDptSub-district" name="XVDptSub-district"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> จังหวัด:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="XVDptProvince" name="XVDptProvince"
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
                    <h5 class="modal-title" id="exampleModalLabel">ลบไซต์งาน</h5>
                </div>
                <form action="deleteDep.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="delete_id" id="delete_id">
                    ท่านต้องการลบไซต์งานนี้หรือไม่?<br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-danger" name="deletedata">ลบไซต์งาน</button>
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
                    <h1 class="page-header">ไซต์งาน<button type="button" class="btn btn-success btn-circle"
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
                                ไซต์งาน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>รหัสไซต์งาน</th>
                                        <th>ชื่อไซต์งาน</th>
                                        <th>วันที่เริ่ม</th>
                                        <th>วันที่สิ้นสุด</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
    $sql = " SELECT *
    FROM TMstMProject_202012080859 ";
    $result = $dbh->query($sql);
    $count = 1;
    while ($row=$result->fetch(PDO::FETCH_ASSOC)){
?>
                                    <tr class="odd gradeA">
                                        <td><?php echo $count;?></td>
                                        <td><?php echo $row["XVPrjCode"];?></td>
                                        <td><?php echo $row["XVPrjName"];?></td>
                                        <td><?php echo $row["XDPrjStartDate"];?></td>
                                        <td><?php echo $row["XDPrjEndDate"];?></td>
                                        
                                        <td align="center"><input class='btn btn-primary editbtn' type='button'
                                                value='แก้ไข'></td>
                                        <td align="center"><input class='btn btn-danger deletebtn' type='button'
                                                value='ลบ'></td>
                                    </tr>
                                    <?php $count++;}
                                    $dbh = null;
                                }else{//if check menu
                                    echo '<script>';
                                echo "Swal.fire({
                                    title: 'แจ้งเตือน',
                                    text: 'คุณไม่มีสิทธ์เข้าถึงเมนูนี้',
                                    icon: 'warning',
                                    confirmButtonText: 'Back'
                                    }).then(function() {
                                        window.history.back();
                                });";
                                echo '</script>';
                                }
            
                                }else{
                                //if check program
                                echo '<script>';
                                echo "Swal.fire({
                                title: 'คุณยังไม่ได้ลงชื่อเข้าใช้!',
                                text: 'กรุณาลงชื่อเข้าใช้',
                                icon: 'warning',
                                confirmButtonText: 'Back'
                                }).then(function() {
                                window.location = '../Login/login.php';
                                });";
                                echo '</script>';
                                }
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
            $('#XVJtyCode').val(data[1])
            $('#XVJtyName').val(data[2])
            $('#XVDptNumber').val(data[3])
            $('#XVDptDistrict').val(data[4])
            $('#XVDptSub-district').val(data[5])
            $('#XVDptProvince').val(data[6])
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
