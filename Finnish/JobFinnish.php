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
    <link href="../vendor/css/datepicker.css" rel="stylesheet">

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

    <?php include '../Template/templsidebar.php';
         include '../database/connect.php';



         if(isset($_GET['id'])){
            $id=$_GET['id'];
            //m.XVMaCarStatus,/* เลขที่ใบแจ้งซ่อม */ m.XVMajDocNo,/* วันที่ใบแจ้งซ่อม */ d.XDMajDate, /* รหัสเครื่องจักร */m.XVVehCode, /* ชื่อเครื่องจักร */v.XVVehName, /* รหัสไซต์งาน */depart.XVDptCode,/* ชื่อไซต์งาน */depart.XVDptName,/* เลขที่ */depart.XVDptNumber,/* ตำบล */depart.`XVDptSub-district`,/* อำเภอ */depart.XVDptDistrict,/* จังหวัด */depart.XVDptProvince
        $sql = " SELECT   *
     FROM  tdoctmajob m, tdoctmajobdate d, tmstvehicle v,tmstmdepartment depart
     WHERE  m.XVMajDocNo = d.XVMajDocNo
     AND m.XVVehCode = v.XVVehCode
     AND v.XVDptCode = depart.XVDptCode
     AND m.XVMajDocNo ='$id'"; //ตัวสมบูรณ์

    $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
    while ($row1=mysqli_fetch_array($result)){


    ?>



    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ปิดงาน</h1>
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
                            <form action="insertAllowFixDate.php" method='POST' class="form-inline">


                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 ml-auto">
                                        <div class="col text-right">
                                            <label for="numb">เลขที่ใบแจ้งซ่อม : <input type="text" name="XVMajDocNo"
                                                    id="jobid" class="form-control"
                                                    value="<?php echo $row1["XVMajDocNo"];?>" readonly></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 ml-auto">
                                        <div class="col text-right">
                                            <label for="numb">วันที่แจ้งซ่อม : <input type="text" name="numb"
                                                    class="form-control" value="<?php echo $row1["XDMajDate"];?>"
                                                    readonly></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อเครื่องจักร :</label>
                                            <input id="XVVehTypeName" name="XVVehTypeName" class="form-control"
                                                value="<?php echo $row1["XVVehName"];?>" style="width:60%" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="col text-right">
                                            <label for="numb">หมายเลขเครื่องจักร : <input type="text" size="17"
                                                    name="noof" value="<?php echo $row1["XVVehCode"];?>"
                                                    class="form-control" id="noof" readonly></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อไชต์งาน : <input type="text" size="30" name="dname"
                                                    id="dname" value="<?php echo $row1["XVDptname"];?>"
                                                    class="form-control" readonly></label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="col text-right">
                                            <label for="numb">หมายเลขไซต์งาน : <input type="text" size="17" name="dcode"
                                                    value="<?php echo $row1["XVDptCode"];?>" id="dcode"
                                                    class="form-control" readonly></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="numb">ตำแหน่งเครื่องจักร ณ ปัจจุบัน เลขที่:
                                            <input type="text" style="margin: 0px 10px;" size="10" name="dnum" id="dnum"
                                                value="<?php echo $row1["XVDptNumber"];?>" readonly
                                                class="form-control">
                                            ตำบล:<input type="text" style="margin: 0px 10px;" size="10" name="dsub"
                                                id="dsub" value="<?php echo $row1["XVDptSub-district"];?>" readonly
                                                class="form-control">
                                            อำเภอ:<input type="text" style="margin: 0px 10px;" size="10" name="ddis"
                                                id="ddis" value="<?php echo $row1["XVDptDistrict"];?>" readonly
                                                class="form-control">
                                            จังหวัด:<input type="text" style="margin: 0px 10px;" size="10" name="dpro"
                                                id="dpro" value="<?php echo $row1["XVDptProvince"];?>" readonly
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
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody class="sub">
                                    <?php 
                                    include '../database/connect.php';
                                        $sql2 = "SELECT jd.XIMajdSeqNo,jd.XVMajdSubject,jd.XVMajdCause
                                         FROM  tdoctmajob j ,tdoctmajobdetail jd
                                         WHERE  j.XVMajDocNo = jd.XVMajDocNo
                                         AND j.XVMajDocNo = '$id'";
                                        $result2 = mysqli_query($connect,$sql2) or die(mysqli_query($connect));
                                        while ($row2=mysqli_fetch_array($result2)){
                                    
                                    ?>

                                        <tr id='addr0'>
                                            <td><?php echo $row2["XIMajdSeqNo"];?></td>
                                            <td><input type="text" name="n_sub[]" placeholder="กรุณากรอกเรื่องที่แจ้ง" value="<?php echo $row2["XVMajdSubject"];?>" readonly> 
                                            </td>
                                            <td><input type="text" name="sub[]" placeholder="กรุณากรอกสาเหตุ" value="<?php echo $row2["XVMajdCause"];?>" readonly></td>
                                            
                                        </tr>
                                        <tr id='addr1'></tr>
                                        <?php } ?> 
                                    </tbody>

                                </table>
                            </div>
                                    <div class="panel-body" style="margin:0px;">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="col text-left">
                                            <label for="numb">สถานะรถ : <?php echo $row1["XVMaCarStatus"];?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อผู้แจ้งซ่อม : <input type="text" size="40"
                                                    name="nameofuser" id="nameofuser" value="ธุรการ"
                                                    class="form-control" readonly></label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col text-left">
                                            <label for="numb">วันนัดประเมิน : <?php $datecon1 = $row1["XDMajEstAppPlanDate"];
                                                         $DN1 = str_replace('-', '/', $datecon1);
                                                          $Dnew1 =  date('d/m/Y H:i:s', strtotime($DN1));
                                                          echo $Dnew1; ?>

                                            </label>
                                            <label for="numb">วันที่ประเมิน : <?php $datecon2 = $row1["XDMajEstActualDate"];
                                                         $DN2 = str_replace('-', '/', $datecon2);
                                                          $Dnew2 =  date('d/m/Y H:i:s', strtotime($DN2));
                                                          echo $Dnew2;?>
                                            </label>
                                            <label for="numb">วันที่อนุมัติซ่อม : <input id="datepicker" size="6"
                                                    name="XDMajConfirmDate" class="form-control" value="<?php $datecon = $row1["XDMajConfirmDate"];
                                                                  $DN = str_replace('-', '/', $datecon);
                                                                   $Dnew =  date('d/m/Y', strtotime($DN));
                                                                   echo $Dnew;
                                                                  ?>" disabled>
                                            </label>
                                            <label for="numb">วันที่อะไหล่พร้อม : <?php $datecon3 = $row1["XDMajSpareDate"];
                                                         $DN3 = str_replace('-', '/', $datecon3);
                                                          $Dnew3 =  date('d/m/Y', strtotime($DN3));
                                                          echo $Dnew3;?>
                                            </label>
                                            <label for="numb">วันที่นัดซ่อม : <input id="datepicker" size="6"
                                                    name="XDMajRepairAppPlanDate" class="form-control"
                                                    data-toggle="datepicker" disabled>
                                            </label>
                                            <label for="numb">วันที่ซ่อมจริง : <input id="datepicker" size="6"
                                                    name="#" class="form-control"
                                                    data-toggle="datepicker" disabled>
                                            </label>
                                            <label for="numb">วันนัดรับรถ : <input id="datepicker" size="6"
                                                    name="#" class="form-control"
                                                    data-toggle="datepicker" disabled>
                                            </label>
                                            <label for="numb">วันที่รับรถ : <input id="datepicker" size="6"
                                                    name="#" class="form-control"
                                                    data-toggle="datepicker">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col text-left">
                                            <label for="numb">ช่างประเมิน :
                                            </label>
                                            <?php
                                                    include '../database/connect.php';
                                                    $sql = "  SELECT *
                                                    FROM  tdoctmajob j ,TdocTMaEstimation_Tnc tnc,TMstMTEmployee e
                                                    WHERE  j.XVMajDocNo = tnc.XVMajDocNo
                                                    AND tnc.XVEpyCode = e.XVEpyCode
                                                    AND j.XVMajDocNo = '$id' ";
                                                     $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
                                                     while ($row=mysqli_fetch_array($result)){
                                                    ?>

                                            <label for="">
                                                <?php echo  $row["XVEpyCode"]." ".$row["XVEpyFirstname"]." ".$row["XVpyLastname"];?>
                                            </label>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col text-left">
                                            <label for="numb">ช่างซ่อม :
                                            </label>
                                            <?php
                                                    include '../database/connect.php';
                                                    $sql = "  SELECT *
                                                    FROM  tdoctmajob j ,TdocTMaEstimation_Tnc tnc,TMstMTEmployee e
                                                    WHERE  j.XVMajDocNo = tnc.XVMajDocNo
                                                    AND tnc.XVEpyCode = e.XVEpyCode
                                                    AND j.XVMajDocNo = '$id' ";
                                                     $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
                                                     while ($row=mysqli_fetch_array($result)){
                                                    ?>

                                            <label for="">
                                                <?php echo  $row["XVEpyCode"]." ".$row["XVEpyFirstname"]." ".$row["XVpyLastname"];?>
                                            </label>
                                            <?php } ?>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <div class="col-md-6">
                                        <div class="col text-left">
                                            <a type="button" class="btn btn-danger mr-auto"
                                                href="ListAllowMainte.php">กลับ</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col text-right">
                                            <input type="hidden" value="<?php echo $id?>" name='id'>
                                            <input type="text" value="" name='' class="form-control" >
                                            <input type="submit" class="btn btn-info" name="save"
                                                value="ปิดงาน">
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
        <?php
    }
}
        ?>


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
        </script>



</body>

</html>