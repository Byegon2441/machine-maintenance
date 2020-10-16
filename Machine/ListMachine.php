<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ระบบซ่อมบำรุงเครื่องจักร : เครื่องจักร</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <?php include '../Template/templsidebar.php';
?>

<!-- modal แก้ไขเครื่องจักร -->

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขเครื่องจักร</h5>
                </div>
                <form class="form-horizontal" id="insert" role="form" method="POST" action="updateMachine.php"
                    enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                      <input type="hidden" name="XVVehCode" id="XVVehCode" value="">

                      <div class="form-group">
                          <label for="name" class="col-sm-4 control-label">
                              <span class="required"></span> ชื่อไซต์งาน:</label>
                          <div class="col-sm-7">
                              <select id="XVDptCode" name="XVDptCode" class="form-control">
                                  <?php
                                   include '../database/connect.php';
                                   $sql = "select * from tmstmdepartment; ";
                                   $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
                                   while ($row=mysqli_fetch_array($result)){
                                       ?>
                                  <option value="<?php echo $row["XVDptCode"];?>">
                                      <?php echo $row["XVDptname"]; ?></option>
                                  <?php
                                   }
                                  mysqli_close($connect);
                                  ?>
                              </select>
                          </div>
                      </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ชื่อประเภทเครื่องจักร:</label>
                            <div class="col-sm-7">
                                <select id="XVVehSelect" name="XVVehTypeName" class="form-control">
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
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ชื่อเครื่องจักร :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehName" name="XVVehName"
                                    style="width:100%" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ทะเบียนรถ :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehRegistration"
                                    name="XVVehRegistration" style="width:100%" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> เบอร์รถ :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehNumber" name="XVVehNumber"
                                    style="width:100%" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> เลขทะเบียน MANGO :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehMango" name="XVVehMango"
                                    style="width:100%" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ยี่ห้อ :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehBrand" name="XVVehBrand"
                                    style="width:100%" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> รุ่นรถ :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehModel" name="XVVehModel"
                                    style="width:100%" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> หมายเลขคัทซี :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehChassisNumber"
                                    name="XVVehChassisNumber" style="width:100%" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> หมายเลขเครื่อง :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehEngineNumber"
                                    name="XVVehEngineNumber" style="width:100%" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
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
<!-- modal แก้ไขเครื่องจักร -->

<!--  modal เพิ่มเครื่องจักร -->
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลเครื่องจักร</h5>
                </div>
                <div class="modal-body mx-3">
                    <form class="form-horizontal" role="form" method="post" action="insertMachine.php ">
                      <div class="form-group">
                          <label for="name" class="col-sm-4 control-label">
                              <span class="required"></span> ชื่อไซต์งาน:</label>
                          <div class="col-sm-7">
                              <select id="XVDptCode" name="XVDptCode" class="form-control">
                                  <?php
                                   include '../database/connect.php';
                                   $sql = "select * from tmstmdepartment; ";
                                   $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
                                   while ($row=mysqli_fetch_array($result)){
                                       ?>
                                  <option value="<?php echo $row["XVDptCode"];?>">
                                      <?php echo $row["XVDptname"]; ?></option>
                                  <?php
                                   }
                                  mysqli_close($connect);
                                  ?>
                              </select>
                          </div>
                      </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ชื่อประเภทเครื่องจักร:</label>
                            <div class="col-sm-7">
                                <select id="XVVehTypeName" name="XVVehTypeName" class="form-control">
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
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ชื่อเครื่องจักร :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehName" name="XVVehName"
                                    style="width:100%" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ทะเบียนรถ :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehRegistration"
                                    name="XVVehRegistration" style="width:100%" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> เบอร์รถ :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehNumber" name="XVVehNumber"
                                    style="width:100%" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> เลขทะเบียน MANGO :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehMango" name="XVVehMango"
                                    style="width:100%" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> ยี่ห้อ :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehBrand" name="XVVehBrand"
                                    style="width:100%" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> รุ่นรถ :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehModel" name="XVVehModel"
                                    style="width:100%" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> หมายเลขคัทซี :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehChassisNumber"
                                    name="XVVehChassisNumber" style="width:100%" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> หมายเลขเครื่อง :</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control nameof" id="XVVehEngineNumber"
                                    name="XVVehEngineNumber" style="width:100%" minlength="1" maxlength="100"
                                    title="YOUR_WARNING_TEXT">
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

<!-- จบเพิ่ม -->

<!-- ลบ -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">ลบประเภทเครื่องจักร</h5>
                </div>
                <form action="DeleteMachine.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        ท่านต้องการลบข้อมูลเครื่องจักรนี้หรือไม่?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger" name="deletedata">ลบข้อมูลเครื่องจักร</button>
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
                    <h1 class="page-header">เครื่องจักร
                        <button type="button" class="btn btn-success btn-circle" style="float: right;"
                            data-toggle="modal" data-target="#insertModal"><i class="fa fa-plus"></i>
                        </button>
                    </h1>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            เครื่องจักร
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table">
                                <table width="100%" class="table table-striped table-bordered table-hover"
                                    id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ลำดับที่ </th>
                                            <th>รหัสเครื่องจักร </th>
                                            <th>ชื่อเครื่องจักร</th>
                                            <th style="display:none;">ทะเบียนรถ</th>
                                            <th style="display:none;">เบอร์รถ</th>
                                            <th style="display:none;">เลขทะเบียน MANGO</th>
                                            <th style="display:none;">ยี่ห้อ</th>
                                            <th style="display:none;">รุ่นรถ</th>
                                            <th style="display:none;">หมายเลขคัทซี</th>
                                            <th style="display:none;">หมายเลขเครื่อง</th>
                                            <th>ชื่อประเภทเครื่องจักร</th>
                                            <th style="display:none;">รหัสประเภทเครื่องจักร</th>
                                            <th>ชื่อไซต์งาน</th>
                                            <th style="display:none;">รหัสไซต์งาน</th>
                                            <th>แก้ไข</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
          include '../database/connect.php';
          $sql = " SELECT v.XVVehCode,v.XVVehName,v.XVVehRegistration,v.XVVehNumber,v.XVVehMango,v.XVVehBrand,v.XVVehModel,v.XVVehChassisNumber,v.XVVehEngineNumber,vt.XVVehTypeName,v.XVVehTypeCode,v.XVDptCode,d.XVDptname
          FROM tmstvehicle v
          LEFT JOIN tmstmvehicletype vt ON v.XVVehTypeCode = vt.XVVehTypeCode
          LEFT JOIN tmstmdepartment d ON v.XVDptCode = d.XVDptCode";
          $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
          $count = 1;
          while ($row=mysqli_fetch_array($result)){
          ?>

                                        <tr class="odd gradeA">
                                            <td><?php echo $count;?></td>
                                            <td><?php echo $row["XVVehCode"];?></td>
                                            <td><?php echo $row["XVVehName"];?></td>
                                            <td style="display:none;"><?php echo $row["XVVehRegistration"];?></td>
                                            <td style="display:none;"><?php echo $row["XVVehNumber"];?></td>
                                            <td style="display:none;"><?php echo $row["XVVehMango"];?></td>
                                            <td style="display:none;"><?php echo $row["XVVehBrand"];?></td>
                                            <td style="display:none;"><?php echo $row["XVVehModel"];?></td>
                                            <td style="display:none;"><?php echo $row["XVVehChassisNumber"];?></td>
                                            <td style="display:none;"><?php echo $row["XVVehEngineNumber"];?></td>
                                            <td><?php if($row['XVVehTypeCode']==NULL){echo "ไม่สามารถระบุประเภทได้";}else {echo $row["XVVehTypeName"];}?>
                                            </td>
                                            <td style="display:none;"><?php echo $row["XVVehTypeCode"];?></td>
                                            <td><?php if($row['XVDptCode']==NULL){echo "ไม่สามารถระบุไซต์งานได้";}else {echo $row["XVDptname"];}?>
                                            <td style="display:none;"><?php echo $row["XVDptCode"];?></td>

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
                            </div>
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
    var c_g = document.getElementById('update_id');

    function PUSH_ID(c) {
        c_g.value = c;
    }

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
            $('#XVVehCode').val(data[1])
            $('#XVVehName').val(data[2])
            $('#XVVehRegistration').val(data[3])
            $('#XVVehNumber').val(data[4])
            $('#XVVehMango').val(data[5])
            $('#XVVehBrand').val(data[6])
            $('#XVVehModel').val(data[7])
            $('#XVVehChassisNumber').val(data[8])
            $('#XVVehEngineNumber').val(data[9])
            $('#XVVehTypeName').val(data[10])
            $("#XVVehSelect").val(data[11])
            $('#XVDptname').val(data[12])
            $('#XVDptCode').val(data[13]);
        })
    })
    </script>
</body>

</html>
