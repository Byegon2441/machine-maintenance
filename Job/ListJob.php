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
    <link href="../vendor/css/datepicker.css" rel="stylesheet">

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
                    <form action="" class="form-inline">
                        

                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 ml-auto">
                                <div class="col text-right">
                                    <label for="numb">เลขที่ใบแจ้งซ่อม : <input type="text" name="numb"
                                            class="form-control" disabled></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 ml-auto">
                                <div class="col text-right">
                                    <label for="numb">วันที่แจ้งซ่อม : <input type="text" name="numb"
                                            class="form-control" data-toggle="datepicker" disabled></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="col text-right">
                                    <label for="numb">ชื่อเครื่องจักร :</label>
                                    <select id="XVVehTypeName" name="XVVehTypeName" class="form-control"
                                        style="width:60%">
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
                            <div class="col-md-5">
                                <div class="col text-right">
                                    <label for="numb">หมายเลขเครื่องจักร : <input type="text" size="17" name="numb"
                                            class="form-control" disabled></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="col text-right">
                                    <label for="numb">ชื่อไชต์งาน : <input id="site" type="text" size="30" name="numb"
                                            class="form-control" disabled></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col text-right">
                                    <label for="numb">หมายเลขหน่วยงาน : <input type="text" size="17" name="numb"
                                            class="form-control" disabled></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="numb">ตำแหน่งเครื่องจักร ณ ปัจจุบัน เลขที่ :
                                    <input type="text" style="margin: 0px 10px;" size="10" name="numb"
                                        class="form-control">
                                    <input type="text" style="margin: 0px 10px;" size="10" name="numb"
                                        class="form-control">
                                    <input type="text" style="margin: 0px 10px;" size="10" name="numb"
                                        class="form-control">
                                    <input type="text" style="margin: 0px 10px;" size="10" name="numb"
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
                                        </tr>
                                    </thead>
                                    <tbody class="sub">
                                        <tr id='addr0'>
                                            <td>1</td>
                                            <td><input type="text" name="n_sub" placeholder="กรุณากรอกเรื่องที่แจ้ง">
                                            </td>
                                            <td><input type="text" name="sub" placeholder="กรุณากรอกสาเหตุ"></td>
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
                                <div class="col text-left">
                                    <label for="numb">สถานะรถ :
                                        <select name="" id="" class="form-control">
                                            <option value="">fsdfdfghdghdghdghdghdghdgh</option>
                                            <option value="">sdf</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col text-right">
                                    <label for="numb">ชื่อผู้แจ้งซ่อม : <input type="text" size="40" name="numb"
                                            class="form-control" disabled></label>
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
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">บันทึก</button>
                                    <button type="button" class="btn btn-success" data-dismiss="modal">ส่ง</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- modal insert -->

<!-- modal ed -->
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
                    <form action="" class="form-inline">
                        

                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 ml-auto">
                                <div class="col text-right">
                                    <label for="numb">เลขที่ใบแจ้งซ่อม : <input type="text" name="numb"
                                            class="form-control" disabled></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 ml-auto">
                                <div class="col text-right">
                                    <label for="numb">วันที่แจ้งซ่อม : <input type="text" name="numb"
                                            class="form-control" data-toggle="datepicker" disabled></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="col text-right">
                                    <label for="numb">ชื่อเครื่องจักร :</label>
                                    <select id="XVVehTypeName" name="XVVehTypeName" class="form-control"
                                        style="width:60%">
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
                            <div class="col-md-5">
                                <div class="col text-right">
                                    <label for="numb">หมายเลขเครื่องจักร : <input type="text" size="17" name="numb"
                                            class="form-control" disabled></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="col text-right">
                                    <label for="numb">ชื่อไชต์งาน : <input type="text" size="30" name="numb"
                                            class="form-control" disabled></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col text-right">
                                    <label for="numb">หมายเลขหน่วยงาน : <input type="text" size="17" name="numb"
                                            class="form-control" disabled></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="numb">ตำแหน่งเครื่องจักร ณ ปัจจุบัน เลขที่ :
                                    <input type="text" style="margin: 0px 10px;" size="10" name="numb"
                                        class="form-control" id="add1" disabled>
                                    <input type="text" style="margin: 0px 10px;" size="10" name="numb"
                                        class="form-control" id="add2" disabled>
                                    <input type="text" style="margin: 0px 10px;" size="10" name="numb"
                                        class="form-control" id="add3" disabled>
                                    <input type="text" style="margin: 0px 10px;" size="10" name="numb"
                                        class="form-control" id="add4" disabled></label>
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
                                        </tr>
                                    </thead>
                                    <tbody class="sub">
                                        <tr id='addr0'>
                                            <td>1</td>
                                            <td><input type="text" name="n_sub" placeholder="กรุณากรอกเรื่องที่แจ้ง">
                                            </td>
                                            <td><input type="text" name="sub" placeholder="กรุณากรอกสาเหตุ"></td>
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
                                <div class="col text-left">
                                    <label for="numb">สถานะรถ :
                                        <select name="" id="status" class="form-control" disabled>
                                            <option value="">fsdfdfghdghdghdghdghdghdgh</option>
                                            <option value="">sdf</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col text-right">
                                    <label for="numb">ชื่อผู้แจ้งซ่อม : <input type="text" size="40" name="numb"
                                            class="form-control" disabled></label>
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
                                    <button type="button" class="but btn btn-primary" id="sub" onclick="myFunction()">แก้ไข</button>
                                    <button type="button" class="but btn btn-success" id="save" disabled onclick="myFunction()">บันทึก</button>
                                    <button type="button" class="btn btn-success" data-dismiss="modal">ส่ง</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- modal ed -->

<div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ใบแจ้งซ่อม
                        <button type="button" class="btn btn-success btn-circle" style="float: right;"
                            data-toggle="modal" data-target=".bd-example-modal-lg1"><i class="fa fa-plus"></i>
                        </button>


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
                                        <td><?php if($row['XVVehCode']==NULL){echo "ไม่สามารถระบุเครื่องจักรได้";}else {echo $row["XVVehName"];}?>
                                        </td>
                                        <td style="display:none;"><?php echo $row["XVVehCode"];?></td>

                                        <td><?php if($row['XVDptCode']==NULL){echo "ไม่สามารถระบุไซต์งานได้";}else {echo $row["XVDptName"];}?>
                                        </td>
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

        <script src="../vendor/js/datepicker.js"></script>
        <script src="../vendor/js/datepicker.th-TH.js"></script>
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });

        $(function() {
            $('[data-toggle="datepicker"]').datepicker({
                //autoHide: true,
                autoPick: true,
                language: 'th-TH',
                //zIndex: 2048,
                format: 'dd/mm/yyyy'
            });
        });

        $(document).ready(function() {
            var i = 1;
            $("#add_row").click(function() {
                $('tr').find('input').prop('disabled', false)
                $('#addr' + i).html("<td>" + (i + 1) + "</td><td><input type='text' name='n_sub" + i +
                    "'  placeholder='กรุณากรอกเรื่องที่แจ้ง'/></td><td><input type='text' name='sub" +
                    i +
                    "' placeholder='กรุณากรอกสาเหตุ'/></td>"
                    );

                $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
                i++;
            });
        });

        
        </script>

        <script>
        $(function() 
            {
            $(".but").on("click", function(e) 
            {
                e.preventDefault(); // not really necessary if buttons
                $(this).prop("disabled", true);    
                if (this.id=="sub") 
                {
                // do the submit and enable other button
                $("#save").prop("disabled", false);
                $("#XVVehTypeName").prop("disabled", false);
                $("#add1").prop("disabled", false);
                $("#add2").prop("disabled", false);
                $("#add3").prop("disabled", false);
                $("#add4").prop("disabled", false);
                $("#status").prop("disabled", false);
                }
                else 
                {
                // do the save and enable other button
                $("#sub").prop("disabled", false);
                $("#XVVehTypeName").prop("disabled", true);
                $("#add1").prop("disabled", true);
                $("#add2").prop("disabled", true);
                $("#add3").prop("disabled", true);
                $("#add4").prop("disabled", true);
                $("#status").prop("disabled", true);
                }
            });
        });

        </script>

</body>

</html>