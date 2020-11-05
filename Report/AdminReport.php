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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous"></script>

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
        /* width: 100%; */
        width: calc( 100% - 16.5px )
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
                    <div class="col-md-2">
                        <label for="name" class="control-label">เลือกวันที่:</label>
                    </div>
                    <div class="form-group col-md-2 center">
                        <input type="text" class="form-control datepicker" id="datee" data-toggle="datepicker">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            สถานะแจ้งซ่อมปัจจุบัน
                        </div>
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover display"
                                id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>เลขที่ใบแจ้งซ่อม</th>
                                        <th>หมายเลขเครื่องจักร</th>
                                        <th>ชื่องานหรือชื่อเครื่องจักร</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>

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
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>

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
                            <table class="table table-striped table-bordered table-hover" id="closedJob">
                                <thead>
                                    <tr>
                                        <th>เลขที่ใบแจ้งซ่อม</th>
                                        <th>หมายเลขเครื่องจักร</th>
                                        <th>ชื่องานหรือชื่อเครื่องจักร</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>AAAA</td>
                                        <td>323232</td>
                                        <td>323232</td>
                                        <td>323232</td>
                                    </tr>
                                    <tr>
                                        <td>BBBBB</td>
                                        <td>323232</td>
                                        <td>323232</td>
                                        <td>323232</td>
                                    </tr>
                                    <tr>
                                        <td>CCCCC</td>
                                        <td>3435656</td>
                                        <td>3435656</td>
                                        <td>3435656</td>
                                    </tr>
                                    <tr>
                                        <td>AAAA</td>
                                        <td>323232</td>
                                        <td>323232</td>
                                        <td>323232</td>
                                    </tr>
                                    <tr>
                                        <td>BBBBB</td>
                                        <td>323232</td>
                                        <td>323232</td>
                                        <td>323232</td>
                                    </tr>
                                    <tr>
                                        <td>CCCCC</td>
                                        <td>3435656</td>
                                        <td>3435656</td>
                                        <td>3435656</td>
                                    </tr>
                                    <tr>
                                        <td>AAAA</td>
                                        <td>323232</td>
                                        <td>323232</td>
                                        <td>323232</td>
                                    </tr>
                                    <tr>
                                        <td>BBBBB</td>
                                        <td>323232</td>
                                        <td>323232</td>
                                        <td>323232</td>
                                    </tr>
                                    <tr>
                                        <td>CCCCC</td>
                                        <td>3435656</td>
                                        <td>3435656</td>
                                        <td>3435656</td>
                                    </tr>
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
    $(function() {
        $('[data-toggle="datepicker"]').datepicker({
            autoHide: true,
            autoPick: true,
            language: 'th-TH',
            zIndex: 2048,
            format: 'dd/mm/yyyy'
        });
    });
    $('.datepicker').datepicker();
    $('#datee').change(function() {
        $.ajax({
            type: "GET",
            url: "closed_job.php",
            data: {
                date_fi: $('#datee').val()
            },
            dataType: "JSON",
            success: function(data) {
                var countKey = (Object.keys(data).length + 1) / 5;
                // alert(countKey)
                $('#closedJob').append('<tr id="addrr0"></tr>');
                let j = 0
                let g = 0
                for (var k = 0; k < countKey; k++) {
                    $('tr').find('input').prop('disabled', false)
                    $('#addrr' + j).html("<td>" + data[0 + g] + "</td><td>" + data[1 + g] +
                        "</td><td>" + data[2 + g] + "</td><td>" + data[3 + g] + "</td>")
                    $('#closedJob').append('<tr id="addrr' + (j + 1) + '"></tr>');
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