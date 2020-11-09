<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ระบบซ่อมบำรุงเครื่องจักร : รายงาน</title>

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/css/datepicker.css" rel="stylesheet">

    <style>
        tbody {
            display: block;
            max-height: 160px;
            overflow-y: scroll;
        }

        thead,
        tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        thead {
            width: calc(100% - 16.5px)
        }

        table {
            width: 100%;
        }
    </style>
</head>

<body>

    <?php include '../Template/templsidebar.php';?>

    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รายงาน</h1>
                    <div class="col-sm-3"></div>
                    <div class="form-group form-inline col-sm-3">
                        <label for="datee" class="control-label">เลือกวันที่:</label>
                        <input type="text" class="form-control" id="datee" placeholder="choose date" data-toggle="datepicker">
                    </div>
                    <div class="form-group form-inline col-sm-6">
                        <label for="datee" class="control-label">สถานะการซ่อม:</label>
                        <select name="status_major" id="status_major" class="form-control">
                            <option value="" selected>ทั้งหมด</option>
                            <option value="การบำรุงรักษาตามรอบ 7 วัน">การบำรุงรักษาตามรอบ 7 วัน</option>
                            <option value="การซ่อมแซมทั่วไป 7 วัน">การซ่อมแซมทั่วไป 7 วัน</option>
                            <option value="การซ่อทแซมแบบเร่งด่วนเครื่องจักรจอด 3 วัน">การซ่อทแซมแบบเร่งด่วนเครื่องจักรจอด 3 วัน</option>
                            <option value="การซ่อมแซมเชิงป้องกัน">การซ่อมแซมเชิงป้องกัน</option>
                            <option value="เปลี่ยนยางล้อหมุน 7 วัน">เปลี่ยนยางล้อหมุน 7 วัน</option>
                            <option value="การซ่อมแซมจากเคสอุบัติเหตุ 30 วัน">การซ่อมแซมจากเคสอุบัติเหตุ 30 วัน</option>
                            <option value="เบิกของสิ้นเปลือง">เบิกของสิ้นเปลือง</option>
                            <option value="ซ่อมแอร์ / ติดฟิล์ม 7 วัน">ซ่อมแอร์ / ติดฟิล์ม 7 วัน</option>
                            <option value="เปลี่ยนยางเครื่องจักร 3 วัน">เปลี่ยนยางเครื่องจักร 3 วัน</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            สถานะใบแจ้งซ่อมปัจจุบัน
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover display"
                                id="present">
                                <thead>
                                    <tr>
                                        <th>เลขที่ใบแจ้งซ่อม</th>
                                        <th>หมายเลขเครื่องจักร</th>
                                        <th>ชื่องานหรือชื่อเครื่องจักร</th>
                                        <th>สถานะใบแจ้งซ่อม</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="bo">

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ซ่อมเสร็จรายวัน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover " id="perDay">
                                <thead>
                                    <tr>
                                        <th>เลขที่ใบแจ้งซ่อม</th>
                                        <th>หมายเลขเครื่องจักร</th>
                                        <th>ชื่องานหรือชื่อเครื่องจักร</th>
                                        <th>สถานะใบแจ้งซ่อม</th>
                                      
                                    </tr>
                                </thead>
                                <tbody class="bo">

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ปิดงานรายวัน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover" id="closedJob">
                                <thead>
                                    <tr>
                                        <th>เลขที่ใบแจ้งซ่อม</th>
                                        <th>หมายเลขเครื่องจักร</th>
                                        <th>ชื่องานหรือชื่อเครื่องจักร</th>
                                        <th>สถานะใบแจ้งซ่อม</th>
                                       
                                    </tr>
                                </thead>
                                <tbody class="bo">

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
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../vendor/js/datepicker.js"></script>
    <script src="../vendor/js/datepicker.th-TH.js"></script>
    <script>
    $(function() {
        $('[data-toggle="datepicker"]').datepicker({
                language: 'th-TH',
                format: 'dd/mm/yyyy'
            });
    });
    
    $('.datepicker').datepicker();
    $('#datee, #status_major').change(function() {
        $('.bo').empty()
        $.ajax({
            type: "GET",
            url: "closed_job.php",
            contentType: "application/json; charset=utf-8",
            data: {
                date_fi: $('#datee').val()
                
            },
            dataType: "JSON",
            success: function(data3) {
                var countKey = Object.keys(data3).length / 4;
                $('#closedJob').append('<tr id="addrrr0"></tr>');
                let j = 0
                let g = 0
                for (var k = 0; k < countKey; k++) {
                    $('tr').find('input').prop('disabled', false)
                    $('#addrrr' + j).html("<td>" + data3[0 + g] + "</td><td>" + data3[1 + g] +
                        "</td><td>" + data3[2 + g] + "</td><td>" + data3[3 + g] + "</td>")
                    $('#closedJob').append('<tr id="addrrr' + (j + 1) + '"></tr>');
                    g = g + 4
                    j++
                }
            },
            error: function() {
                $('#ct').html("Some problem fetching data.Please try again");
            }
        });
        
        $.ajax({
            type: "GET",
            url: "perDay.php",
            contentType: "application/json; charset=utf-8",
            data: {
                date_fi: $('#datee').val()
            },
            dataType: "JSON",
            success: function(data2) {
                var countKey = Object.keys(data2).length / 4;
                $('#perDay').append('<tr id="addrrrr0"></tr>');
                let j = 0
                let g = 0
                for (var k = 0; k < countKey; k++) {
                    $('tr').find('input').prop('disabled', false)
                    $('#addrrrr' + j).html("<td>" + data2[0 + g] + "</td><td>" + data2[1 + g] +
                        "</td><td>" + data2[2 + g] + "</td><td>" + data2[3 + g] + "</td>")
                    $('#perDay').append('<tr id="addrrrr' + (j + 1) + '"></tr>');
                    g = g + 4
                    j++
                }
            },
            error: function() {
                $('#ct').html("Some problem fetching data.Please try again");
            }
        });

        $.ajax({
            type: "GET",
            url: "present.php",
            contentType: "application/json; charset=utf-8",
            data: {
                date_fi: $('#datee').val(),
                stts: $('#status_major').val()
            },
            dataType: "JSON",
            success: function(data1) {
                var countKey = Object.keys(data1).length / 4;
                $('#present').append('<tr id="addrrrrr0"></tr>');
                let j = 0
                let g = 0
                for (var k = 0; k < countKey; k++) {
                    $('tr').find('input').prop('disabled', false)
                    $('#addrrrrr' + j).html("<td>" + data1[0 + g] + "</td><td>" + data1[1 + g] +
                        "</td><td>" + data1[2 + g] + "</td><td>" + data1[3 + g] + "</td>")
                    $('#present').append('<tr id="addrrrrr' + (j + 1) + '"></tr>');
                    g = g + 4
                    j++
                }
            },
            error: function() {
                $('#ct').html("Some problem fetching data.Please try again");
            }
        });
       
    });
    </script>

</body>

</html>