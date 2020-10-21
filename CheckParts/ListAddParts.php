<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบซ่อมบำรุงเครื่องจักร</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php include '../Template/temTechnician.php';
    include "../database/connect.php";
    ?>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รายการแจ้งซ่อม</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ใบแจ้งซ่อม
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover"
                                id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>เลขที่ใบแจ้งซ่อม</th>
                                        <th>วันที่แจ้ง</th>
                                        <th>หมายเลขเครื่อง</th>
                                        <th>ชื่อเครื่องจักร</th>
                                        <th>สถานะ</th>
                                        <th>จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
    $sql = "SELECT tj.XVMajDocNo,tj.XVMaCarStatus,tv.XVVehEngineNumber,tv.XVVehName,td.XDMajDate
    FROM tdoctmajob tj,tmstvehicle tv,tdoctmajobdate td
    WHERE tj.XVVehCode = tv.XVVehCode
    AND tj.XVMajDocNo = td.XVMajDocNo
    AND tj.XVMajDocStatus = 2";
    $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
    $count = 1;
    while ($row=mysqli_fetch_array($result)){
?>
                                    <tr class="odd gradeA">
                                        <td><?php echo $row["XVMajDocNo"];?></td>
                                        <td><?php echo $row["XDMajDate"];?></td>
                                        <td><?php echo $row["XVVehEngineNumber"];?></td>
                                        <td><?php echo $row["XVVehName"];?></td>
                                        <td><?php echo $row["XVMaCarStatus"];?></td>
                                  <?php
                                        if($row["XVMaCarStatus"] == "รอนำรถประเมินอะไหล่"){
                                   ?>
                                        <!--td align="center"><input class='btn btn-primary' type='button'
                                            value='จัดการ></td-->
                                        <td align="center">
                                        <a class='btn btn-primary editbtn' href="addDataCheck.php?id=<?php echo $row["XVMajDocNo"] ?>"
                                            >จัดการ</a>
                                        </td>
                                  <?php
                                  }
                                        else if($row["XVMaCarStatus"] == "รออนุมัติซ่อม"){
                                      ?>
                                      <!--td align="center"><input class='btn btn-primary' type='button'
                                          value='จัดการ'></td-->
                                          <td align="center">
                                          <a class='btn btn-primary editbtn' href="addEngiCheck.php?id=<?php echo $row["XVMajDocNo"] ?>"
                                              >จัดการ</a>
                                          </td>
                                      <?php
                                        }
                                   ?>
                                    </tr>
                                    <?php $count++;}
                                    mysqli_close($connect); ?>
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
