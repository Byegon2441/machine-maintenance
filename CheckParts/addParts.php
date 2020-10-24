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
<!-- <<<<<<< HEAD -->
<?php 
// =======

// <body>

//     <?php include '../Template/temTechnician.php';
// >>>>>>> 8ff2228f701344c9827cd8e9e46cc952ec997013
//          include '../database/connect.php';
  

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
                                    $query = mysqli_query($connect,$sql);
                                    if($query){
                                        while($row=mysqli_fetch_array($query)){
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
                                <input class="form-control" id="val_select2" type="number" min="1" max="5"></input>
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
                                            <td><input type="text" name="n_sub[]" placeholder="กรุณากรอกเรื่องที่แจ้ง">
                                            </td>
                                            <td><input type="text" name="sub[]" placeholder="กรุณากรอกสาเหตุ"></td>
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
                            <form action="insertTest.php" method="POST" class="form-inline">


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
                                                $result2 = mysqli_query($connect,$sql2) or die(mysqli_query($connect));
                                                while ($row2=mysqli_fetch_array($result2)){
                                                
                                            ?>
                                                <tr id='addr0'>
                                                    <td><input type="checkbox" name="repair_check" id="<?php echo $cnt; ?>" value="<?php echo $row2["XIMajdSeqNo"];?>" class="repair_check"></td>
                                                    <td class="seq"><?php echo $row2["XIMajdSeqNo"];?></td>
                                                    <td><input type="text" name="n_sub[]"
                                                            placeholder="กรุณากรอกเรื่องที่แจ้ง"
                                                            value="<?php echo $row2["XVMajdSubject"];?>" readonly>
                                                    </td>
                                                    <td><input type="text" name="sub[]" placeholder="กรุณากรอกสาเหตุ"
                                                            value="<?php echo $row2["XVMajdCause"];?>" readonly></td>
                                                    <td align="center"><button type="button" disabled id="<?php echo 'addPartt'.$cnt; ?>" class="btn btn-success mr-auto addPart">เพิ่มอะไหล่</button></td>
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
                                            <label for="numb">สถานะรถ :
                                                <!-- <select name="" id="" class="form-control" disabled>
                                                    <option value="">fsdfdfghdghdghdghdghdghdgh</option>
                                                    <option value="">sdf</option>
                                                </select> -->
                                                <input class="form-control" type="text" value="รถใช้งานได้" readonly>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text-right">
                                            <label for="numb">ชื่อผู้แจ้งซ่อม : <input type="text" size="30"
                                                    name="nameof" class="form-control" readonly></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col text-left">
                                            <label for="numb">วันนัดประเมิน : <input type="text" size="6" name="as_date"
                                                    class="form-control" readonly>
                                            </label>
                                            <label for="numb">วันที่ประเมิน : <input type="text" size="6"
                                                    name="eva_date" class="form-control">
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
                                            <button type="button" class="btn btn-danger mr-auto"
                                                onclick="window.location.href='listEvaluate.php'">กลับ</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-primary"
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

            // $(document).ready(function(){
            //     $('input[type="checkbox"]').click(function(){
            //         if($(this).is(":checked")){
            //             $("#addPartt").prop('disabled', false);
            //             $("#note").prop('disabled', true);
            //         }else if($(this).is(":not(:checked)")){
            //             $("#addPartt").prop('disabled', true);
            //             $("#note").prop('disabled', false);
            //             $("#note").attr("placeholder", "กรุณาใส่หมายเหตุ");
            // }
            //     });
            // });
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
//  $(document).ready(function() {
//             let i = 1;
//             $("#add_row").click(function() {
//                 $('tr').find('input').prop('disabled', false)
//                 $('#addr' + i).html("<td>" + (i + 1) +
//                     "</td><td><input type='text' name='n_sub[]'  placeholder='กรุณากรอกเรื่องที่แจ้ง'/></td><td><input type='text' name='sub[]' placeholder='กรุณากรอกสาเหตุ'/></td><td><button type='button' id='add_row1' class='btn btn-danger btn-circle increase-row RemoveRow'><i class='fa fa-minus'></button></td>"
//                 );

//                 $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
//                 i++;
//             });
//         });
        
        $('table').on('click', '.RemoveRow', function() {
            $(this).closest('tr').remove();
        });
        </script>
</body>
<?php } ?>
</html>