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

    <?php include '../Template/templsidebar.php';
         include '../database/connect.php';
    ?>

<!-- modal เพิ่มช่างประเมิน -->
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มช่างประเมิน</h5>
                </div>
                <form class="form-horizontal" id="insert" role="form" method="POST"
                    action="addEngiCheck.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> เลือกช่างประเมิน:</label>
                            <div class="col-sm-7">
                            <select name="selectemployee[]" class="selectpicker form-control" data-live-search="true" multiple>
                              <?php $emp_sql = "SELECT * FROM tmstmtemployee ORDER BY XVEpyJobPosition ASC";
                                    $emp_query = mysqli_query($connect,$emp_sql)or die(mysqli_query($connect));
                                    while ($emp_row=mysqli_fetch_array($emp_query)){
                              ?>
                                <option value="<?php echo $emp_row["XVEpyCode"]; ?> <?php echo $emp_row["XVEpyFirstname"]; ?> <?php echo	$emp_row["XVpyLastname"]; ?>"><?php echo $emp_row["XVEpyFirstname"]; ?>  <?php echo	$emp_row["XVpyLastname"]; ?></option>
                                <?php
                              }
                              mysqli_close()
                                 ?>
                            </select>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <input type="submit" value="ยืนยัน" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- modal เพิ่มช่างประเมิน -->
<?php     if(isset($_GET['id'])){
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
                            <form action="insert.php?id=<?php echo $_GET['id']; ?>" class="form-inline" method="post">
                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 ml-auto">
                                        <div class="col text-right">
                                            <label for="numb">เลขที่ใบแจ้งซ่อม : <input type="text" name="numb"
                                                    value="<?php echo $row["XVMajDocNo"];?>" class="form-control" disabled></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 ml-auto">
                                        <div class="col text-right">
                                            <label for="numb">วันที่แจ้งซ่อม : <input type="text" name="numb"
                                                     value="<?php echo $row["XDMajDate"];?>" class="form-control" disabled></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อเครื่องจักร :</label>
                                            <input id="XVVehTypeName" name="XVVehTypeName" class="form-control"
                                                value="<?php echo $row["XVVehName"];?>" style="width:60%" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="col text-right">
                                            <label for="numb">หมายเลขเครื่องจักร : <input type="text" size="17" name="numb"
                                                    value="<?php echo $row["XVVehCode"];?>" class="form-control" readonly></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อไชต์งาน : <input id="site" type="text" size="30" name="numb"
                                                     value="<?php echo $row["XVDptName"];?>" class="form-control" readonly></label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="col text-right">
                                            <label for="numb">หมายเลขไซต์งาน : <input type="text" size="17" name="numb"
                                                  value="<?php echo $row["XVDptCode"];?>"  class="form-control" readonly></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="numb">ตำแหน่งเครื่องจักร ณ ปัจจุบัน เลขที่ :
                                            <input type="text" style="margin: 0px 10px;" size="10" name="numb" value="<?php echo $row["XVDptNumber"];?>"
                                                class="form-control" readonly>
                                            <input type="text" style="margin: 0px 10px;" size="10" name="numb" value="<?php echo $row["XVDptSub-district"];?>"
                                                class="form-control" readonly>
                                            <input type="text" style="margin: 0px 10px;" size="10" name="numb" value="<?php echo $row["XVDptDistrict"];?>"
                                                class="form-control" readonly>
                                            <input type="text" style="margin: 0px 10px;" size="10" name="numb" value="<?php echo $row["XVDptProvince"];?>"
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
                                                    <th style="background:#CCCCCC;">#</th>
                                                    <th style="background:#CCCCCC;">เรื่องที่แจ้ง</th>
                                                    <th style="background:#CCCCCC;">สาเหตุที่ทราบ</th>
                                                </tr>
                                            </thead>
                                            <tbody class="sub">
                                              <?php
                                                  $sql2 = "SELECT jd.XIMajdSeqNo,jd.XVMajdSubject,jd.XVMajdCause
                                                   FROM  tdoctmajob j ,tdoctmajobdetail jd
                                                   WHERE  j.XVMajDocNo = jd.XVMajDocNo
                                                   AND j.XVMajDocNo = '$id'";
                                                  $result2 = mysqli_query($connect,$sql2) or die(mysqli_query($connect));
                                                  $number = 0;
                                                  while ($row2=mysqli_fetch_array($result2)){
                                                    $number++;
                                              ?>

                                                  <tr id='addr0'>
                                                      <td><?php echo $number?></td>
                                                      <td><input type="text" name="n_sub[]" placeholder="กรุณากรอกเรื่องที่แจ้ง" value="<?php echo $row2["XVMajdSubject"];?>" readonly>
                                                      </td>
                                                      <td><input type="text" name="sub[]" placeholder="กรุณากรอกสาเหตุ" value="<?php echo $row2["XVMajdCause"];?>" readonly></td>

                                                  </tr>
                                                  <tr id='addr1'></tr>
                                                  <?php }
                                                   ?>

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
                                                <select name="statuscar" id="" class="form-control">
                                                    <option value="กำหนดบำรุงรักษาตามรอบ 7 วัน">กำหนดบำรุงรักษาตามรอบ 7 วัน</option>
                                                    <option value="การซ่อมแซมทั่วไป 7 วัน">การซ่อมแซมทั่วไป 7 วัน</option>
                                                    <option value="การซ่อมแซมแบบเร่งด่วนเครื่องจักรจอด 3 วัน">การซ่อมแซมแบบเร่งด่วนเครื่องจักรจอด 3 วัน</option>
                                                    <option value="การซ่อมแซมเชิงป้องกัน">การซ่อมแซมเชิงป้องกัน</option>
                                                    <option value="เปลี่ยนยางล้อหมุน 7 วัน">เปลี่ยนยางล้อหมุน 7 วัน</option>
                                                    <option value="การซ่อมแซมจากเคสอุบัติเหตุ 30 วัน">การซ่อมแซมจากเคสอุบัติเหตุ 30 วัน</option>
                                                    <option value="เบิกของสิ้นเปลือง">เบิกของสิ้นเปลือง</option>
                                                    <option value="ซ่อมแอร์/ติดฟีลม์ 7 วัน">ซ่อมแอร์/ติดฟีลม์ 7 วัน</option>
                                                    <option value="ปลี่ยนยางเครื่องจักร 3 วัน">เปลี่ยนยางเครื่องจักร 3 วัน</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อผู้แจ้งซ่อม : <input type="text" size="30" name="numb"
                                                    class="form-control" value="ธุรการ" readonly></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col text-left">
                                        <?php
                                        $sqldate = "SELECT XDMajDate,XDMajEstActualDate FROM tdoctmajobdate WHERE XVMajDocNo = '$id'";
                                        $querydate = mysqli_query($connect,$sqldate)or die("ERROR SELECT DATE");
                                        $rowdate = mysqli_fetch_array($querydate);
                                        $oldDate = $rowdate['XDMajDate'];
                                        $newD = str_replace('-', '/', $oldDate);
                                        $newDate =  date('d/m/Y', strtotime($newD));
                                         ?>
                                            <label for="numb">วันนัดประเมิน : <input type="text" size="6" name="numb"
                                                 value="<?php echo $newDate ?>"  class="form-control" disabled>
                                            </label>
                                        <?php if($rowdate['XDMajEstActualDate'] != "0000-00-00 00:00:00"){
                                          $oD = $rowdate['XDMajEstActualDate'];
                                          $nD = str_replace('-', '/', $oD);
                                          $newa =  date('d/m/Y', strtotime($nD));
                                          ?>
                                          <label for="numb">วันที่ประเมิน : <input type="text" size="6" name="datee"
                                                class="form-control" value="<?php echo $newa; ?>" disabled>
                                          </label>
                                          <?php
                                        }else{
                                          ?>
                                          <label for="numb">วันที่ประเมิน : <input type="text" size="6" name="datee"
                                                  class="form-control" data-toggle="datepicker">
                                          </label>
                                          <?php
                                        }?>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col text-left">
                                            <label for="numb">ช่างประเมิน : <input style="border: none; width:auto;" type="hidden" name="empar" value="<?php if(isset($_POST['selectemployee'])){
                                              $emp =  $_POST['selectemployee'];
                                              if(isset($emp)){
                                                if(count($emp) == 1){
                                                  echo $emp[0][0];
                                              }else{
                                                for ($i=0; $i < count($emp); $i++) {
                                                  echo $emp[$i][0]." ";
                                                }
                                              }
                                              }else{
                                                  echo "";
                                              }
                                              ;
                                            } ?>" >
                                            <?php
                                            $sqldepart1 = "SELECT count(tn.XVEpyCode) AS tnXV FROM tdoctmaestimation_tnc tn,tmstmtemployee tm WHERE tn.XVEpyCode = tm.XVEpyCode AND XVMajDocNo = '$id'";
                                            $querydepart1 = mysqli_query($connect,$sqldepart1)or die("ERROR SELECT");
                                            $fectdep = mysqli_fetch_array($querydepart1);
                                            if($fectdep['tnXV'] != 0){
                                              $sqldepart = "SELECT tn.XVEpyCode,tm.XVEpyFirstname,tm.XVpyLastname FROM tdoctmaestimation_tnc tn,tmstmtemployee tm WHERE tn.XVEpyCode = tm.XVEpyCode AND XVMajDocNo = '$id'";
                                              $querydepart = mysqli_query($connect,$sqldepart)or die("ERROR SELECT");
                                              while ($rowdepart=mysqli_fetch_array($querydepart)) {
                                                echo $rowdepart['XVEpyCode']." ";
                                                echo $rowdepart['XVEpyFirstname']." ";
                                                echo $rowdepart['XVpyLastname']." ";
                                              }
                                            }else{
                                              if(isset($_POST['selectemployee'])){
                                                $emp =  $_POST['selectemployee'];
                                                if(isset($emp)){
                                                  if(count($emp) == 1){
                                                    echo $emp[0];
                                                }else{
                                                  for ($i=0; $i < count($emp); $i++) {
                                                    echo $emp[$i]." ";
                                                  }
                                                }
                                                }
                                              }else{
                                                  echo "";
                                              }
                                            }
                                            ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="col-md-6">
                                        <div class="col text-left">
                                              <a type="button" class="btn btn-danger mr-auto" href="ListCheckDataEngi.php" >กลับ</a>
                                            <button type="button" class="btn btn-warning mr-auto" data-toggle="modal" data-target="#insertModal">เพิ่มช่างประเมิน</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-primary" data-dismiss="modal">บันทึก</button>
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

        //$('.selectpicker').selectpicker();
        </script>

</body>

</html>
