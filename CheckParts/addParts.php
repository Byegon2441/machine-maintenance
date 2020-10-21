<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบซ่อมบำรุงเครื่องจักร : แก้ไขใบแจ้งซ่อม</title>

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
    <link  href="../vendor/css/datepicker.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../vendor/css/bootstrap-select.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
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

    <?php include '../Template/temTechnician.php';
         include '../database/connect.php';
    ?>

<!-- modal เพิ่มอะไหล่ -->
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มอะไหล่</h5>
                </div>
                <form class="form-horizontal" id="insert" role="form" method="POST"
                    action="#" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> เลือกอะไหล่:</label>
                            <div class="col-sm-4">
                                <select name="select2[]" class="selectpicker form-control" data-live-search="true">
                                    <option value="a">อะไหล่ a</option>
                                    <option value="b">อะไหล่ b</option>
                                    <option value="c">อะไหล่ c</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <input class="form-control" type="number"min="1" max="5" ></input>
                            </div>
                            <div class="col-sm-1">
                                <button type="button" id="add_row" class="btn btn-success btn-circle add_row" style="float: right;"><i class="fa fa-plus"></i>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" style="margin-left:20px; margin-right:20px;">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">รายการอะไหล่</h3>
                                    </div>

                        <table class="table table-bordered" id="tab_logic">
                            <thead>
                                <tr>
                                    <th style="background:#CCCCCC;">ชื่ออะไหล่</th>
                                    <th style="background:#CCCCCC;">จำนวน</th>
                                    <th style="background:#CCCCCC;"></th>
                                </tr>
                            </thead>
                            <tbody class="sub">
                                <tr id='addr0'>
                                    <td></td>
                                    <td></td>
                                    <td><button type="button"class="btn btn-danger btn-circle increase-row RemoveRow btndis"><i class="fa fa-minus"></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <input type="submit" value="ยืนยัน" class="btn btn-primary">
                    </div>
                </form>

            </div>
        </div>
    </div>
<!-- modal เพิ่มอะไหล่ -->

<div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ใบการซ่อม</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            รายละเอียดใบแจ้งซ่อม
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
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
                                                    class="form-control" disabled></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อเครื่องจักร :</label>
                                            <input id="XVVehTypeName" name="XVVehTypeName" class="form-control"
                                                style="width:60%" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="col text-right">
                                            <label for="numb">หมายเลขเครื่องจักร : <input type="text" size="17" name="numb"
                                                    class="form-control" readonly></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อไชต์งาน : <input id="site" type="text" size="30" name="numb"
                                                    class="form-control" readonly></label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="col text-right">
                                            <label for="numb">หมายเลขหน่วยงาน : <input type="text" size="17" name="numb"
                                                    class="form-control" readonly></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="numb">ตำแหน่งเครื่องจักร ณ ปัจจุบัน เลขที่ :
                                            <input type="text" style="margin: 0px 10px;" size="10" name="numb"
                                                class="form-control" readonly>
                                            <input type="text" style="margin: 0px 10px;" size="10" name="numb"
                                                class="form-control" readonly>
                                            <input type="text" style="margin: 0px 10px;" size="10" name="numb"
                                                class="form-control" readonly>
                                            <input type="text" style="margin: 0px 10px;" size="10" name="numb"
                                                class="form-control" readonly></label>
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
                                                    <th style="background:#CCCCCC;">ซ่อม</th>
                                                    <th style="background:#CCCCCC;">เรื่องที่แจ้ง</th>
                                                    <th style="background:#CCCCCC;">สาเหตุที่ทราบ</th>
                                                    <th style="background:#CCCCCC;">อะไหล่ที่ต้องใช้</th>
                                                    <th style="background:#CCCCCC;">หมายเหตุ</th>
                                                </tr>
                                            </thead>
                                            <tbody class="sub">
                                                <tr id='addr0'>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><button type="button" class="btn btn-success mr-auto" data-toggle="modal" data-target="#insertModal">เพิ่มอะไหล่</button></td>
                                                    <td></td>
                                                </tr>
                                                <tr id='addr1'></tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="panel-body" style="margin:0px;">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="col text-left">
                                            <label for="numb">สถานะรถ :
                                                <select name="" id="" class="form-control" disabled>
                                                    <option value="">fsdfdfghdghdghdghdghdghdgh</option>
                                                    <option value="">sdf</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อผู้แจ้งซ่อม : <input type="text" size="30" name="numb"
                                                    class="form-control" readonly></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col text-left">
                                            <label for="numb">วันนัดประเมิน : <input type="text" size="6" name="numb"
                                                    class="form-control" >
                                            </label>
                                            <label for="numb">วันที่ประเมิน : <input type="text" size="6" name="numb"
                                                    class="form-control" >
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col text-left">
                                            <label for="numb">ช่างประเมิน : <?php echo 'อิอิ'?>
                                            </label>
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
                                        </div>
                                    </div>
                                </div>
                            </form>

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


        <script src="../vendor/js/datepicker.js"></script>
        <script src="../vendor/js/datepicker.th-TH.js"></script>
        <script src="../vendor/js/bootstrap-select.js"></script>
        <script>
        $(function() {
            $('[data-toggle="datepicker"]').datepicker({
                autoHide: true,
                autoPick: true,
                language: 'th-TH',
                zIndex: 2048,
                format: 'dd/mm/yyyy'
            });
        });

        $('.my-select').selectpicker();

        $(document).ready(function() {
            let i = 1;
            $("#add_row").click(function() {
                $('#tab_logic').append('<tr id="addr' + (i) + '"></tr>');
                $('tr').find('input').prop('disabled', false)
                $('#addr' + i).html("<td><input type='text' name='n_sub[]'  placeholder=''/></td><td><input type='text' name='sub[]' placeholder=''/></td><td><button type='button' id='add_row1' class='btn btn-danger btn-circle increase-row RemoveRow'><i class='fa fa-minus'></button></td>"
                );

                $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
                i++;
            });
        });

        $('table').on('click', '.RemoveRow', function() {
            $(this).closest('tr').remove();
        });
        </script>

</body>

</html>