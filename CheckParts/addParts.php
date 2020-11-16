<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ระบบซ่อมบำรุงเครื่องจักร : แก้ไขใบแจ้งซ่อม</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../vendor/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/css/datepicker.css" rel="stylesheet">
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
        height: 500px;
        overflow: auto;
    }
    .table-wrapper-scroll-y {
        display: block;
    }
    </style>
</head>
<?php
        include '../database/connect.php';
?>
<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        ?>
<body>
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
                <form class="form-horizontal" id="insert" role="form" method="POST" action="insertt.php"
                    enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                        <div class="form-group">
                            <label for="name" class="col-sm-4 control-label">
                                <span class="required"></span> เลือกอะไหล่:</label>
                                <input type="hidden" name="pp" id="pp">
                                <input type="hidden" name="seqq" id="seqqe">
                                <input type="hidden" name="docno" id="docno" value="<?php echo $id; ?>">
                            <div class="col-sm-4">
                                <select name="select2" id="select2" class="selectpicker form-control" data-live-search="true">
                                    <?php
                                    include'../database/connect.php';
                                    $sql = "select * from tmstmmachine_parts";
                                    $stmt = $dbh->query($sql);
                                    if($stmt){
                                        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                                <option value="<?php echo $row['XVMachinePartsCode']; ?>"><?php echo $row['XVMachinePartsName'];?></option>
                                            <?php
                                        }
                                        }else{
                                            echo "<script type='text/javascript'>alert('fail');</script>";
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <select class="form-control 1-100" id="val_select2"></select>
                            </div>
                            <div class="col-sm-1">
                                <button type="button" id="add_row" class="btn btn-success btn-circle add_row"
                                    style="float: right;"><i class="fa fa-plus"></i>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" style="margin-left:20px; margin-right:20px;">
                        <div class="panel-heading">
                            <h3 class="panel-title">รายการอะไหล่</h3>
                        </div>

                        <table class="table table-bordered" id="tab_logic3">
                            <thead>
                                <tr>
                                    <th style="background:#CCCCCC;">ชื่ออะไหล่</th>
                                    <th style="background:#CCCCCC;">จำนวน</th>
                                    <th style="background:#CCCCCC;"></th>
                                </tr>
                            </thead>
                            <tbody class="sub" id="div1">
                            <tr id='addrr0'>
                                            <td><input type="text" name="n_sub[]" placeholder="">
                                            </td>
                                            <td><input type="text" name="sub[]" placeholder=""></td>
                                            <td><button type="button"
                                                    class="btn btn-danger btn-circle increase-row RemoveRow btndis"><i
                                                        class="fa fa-minus"></button></td>
                                        </tr>
                                        <tr id='addrr1'></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <input type="submit" value="ยืนยัน" name="save" class="btn btn-primary">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- modal เพิ่มอะไหล่ -->


    <?php
include '../Template/templsidebar.php';
         include '../database/connect.php';


    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = " SELECT   *
        FROM  tdoctmajob m, tdoctmajobdate d, tmstvehicle v,tmstmdepartment depart
        WHERE  m.XVMajDocNo = d.XVMajDocNo
        AND m.XVVehCode = v.XVVehCode
        AND v.XVDptCode = depart.XVDptCode
        AND m.XVMajDocNo ='$id'"; //ตัวสมบูรณ์

$stmt = $dbh->query($sql);
while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
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
                            <form action="insertTest.php" method="POST" class="form-inline" id="form1" enctype='multipart/form-data'>


                            <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 ml-auto">
                                        <div class="col text-right">
                                        <label for="numb">เลขที่ใบแจ้งซ่อม : <input type="text" name="XVMajDocNo" id="jobid"
                                            class="form-control" value="<?php echo $row["XVMajDocNo"];?>"  readonly></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 ml-auto">
                                <div class="col text-right">
                                    <label for="numb">วันที่แจ้งซ่อม : <input type="text" name="numb"
                                            class="form-control" value="<?php $datecon = $row["XDMajDate"];
                                                         $DN = str_replace('-', '/', $datecon);
                                                          $Dnew =  date('d/m/Y', strtotime($DN));
                                                          echo $Dnew;?>" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อเครื่องจักร :</label>
                                            <input id="XVVehTypeName" name="XVVehTypeName" class="form-control" value="<?php echo $row["XVVehName"];?>"
                                                style="width:60%" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                <div class="col text-right">
                                    <label for="numb">หมายเลขเครื่องจักร : <input type="text" size="17" name="noof" value="<?php echo $row["XVVehCode"];?>"
                                            class="form-control" id="noof" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="col text-right">
                                    <label for="numb">ชื่อไชต์งาน : <input type="text" size="30" name="dname" id="dname" value="<?php echo $row["XVDptname"];?>"
                                            class="form-control" readonly></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col text-right">
                                    <label for="numb">หมายเลขไซต์งาน : <input type="text" size="17" name="dcode" value="<?php echo $row["XVDptCode"];?>"
                                            id="dcode" class="form-control" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="numb">ตำแหน่งเครื่องจักร ณ ปัจจุบัน เลขที่:
                                    <input type="text" style="margin: 0px 10px;" size="10" name="dnum" id="dnum" value="<?php echo $row["XVDptNumber"];?>" readonly
                                        class="form-control">
                                   ตำบล:<input type="text" style="margin: 0px 10px;" size="10" name="dsub" id="dsub" value="<?php echo $row["XVDptSub_district"];?>" readonly
                                        class="form-control">
                                    อำเภอ:<input type="text" style="margin: 0px 10px;" size="10" name="ddis" id="ddis" value="<?php echo $row["XVDptDistrict"];?>" readonly
                                        class="form-control">
                                     จังหวัด:<input type="text" style="margin: 0px 10px;" size="10" name="dpro" id="dpro" value="<?php echo $row["XVDptProvince"];?>" readonly
                                        class="form-control"></label>
                            </div>
                        </div>
                                <?php }?>


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
                                                    <th style="background:#CCCCCC;">ลำดับ</th>
                                                    <th style="background:#CCCCCC;">เรื่องที่แจ้ง</th>
                                                    <th style="background:#CCCCCC;">สาเหตุที่ทราบ</th>
                                                    <th style="background:#CCCCCC;">อะไหล่ที่ต้องใช้</th>
                                                    <th style="background:#CCCCCC;">แนบรูป</th>
                                                    <th style="background:#CCCCCC;">หมายเหตุ</th>
                                                </tr>
                                            </thead>
                                            <tbody class="sub">
                                                <?php
                                             include '../database/connect.php';
                                                $cnt = 1;
                                                $sql2 = "SELECT  jd.XIMajdSeqNo,jd.XVMajdSubject,jd.XVMajdCause
                                                FROM  tdoctmajob j ,tdoctmajobdetail jd
                                                WHERE  j.XVMajDocNo = jd.XVMajDocNo
                                                AND j.XVMajDocNo = '$id'";
                                                $stmt2 = $dbh->query($sql2);
                                                while ($row2=$stmt2->fetch(PDO::FETCH_ASSOC)){

                                            ?>
                                                <tr id='addr0'>
                                                    <td><input style="width:25px; height:25px; margin:10px 25px 0" type="checkbox" name="repair_check" id="<?php echo $cnt; ?>" value="<?php echo $row2["XIMajdSeqNo"];?>" class="repair_check"></td>

                                                    <td class="seq"><?php echo $row2["XIMajdSeqNo"];?></td>


                                                    <td class="seq" hidden><input type="text" name="sequency[]" value="<?php echo $row2["XIMajdSeqNo"];?>" readonly></td>
                                                    <td><input type="text" name="n_sub[]"
                                                            placeholder="กรุณากรอกเรื่องที่แจ้ง"
                                                            value="<?php echo $row2["XVMajdSubject"];?>" readonly>
                                                    </td>
                                                    <td><input type="text" name="sub[]" placeholder="กรุณากรอกสาเหตุ"
                                                            value="<?php echo $row2["XVMajdCause"];?>" readonly></td>
                                                    <td align="center"><button type="button" disabled id="<?php echo 'addPartt'.$cnt; ?>" class="btn btn-success mr-auto addPart">เพิ่มอะไหล่</button></td>
                                                    <td align="center"><input type="file" name="multiImg<?php echo $cnt; ?>[]" class="custom-file-input"  multiple>แนบรูป</input></td>
                                                    <td><input type="text" placeholder="กรุณาใส่หมายเหตุ" name="note[]" id="<?php echo 'note'.$cnt; $cnt++;?>"></td>
                                                </tr>
                                                <!-- <tr id='addr1'></tr> -->
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
                                        <?php  $sql = " SELECT   *
                                        FROM  tdoctmajob m, tdoctmajobdate d
                                        WHERE  m.XVMajDocNo = d.XVMajDocNo
                                        AND m.XVMajDocNo ='$id'"; //ตัวสมบูรณ์
                                    $stmt = $dbh->query($sql);
                                    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <label for="numb">สถานะรถ : <?php echo $row["XVMaCarStatus"];?>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                        <label for="numb">ชื่อผู้แจ้งซ่อม : <input type="text" size="40" name="nameofuser"
                                            id="nameofuser" value="ธุรการ" class="form-control" readonly></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col text-left">

                                        <label for="numb">วันนัดประเมิน : <?php $datecon2 = $row["XDMajEstAppPlanDate"];
                                                     $DN2 = str_replace('-', '/', $datecon2);
                                                      $Dnew2 =  date('d/m/Y', strtotime($DN2));
                                                      ?> <input type="text" class="form-control" size="6" value="<?php echo $Dnew2;?>" disabled>

                                      </label>
                                      <label for="numb">วันที่ประเมิน : <?php $datecon1 = $row["XDMajEstActualDate"];
                                                   $DN1 = str_replace('-', '/', $datecon1);
                                                    $Dnew1 =  date('d/m/Y', strtotime($DN1));
                                                    ?><input type="text" class="form-control" size="6" value="<?php echo $Dnew1; }?>" disabled>
                                         </label>
                                         <label for="numb">วันที่ประเมินเสร็จ : <input id="XDMajFinishEstDate" size="6"
                                                    name="XDMajFinishEstDate" class="form-control"
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
                                                    AND tnc.XVEpyCode = e.XVEmpCode
                                                    AND j.XVMajDocNo = '$id' ";
                                                     $stmt = $dbh->query($sql);
                                                     while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                                    ?>

                                            <label for=""> <?php echo  $row["XVEpyCode"]." ".$row["XVEmpName"];?> </label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <div class="col-md-6">
                                        <div class="col text-left">
                                            <button type="button" class="btn btn-danger mr-auto"
                                                onclick="window.location.href='listEvaluate.php'">กลับ</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-primary submit_file"
                                                data-dismiss="modal" name="save">บันทึก</button>
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
            <?php } ?>
        </div>
        <!-- /#wrapper -->


        <script src="../vendor/js/datepicker.js"></script>
        <script src="../vendor/js/datepicker.th-TH.js"></script>
        <script src="../vendor/js/bootstrap-select.js"></script>
        <script>
        $(document).ready(function(){
            $(".submit_file").click(function(e){
                var $fileUpload = $("input[type='file']");
                if (parseInt($fileUpload.get(0).files.length)>5){
                    e.preventDefault(e);
                    Swal.fire({
                    title: 'ไม่สามารถเพิ่มรูปภาพได้!',
                    text: 'สามารถเพิ่มรูปภาพได้ไม่เกิน 5 รูป',
                    icon: 'warning',
                    confirmButtonText: 'ปิด'
                    })
                    }
            });
        });
            $(document).ready(function () {
                ($(".repair_check").click(function () {
                    if($(this).is(":checked")){
                        // alert(this.id)
                        $("#addPartt" + this.id).prop('disabled', false);
                        $("#note" + this.id).prop('disabled', true);
                    }else if($(this).is(":not(:checked)")){
                        $("#addPartt" + this.id).prop('disabled', true);
                        $("#note" + this.id).prop('disabled', false);
                        $("#note" + this.id).attr("placeholder", "กรุณาใส่หมายเหตุ");
                    }
                }));
            });

        function addNo(a) {
            let j = a
            $("#add_row1").click(() => {
                $('tr').find('input').prop('disabled', false)
                $('#addrr' + j).html("<td>" + (j + 1) +
                    "</td><td><input type='text' name='n_sub[]'  placeholder='กรุณากรอกเรื่องที่แจ้ง'/></td><td><input type='text' name='sub[]' placeholder='กรุณากรอกสาเหตุ'/></td><td><button type='button' id='add_row1' class='btn btn-danger btn-circle increase-row RemoveRow'><i class='fa fa-minus'></button></td>"
                );

                $('#tab_logic3').append('<tr id="addrr' + (j + 1) + '"></tr>');
                j++;
            });
        }

        $(document).ready(()=> {
            $('.addPart').on('click',function() {
                $('#insertModal').modal('show')
                $('#div1').empty()
                $tr = $(this).closest('tr')

                var data = $tr.children("td").map(function() {
                    return $(this).text()
                }).get()

                $('#seqqe').val(data[1])
                var jobi = $('#jobid').val()
                console.log(data)
                $.ajax({
                    url: "test_t.php",
                    method: "POST",
                    data: {
                        id: data[1],
                        jobid: jobi
                    },
                    dataType: "JSON",
                    success: function(rows) {
                        countKey = Object.keys(rows).length;
                        addNo(countKey)
                        $('#tab_logic3').append('<tr id="addrr0"></tr>');
                        let j = 0
                        for (var k = 0; k < countKey; k = k+3) {
                            $('tr').find('input').prop('disabled', false)
                            $('#addrr' + j).html("<td hidden><input type='hidden' name='n_sub[]' value='" +
                                rows[k] +
                                "'  placeholder='กรุณากรอกเรื่องที่แจ้ง'/></td><td><input type='text' name='n_suub[]' value='" +
                                rows[k+1] +
                                "'  placeholder='กรุณากรอกเรื่องที่แจ้ง'/></td><td><input type='text' name='sub[]' value='" +
                                rows[k+2] +
                                "' placeholder='กรุณากรอกสาเหตุ'/></td><td><button type='button' id='add_row1' class='btn btn-danger btn-circle increase-row RemoveRow'><i class='fa fa-minus'></button></td>"
                            );

                            $('#tab_logic3').append('<tr id="addrr' + (j + 1) + '"></tr>');

                            j++
                        }
                    }

                })
            })
        })



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
            let i = 0;
            $("#add_row").click(function() {
                var select2 = $('#select2').val()
                var val_select2 = $('#val_select2').val()
                var value = $("#select2 option:selected");
                $('#tab_logic3').append('<tr id="addr' + (i) + '"></tr>');
                $('tr').find('input').prop('disabled', false)
                $('#addr' + i).html(
                    "<td hidden><input type='hidden' name='n_sub[]' value='"+ select2 +"' placeholder=''/></td><td><input type='text' name='name_sub[]' value='"+ value.text() +"' placeholder=''/></td><td><input type='text' name='sub[]' value='"+val_select2+"' placeholder=''/></td><td><button type='button' id='add_row1' class='btn btn-danger btn-circle increase-row RemoveRow'><i class='fa fa-minus'></button></td>"
                );
                $('#tab_logic3').append('<tr id="addr' + (i + 1) + '"></tr>');
                i++;
            });
        });

        $('table').on('click', '.RemoveRow', function() {
            $(this).closest('tr').remove();
        });

        $(function(){
            var $select = $(".1-100");
            for (i=1;i<=100;i++){
                $select.append($('<option></option>').val(i).html(i))
            }
        });
        </script>
</body>
<?php } ?>
</html>
