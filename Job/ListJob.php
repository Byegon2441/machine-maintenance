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

    <!-- modal insert -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดใบแจ้งซ่อม</h5>
                </div>
                <div class="modal-body">
                    <label>ใบแจ้งซ่อม</label>
                    <form action="insertMajor.php" class="form-inline" method="POST">
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 ml-auto">
                                <div class="col text-right">
                                    <label for="numb">วันที่แจ้งซ่อม : <input type="text" name="numb"
                                            class="form-control" data-toggle="datepicker" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="col text-right">
                                    <label for="numb">ชื่อเครื่องจักร :</label>
                                    <select id="XVVehName" name="XVVehName" class="form-control" style="width:60%">
                                        <?php
                                     include '../database/connect.php';
                                     $sql = "select * from tmstvehicle; ";
                                     $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
                                     while ($row=mysqli_fetch_array($result)){
                                         ?>
                                        <option value="<?php echo $row["XVVehCode"];?>">
                                            <?php echo $row["XVVehName"]; ?></option>
                                        <?php
                                     }
                                    mysqli_close($connect);
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col text-right">
                                    <label for="numb">หมายเลขเครื่องจักร : <input type="text" size="17" name="noof"
                                            class="form-control" id="noof" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="col text-right">
                                    <label for="numb">ชื่อไชต์งาน : <input type="text" size="30" name="dname" id="dname"
                                            class="form-control" readonly></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col text-right">
                                    <label for="numb">หมายเลขหน่วยงาน : <input type="text" size="17" name="dcode"
                                            id="dcode" class="form-control" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="numb">ตำแหน่งเครื่องจักร ณ ปัจจุบัน เลขที่ :
                                    <input type="text" style="margin: 0px 10px;" size="10" name="dnum" id="dnum"
                                        class="form-control">
                                    <input type="text" style="margin: 0px 10px;" size="10" name="dsub" id="dsub"
                                        class="form-control">
                                    <input type="text" style="margin: 0px 10px;" size="10" name="ddis" id="ddis"
                                        class="form-control">
                                    <input type="text" style="margin: 0px 10px;" size="10" name="dpro" id="dpro"
                                        class="form-control"></label>
                            </div>
                        </div>

                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">รายละเอียดการแจ้งซ่อม</h3>
                            </div>
                            <table>

                            </table>

                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table-bordered" id="tab_logic">
                                    <thead>
                                        <tr>
                                            <th style="background:#CCCCCC;">#</th>
                                            <th style="background:#CCCCCC;">เรื่องที่แจ้ง</th>
                                            <th style="background:#CCCCCC;">สาเหตุที่ทราบ</th>
                                            <th style="background:#CCCCCC;"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="sub">
                                        <tr id='addr0'>
                                            <td>1</td>
                                            <td><input type="text" name="n_sub[]" placeholder="กรุณากรอกเรื่องที่แจ้ง">
                                            </td>
                                            <td><input type="text" name="sub[]" placeholder="กรุณากรอกสาเหตุ"></td>
                                            <td><button type="button"
                                                    class="btn btn-danger btn-circle increase-row RemoveRow btndis"><i
                                                        class="fa fa-minus"></button></td>
                                        </tr>
                                        <tr id='addr1'></tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-body" style="margin:0px;">
                                <button type="button" id="add_row" class="btn btn-success btn-circle add-row"
                                    style="float:right;" title="คลิกเพื่อเพิ่มแถว"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <div class="col text-right">
                                    <label for="numb">ชื่อผู้แจ้งซ่อม : <input type="text" size="40" name="nameofuser"
                                            id="nameofuser" value="ธุรการ" class="form-control" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="col-md-6">
                                <div class="col text-left">
                                    <button type="button" class="btn btn-danger mr-auto">กลับ</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col text-right">
                                    <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">บันทึก</button> -->
                                    <input type="submit" class="btn btn-success" value="บันทึก">
                                    <!-- <button type="submit" class="btn btn-success" data-dismiss="modal">ส่ง</button> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal insert -->


    <!-- modal update -->
    <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดใบแจ้งซ่อม</h5>
                </div>
                <div class="modal-body">
                    <label>ใบแจ้งซ่อม</label>


                    <form action="updateMajor.php" class="form-inline" method="POST" id="formcancle">


                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 ml-auto">
                                <div class="col text-right">
                                    <label for="numb">เลขที่ใบแจ้งซ่อม : <input type="text" name="XVMajDocNoo"
                                            id="jobid" class="form-control" readonly></label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 ml-auto">
                                <div class="col text-right">
                                    <label for="numb">ทดสอบ : <input type="text" name="XVMajDocNo" id="testjson"
                                            class="form-control" readonly></label>
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 ml-auto">
                                <div class="col text-right">
                                    <label for="numb">วันที่แจ้งซ่อม : <input type="text" name="numb" id="jobdate"
                                            class="form-control" data-toggle="datepicker" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="col text-right">
                                    <label for="numb">ชื่อเครื่องจักร :</label>
                                    <select id="vehcode" name="XVVehName" class="form-control" style="width:60%">
                                        <?php
                                     include '../database/connect.php';
                                     $sql = "select * from tmstvehicle; ";
                                     $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
                                     while ($row=mysqli_fetch_array($result)){
                                         ?>
                                        <option value="<?php echo $row["XVVehCode"];?>">
                                            <?php echo $row["XVVehName"]; ?></option>
                                        <?php
                                     }
                                    mysqli_close($connect);
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col text-right">
                                    <label for="numb">หมายเลขเครื่องจักร : <input type="text" size="17" name="noof"
                                            id="vehcode2" class="form-control" id="noof" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="col text-right">
                                    <label for="numb">ชื่อไชต์งาน : <input type="text" size="30" name="dname"
                                            id="department_name" class="form-control" readonly></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col text-right">
                                    <label for="numb">หมายเลขหน่วยงาน : <input type="text" size="17" name="dcode"
                                            id="department_id" class="form-control" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="numb">ตำแหน่งเครื่องจักร ณ ปัจจุบัน เลขที่ :
                                    <input type="text" style="margin: 0px 10px;" size="10" name="dnum" id="number"
                                        class="form-control">
                                    <input type="text" style="margin: 0px 10px;" size="10" name="dsub" id="sub"
                                        class="form-control">
                                    <input type="text" style="margin: 0px 10px;" size="10" name="ddis" id="dis"
                                        class="form-control">
                                    <input type="text" style="margin: 0px 10px;" size="10" name="dpro" id="pro"
                                        class="form-control"></label>
                            </div>
                        </div>

                        <div class="panel panel-default" style="margin-top:20px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">รายละเอียดการแจ้งซ่อม</h3>
                            </div>

                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table-bordered" id="tab_logic2">
                                    <thead>
                                        <tr>
                                            <th style="background:#CCCCCC;">#</th>
                                            <th style="background:#CCCCCC;">เรื่องที่แจ้ง</th>
                                            <th style="background:#CCCCCC;">สาเหตุที่ทราบ</th>
                                            <th style="background:#CCCCCC;"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="sub" id="div1">
                                        <tr id='addrr0'>
                                            <td>1</td>
                                            <td><input type="text" name="n_subb[]" placeholder="กรุณากรอกเรื่องที่แจ้ง">
                                            </td>
                                            <td><input type="text" name="subb[]" placeholder="กรุณากรอกสาเหตุ"></td>
                                            <td><button type="button"
                                                    class="btn btn-danger btn-circle increase-row RemoveRow btndis"><i
                                                        class="fa fa-minus"></button></td>
                                        </tr>
                                        <tr id='addrr1'></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-body" style="margin:0px;">
                                <button type="button" id="add_row1"
                                    class="btn btn-success btn-circle increase-row btndis" style="float:right;"
                                    title="คลิกเพื่อเพิ่มแถว"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <div class="col text-right">
                                    <label for="numb">ชื่อผู้แจ้งซ่อม : <input type="text" size="40" name="nameofuser"
                                            id="nameofuser" value="ธุรการ" class="form-control" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="col-md-6">
                                <div class="col text-left">
                                    <button type="button" class="btn btn-danger mr-auto">กลับ</button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col text-right">
                                    <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">บันทึก</button> -->
                                    <input type="submit" class="btn btn-success btndis" value="บันทึก">
                                    <!-- <button type="submit" class="btn btn-success" data-dismiss="modal">ส่ง</button> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal update -->


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
    
        </script>

</body>
</html>