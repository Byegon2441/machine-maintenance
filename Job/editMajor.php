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

    <?php include '../Template/templsidebar.php';
         include '../database/connect.php';
  

    if(isset($_GET['id'])){
        $id=$_GET['id'];
    $sql = " SELECT  m.XVMajDocNo, d.XDMajDate, m.XVVehCode, v.XVVehName, m.XVMajStatus, m.XVMajDocStatus ,depart.XVDptCode,depart.XVDptName,depart.XVDptNumber,depart.`XVDptSub-district`,depart.XVDptDistrict,depart.XVDptProvince 
 FROM  tdoctmajob m, tdoctmajobdate d, tmstvehicle v,tmstmdepartment depart
 WHERE m.XVMajDocNo = d.XVMajDocNo 
 AND m.XVVehCode = v.XVVehCode
 AND v.XVDptCode = depart.XVDptCode
 AND m.XVMajDocNo ='$id'"; //ตัวสมบูรณ์

$result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
while ($row=mysqli_fetch_array($result)){

?>



    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">แก้ไขใบแจ้งซ่อม</h1>
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
                            <form action="editMajor.php" class="form-inline" method="POST">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 ml-auto">
                                        <div class="col text-right">
                                            <label for="numb">สถานะใบแจ้งซ่อม : <input type="text" name="XVMajDocstatus"
                                                    id="jobstatus" class="form-control"
                                                    value="<?php echo $row["XVMajStatus"];?>" readonly></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 ml-auto">
                                        <div class="col text-right">
                                            <label for="numb">เลขที่ใบแจ้งซ่อม : <input type="text" name="XVMajDocNo"
                                                    id="jobid" class="form-control"
                                                    value="<?php echo $row["XVMajDocNo"];?>" readonly></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 ml-auto">
                                        <div class="col text-right">
                                            <label for="numb">วันที่แจ้งซ่อม : <input type="text" name="numb"
                                                    class="form-control" value="<?php echo $row["XDMajDate"];?>"
                                                    readonly></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อเครื่องจักร :</label>
                                            <select id="XVVehName" name="XVVehName" class="form-control"
                                                style="width:60%">
                                                <?php
                                     include '../database/connect.php';
                                     $sql1 = "select * from tmstvehicle; ";
                                     $result1 = mysqli_query($connect,$sql1) or die(mysqli_query($connect));
                                     while ($row1=mysqli_fetch_array($result1)){
                                         ?>
                                                <option value="<?php echo $row1["XVVehCode"];?>"
                                                    <?php if($row["XVVehCode"] == $row1["XVVehCode"]) echo "selected" ?>>
                                                    <?php echo $row1["XVVehName"]; ?></option>
                                                <?php
                                     }
                                    mysqli_close($connect);
                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="col text-right">
                                            <label for="numb">หมายเลขเครื่องจักร : <input type="text" size="17"
                                                    name="noof" value="<?php echo $row["XVVehCode"];?>"
                                                    class="form-control" id="noof" readonly></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อไชต์งาน : <input type="text" size="30" name="dname"
                                                    id="dname" value="<?php echo $row["XVDptName"];?>"
                                                    class="form-control" readonly></label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="col text-right">
                                            <label for="numb">หมายเลขไซต์งาน : <input type="text" size="17" name="dcode"
                                                    value="<?php echo $row["XVDptCode"];?>" id="dcode"
                                                    class="form-control" readonly></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="numb">ตำแหน่งเครื่องจักร ณ ปัจจุบัน เลขที่:
                                            <input type="text" style="margin: 0px 10px;" size="10" name="dnum" id="dnum"
                                                value="<?php echo $row["XVDptNumber"];?>" class="form-control">
                                            ตำบล:<input type="text" style="margin: 0px 10px;" size="10" name="dsub"
                                                id="dsub" value="<?php echo $row["XVDptSub-district"];?>"
                                                class="form-control">
                                            อำเภอ:<input type="text" style="margin: 0px 10px;" size="10" name="ddis"
                                                id="ddis" value="<?php echo $row["XVDptDistrict"];?>"
                                                class="form-control">
                                            จังหวัด:<input type="text" style="margin: 0px 10px;" size="10" name="dpro"
                                                id="dpro" value="<?php echo $row["XVDptProvince"];?>"
                                                class="form-control"></label>
                                    </div>
                                </div>

                                <div class="panel panel-default" style="margin-top:20px;">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">รายละเอียดการแจ้งซ่อม</h3>
                                    </div>

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
                                                <?php 
                                    include '../database/connect.php';
                                        $sql2 = "SELECT  jd.XIMajdSeqNo,jd.XVMajdSubject,jd.XVMajdCause
                                         FROM  tdoctmajob j ,tdoctmajobdetail jd
                                         WHERE  j.XVMajDocNo = jd.XVMajDocNo
                                         AND j.XVMajDocNo = '$id'";
                                        $result2 = mysqli_query($connect,$sql2) or die(mysqli_query($connect));
                                        $numof = mysqli_num_rows($result2); 
                                        while ($row2=mysqli_fetch_array($result2)){
                                    ?>
                                                <tr id='addr0'>
                                                    <td><?php echo $row2["XIMajdSeqNo"];?></td>
                                                    <td><input type="text" name="n_sub[]"
                                                            placeholder="กรุณากรอกเรื่องที่แจ้ง"
                                                            value="<?php echo $row2["XVMajdSubject"];?>" readonly>
                                                    </td>
                                                    <td><input type="text" name="sub[]" placeholder="กรุณากรอกสาเหตุ"
                                                            value="<?php echo $row2["XVMajdCause"];?>" readonly></td>
                                                    <td><button type="button"
                                                            class="btn btn-danger btn-circle increase-row RemoveRow "><i
                                                                class="fa fa-minus"></button></td>
                                                </tr>
                                                <?php } ?>
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
                                            <label for="numb">ชื่อผู้แจ้งซ่อม : <input type="text" size="40"
                                                    name="nameofuser" id="nameofuser" value="ธุรการ"
                                                    class="form-control" readonly></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="col-md-6">
                                        <div class="col text-left">
                                            <a type="button" class="btn btn-danger mr-auto" href="Listjob.php">กลับ</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col text-right">
                                            <input type="submit" class="btn btn-primary " name="sendjob" value="ส่งใบแจ้งซ่อม">
                                            <input type="submit" class="btn btn-success " name="save"  value="บันทึก">
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

        <?php }
                            }?>

        <script src="../vendor/js/datepicker.js"></script>
        <script src="../vendor/js/datepicker.th-TH.js"></script>
        <script>
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
            let i = <?php echo $numof; ?>;
            $("#add_row").click(function() {
                $('#tab_logic').append('<tr id="addr' + (i) + '"></tr>');
                $('tr').find('input').prop('disabled', false)
                $('#addr' + i).html("<td>" + (i + 1) +
                    "</td><td><input type='text' name='n_sub[]'  placeholder='กรุณากรอกเรื่องที่แจ้ง'/></td><td><input type='text' name='sub[]' placeholder='กรุณากรอกสาเหตุ'/></td><td><button type='button' id='add_row1' class='btn btn-danger btn-circle increase-row RemoveRow'><i class='fa fa-minus'></button></td>"
                );

                $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
                i++;
            });
        });


        $('table').on('click', '.RemoveRow', function() {
            $(this).closest('tr').remove();
        });
        </script>



        <?php
include '../database/connect.php';
if(isset($_POST['save'])){
$XVMajDocNo = $_POST['XVMajDocNo'];
$name = $_POST['nameofuser'];
$dnum = $_POST['dnum'];
$dsub = $_POST['dsub'];
$ddis = $_POST['ddis'];
$dpro = $_POST['dpro'];
$noof = $_POST['noof'];
    $sql = "UPDATE tdoctmajob
        SET XVMajWhoInformant = '$name' ,
        XVMajNumber = '$dnum',
        `XVMajSub-district` = '$dsub',
        XVMajDistrict = '$ddis',
        XVMajProvince='$dpro',
        XVVehCode='$noof'
        WHERE XVMajDocNo = '$XVMajDocNo' ";

$query = mysqli_query( $connect, $sql );
if ( $query ) {
        $sql = "SELECT XIMajdSeqNo FROM tdoctmajobdetail WHERE XVMajDocNo = '$XVMajDocNo'";
        $query = mysqli_query( $connect, $sql );
        $query1 = false;
        while( $row = mysqli_fetch_array($query))
        {
            $seq = $row['XIMajdSeqNo'];
            $sql1 = "DELETE FROM tdoctmajobdetail  WHERE XIMajdSeqNo = $seq AND XVMajDocNo = '$XVMajDocNo'";
            $query1 = mysqli_query( $connect, $sql1 );
            // echo $seq;
        }   
        $cnt = 1;
        $nvals = count( $_REQUEST['n_sub'] );
        $query2 = false;
        for ( $i = 0; $i < $nvals; $i++ ) {
            $n_sub = $_REQUEST['n_sub'][$i];
            $sub = $_REQUEST['sub'][$i];
            if(!empty($n_sub) && !empty($sub)){
                $sql2 = "INSERT INTO tdoctmajobdetail(XVMajDocNo,XIMajdSeqNo,XVMajdSubject,XVMajdCause) VALUES ('$XVMajDocNo', '$cnt', '$n_sub', '$sub')";
                $query2 = mysqli_query( $connect, $sql2 );
                $cnt++;
            }
        }
        if($query2){
            if($query2){
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
                        }else{ echo mysqli_error( $connect );
                       
                                        }
        }
    }//save


}else if(isset($_POST['sendjob'])){
    $XVMajDocNo = $_POST['XVMajDocNo'];
$name = $_POST['nameofuser'];
$dnum = $_POST['dnum'];
$dsub = $_POST['dsub'];
$ddis = $_POST['ddis'];
$dpro = $_POST['dpro'];
$noof = $_POST['noof'];
    $sql = "UPDATE tdoctmajob
        SET XVMajWhoInformant = '$name' ,
        XVMajNumber = '$dnum',
        `XVMajSub-district` = '$dsub',
        XVMajStatus='แจ้งซ่อม',
        XVMajDocStatus ='2',
        XVMajDistrict = '$ddis',
        XVMajProvince='$dpro',
        XVVehCode='$noof'
        WHERE XVMajDocNo = '$XVMajDocNo' ";
        
        $query = mysqli_query( $connect, $sql );
        if ( $query ) {
            $sql = "SELECT XIMajdSeqNo FROM tdoctmajobdetail WHERE XVMajDocNo = '$XVMajDocNo'";
            $query = mysqli_query( $connect, $sql );
            $query1 = false;
            while( $row = mysqli_fetch_array($query))
            {
                $seq = $row['XIMajdSeqNo'];
                $sql1 = "DELETE FROM tdoctmajobdetail  WHERE XIMajdSeqNo = $seq AND XVMajDocNo = '$XVMajDocNo'";
                $query1 = mysqli_query( $connect, $sql1 );
                // echo $seq;
            }   
            $cnt = 1;
            $nvals = count( $_REQUEST['n_sub'] );
            $query2 = false;
            for ( $i = 0; $i < $nvals; $i++ ) {
                $n_sub = $_REQUEST['n_sub'][$i];
                $sub = $_REQUEST['sub'][$i];
                if(!empty($n_sub) && !empty($sub)){
                    $sql2 = "INSERT INTO tdoctmajobdetail(XVMajDocNo,XIMajdSeqNo,XVMajdSubject,XVMajdCause) VALUES ('$XVMajDocNo', '$cnt', '$n_sub', '$sub')";
                    $query2 = mysqli_query( $connect, $sql2 );
                    $cnt++;
                }
            }
                if($query2){
                    echo '<script>';
                                echo "Swal.fire({
                                    title: 'สำเร็จ!',
                                    text: 'ทำการส่งข้อมูลใบแจ้งซ่อมให้หัวหน้าช่างเรียบร้อยแล้ว',
                                    icon: 'success',
                                    confirmButtonText: 'Back'
                                  }).then(function() {
                                    window.location = 'ListJob.php';
                                });";
                                echo '</script>';
                            }else{ 
                                echo '<script>';
                                echo "Swal.fire({
                                    title: 'สำเร็จ!',
                                    text: 'ทำการส่งข้อมูลใบแจ้งซ่อมให้หัวหน้าช่างเรียบร้อยแล้ว',
                                    icon: 'success',
                                    confirmButtonText: 'Back'
                                  }).then(function() {
                                    window.location = 'ListJob.php';
                                });";
                                echo '</script>';
                           
                                            }
            
        }
}//submit
?>
</body>

</html>