<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบซ่อมบำรุงเครื่องจักร : สร้างใบแจ้งซ่อม</title>

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

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
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
        height: 500px;
        overflow: auto;
    }

    .table-wrapper-scroll-y {
        display: block;
    }
    </style>
</head>

<body>

<?php include '../Template/templsidebar.php';?>



<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">สร้างใบแจ้งซ่อม</h1>
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
                                    <select id="XVVehName" name="XVVehName" class="form-control" style="width:60%" >
                                    <option value="null">กรุณาเลือก</option>
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
                                            class="form-control" id="noof" readonly ></label>
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
                                    <label for="numb">หมายเลขไซต์งาน : <input type="text" size="17" name="dcode"
                                            id="dcode" class="form-control" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="numb">ตำแหน่งเครื่องจักร ณ ปัจจุบัน เลขที่:
                                    <input type="text" style="margin: 0px 10px;" size="10" name="dnum" id="dnum"
                                        class="form-control">
                                   ตำบล:<input type="text" style="margin: 0px 10px;" size="10" name="dsub" id="dsub"
                                        class="form-control">
                                    อำเภอ:<input type="text" style="margin: 0px 10px;" size="10" name="ddis" id="ddis"
                                        class="form-control">
                                     จังหวัด:<input type="text" style="margin: 0px 10px;" size="10" name="dpro" id="dpro"
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
                                            <td><button type="button" class="btn btn-danger btn-circle increase-row RemoveRow"><i class="fa fa-minus"></button></td>
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
                                    <a type="button" class="btn btn-danger mr-auto" href="Listjob.php" >กลับ</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col text-right">
                                    <!-- <button type="button" class="btn btn-primary" data-dismiss="modal">บันทึก</button> -->
                                    <input type="submit" class="btn btn-success" value="บันทึก" name="submit" >
                                    <!-- <button type="submit" class="btn btn-success" data-dismiss="modal">ส่ง</button> -->
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
<script>
  $(function() {
            $('[data-toggle="datepicker"]').datepicker({
                //autoHide: true,
                autoPick: true,
                language: 'th-TH',
                //zIndex: 2048,
                format: 'dd/mm/yyyy'
            });
        });

        
       
       
        

        $('#XVVehName').change(() => {
            var id = $('#XVVehName').val();
            if (id != '') {
                console.log(id)
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#noof').val(data.numb);
                        $('#dcode').val(data.dcode);
                        $('#dname').val(data.dname);
                        $('#dnum').val(data.dnum);
                        $('#dsub').val(data.dsub);
                        $('#ddis').val(data.ddis);
                        $('#dpro').val(data.dpro);
                    }
                })
            } else {
                alert("Please Select Machine");
            }
        })

        $(document).ready(function() {
            let i = 1;
            $("#add_row").click(function() {
                $('tr').find('input').prop('disabled', false)
                $('#addr' + i).html("<td>" + (i + 1) +
                    "</td><td><input type='text' name='n_sub[]'  placeholder='กรุณากรอกเรื่องที่แจ้ง'/></td><td><input type='text' name='sub[]' placeholder='กรุณากรอกสาเหตุ'/></td><td><button type='button' id='add_row1' class='btn btn-danger btn-circle increase-row RemoveRow'><i class='fa fa-minus'></button></td>"
                );

                $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
                i++;
            });
        });


        $('table').on('click', '.RemoveRow', function(){
            $(this).closest('tr').remove();
        });


</script>

   

</body>

</html>
<?php
include '../database/connect.php';
if(isset($_POST['submit'])){
        if($_POST['XVVehName']=='null'){
            echo '<script>';
            echo "Swal.fire({
                title: 'เกิดข้อผิดพลาด!',
                text: 'กรุณาเลือกเครื่องจักร',
                 icon: 'error',
                confirmButtonText: 'Back'
            }).then(function() {
                window.history.back()
            });";
            echo '</script>';
        }

$name = $_POST['nameofuser'];
$dnum = $_POST['dnum'];
$dsub = $_POST['dsub'];
$ddis = $_POST['ddis'];
$dpro = $_POST['dpro'];
$noof = $_POST['noof'];

$sql = "INSERT INTO tdoctmajob(XVMajWhoInformant,XVMajDocStatus,XVMajNumber,`XVMajSub-district`,XVMajDistrict,XVMajProvince,XVVehCode) VALUES ('$name', '1', '$dnum', '$dsub', '$ddis', '$dpro', '$noof')";
$query = mysqli_query( $connect, $sql );
if ( $query ) {
    $sql = 'SELECT XVMajDocNo FROM tdoctmajob ORDER BY XVMajDocNo DESC LIMIT 1';
    $result = mysqli_query( $connect, $sql );
    $row = mysqli_fetch_array( $result, MYSQLI_ASSOC );
    $last_id = $row['XVMajDocNo'];
    $cnt = 1;
    $nvals = count( $_REQUEST['n_sub'] );
    date_default_timezone_set( 'Asia/Bangkok' );
     $ti =  date ( 'Y-m-d H:i:S' );
    $query1 = false;
    for ( $i = 0; $i < $nvals; $i++ ) {
        $n_sub = $_REQUEST['n_sub'][$i];
        $sub = $_REQUEST['sub'][$i];
        $sql1 = "INSERT INTO tdoctmajobdetail(XVMajDocNo,XIMajdSeqNo,XVMajdSubject,XVMajdCause) VALUES ('$last_id', '$cnt', '$n_sub', '$sub')";
        $query1 = mysqli_query( $connect, $sql1 );

        $cnt++;
    }
    if ( $query1 ) {
        $sql2 = "INSERT INTO tdoctmajobdate(XVMajDocNo,XDMajDate,XDMajKeyTime) VALUES ('$last_id', '$ti', '$ti')";
        $query2 = mysqli_query( $connect, $sql2 );
        if ( $query2 ) {
            echo '<script>';
            echo "Swal.fire({
                title: 'สำเร็จ!',
                text: 'ทำการบันทึกข้อมูลใบแจ้งซ่อมเรียบร้อยแล้ว',
                icon: 'success',
                confirmButtonText: 'Back'
              }).then(function() {
                window.location = 'ListJob.php';
            });";
            echo '</script>';
        }else{
            echo mysqli_error( $connect );
        }
    } else {
        echo mysqli_error( $connect );
    }
} else {
    echo mysqli_error( $connect );
}

}
?>
