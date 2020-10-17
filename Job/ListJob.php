<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ระบบซ่อมบำรุงเครื่องจักร : ใบแจ้งซ่อม</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/css/datepicker.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style>
    table td {
        position: relative;
    }

    table td input {
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        margin: 0;
        height: 100%;
        width: 100%;
        border: none;
        padding: 10px;
        box-sizing: border-box;
    }

    .my-custom-scrollbar {
        position: relative;
        height: 200px;
        overflow: auto;
    }

    .table-wrapper-scroll-y {
        display: block;
    }
    </style>

</head>
<body>


<?php include '../Template/templsidebar.php';?>


    <!-- modal cancle -->

    <div class="modal fade" id="cancleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">ยกเลิกใบแจ้งซ่อม</h5>
                </div>
                <form action="cancleMajor.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="cancle_id" id="cancle_id">
                        ท่านต้องการยกเลิกใบแจ้งซ่อมนี้หรือไม่?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">กลับ</button>
                        <button type="submit" class="btn btn-danger" name="cancle">ยกเลิกใบแจ้งซ่อม</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal cancle -->

<div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ใบแจ้งซ่อม
                        <a  class="btn btn-success btn-circle" style="float: right;" href="insertMajor.php"
                            ><i class="fa fa-plus"></i>
                        </a>


                        </button>
                    </h1>
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
                                            <th>ชื่อเครื่องจักร</th>
                                            <th>สถานะใบแจ้งซ่อม</th>
                                            <th>สถานะเอกสาร</th>
                                           
                                            <th>รายละเอียด</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <?php
          include '../database/connect.php';
          $sql = " SELECT m.XVMajDocNo, d.XDMajDate, m.XVVehCode, v.XVVehName, m.XVMajStatus, m.XVMajDocStatus 
          FROM  tdoctmajob m, tdoctmajobdate d, tmstvehicle v
          WHERE m.XVMajDocNo = d.XVMajDocNo 
          AND m.XVVehCode = v.XVVehCode;"; //ตัวสมบูรณ์
        //   $sql = " SELECT m.XVMajDocNo, m.XVVehCode, v.XVVehName, m.XVMajStatus FROM tdoctmajob m, tmstvehicle v WHERE m.XVVehCode = v.XVVehCode ";
        //   ตัวทดสอบ
         
          
          $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
          $count = 1;
          while ($row=mysqli_fetch_array($result)){
          ?>

                                    <tr class="odd gradeA">
                                        <td><?php echo $row["XVMajDocNo"];?></td>
                                        <td><?php echo $row["XDMajDate"];?></td>
                                        <td><?php echo $row["XVVehCode"];?></td>
                                        <td><?php echo $row["XVVehName"];?></td>
                                        <td><?php echo $row["XVMajStatus"];?></td>
                                        <td><?php if($row["XVMajDocStatus"] == 1){
                                            echo 'แบบร่าง';
                                            }else if($row["XVMajDocStatus"] == 2){
                                                echo 'ส่งแล้ว';
                                            }else{
                                                echo 'ยกเลิก'; 
                                            } ?></td>
                                           

                                    <?php if($row["XVMajDocStatus"]==1){

                                        ?>
                                        <td align="center"><a class='btn btn-primary editbtn' href="editMajor.php?id=<?php echo $row["XVMajDocNo"] ?>"
                                                >รายละเอียด</a></td>
                                                <td align="center"><button class='btn btn-danger canclebtn' type='button'
                                                >ยกเลิก</button></td>
                                    <?php }else if($row["XVMajDocStatus"]==2){ ?>
                                        <td align="center"><a class='btn btn-primary editbtn' href="showMajor.php?id=<?php echo $row["XVMajDocNo"] ?>"
                                                >รายละเอียด</a></td>
                                                <td align="center"><button class='btn btn-danger canclebtn' type='button'
                                                >ยกเลิก</button></td>
                                                
                                    <?php }else{ ?>
                                        <td align="center"><a class='btn btn-primary editbtn' href="showMajor.php?id=<?php echo $row["XVMajDocNo"] ?>"
                                                >รายละเอียด</a></td>
                                                <td></td>
                                    <?php } ?>
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

        <script src="../vendor/js/datepicker.js"></script>
        <script src="../vendor/js/datepicker.th-TH.js"></script>
        <script>
        function addNo(a) {
            let j = a
            $("#add_row1").click(() => {
                $('tr').find('input').prop('disabled', false)
                $('#addrr' + j).html("<td>" + (j + 1) +
                    "</td><td><input type='text' name='n_subb[]'  placeholder='กรุณากรอกเรื่องที่แจ้ง'/></td><td><input type='text' name='subb[]' placeholder='กรุณากรอกสาเหตุ'/></td><td><button type='button' id='add_row1' class='btn btn-danger btn-circle increase-row RemoveRow'><i class='fa fa-minus'></button></td>"
                );

                $('#tab_logic2').append('<tr id="addrr' + (j + 1) + '"></tr>');
                j++;
            });
        }
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });

        $(document).ready(function() {
            $('.canclebtn').on('click', function() {
                $('#cancleModal').modal('show')
                $tr = $(this).closest('tr')

                var data = $tr.children("td").map(function() {
                    return $(this).text()
                }).get()

                console.log(data)
                $('#cancle_id').val(data[0])
            })
        })
    })
        </script>

</body>
</html>