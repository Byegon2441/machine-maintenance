<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบซ่อมบำรุงเครื่องจักร : ส่งมอบอะไหล่</title>

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
                    <h1 class="page-header">ส่งมอบอะไหล่</h1>
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
                            <form action="insertConParts.php" method='POST' class="form-inline">
                                

                                <div class="row">
                                    <div class="col-md-6"></div>
                                    <div class="col-md-6 ml-auto">
                                        <div class="col text-right">
                                        <label for="numb">เลขที่ใบแจ้งซ่อม : <input type="text" name="XVMajDocNo" id="jobid"
                                            class="form-control" value="<?php echo $row1["XVMajDocNo"];?>"  readonly></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 ml-auto">
                                <div class="col text-right">
                                    <label for="numb">วันที่แจ้งซ่อม : <input type="text" name="numb"
                                            class="form-control" value="<?php $datecon = $row1["XDMajDate"];
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
                                            <input id="XVVehTypeName" name="XVVehTypeName" class="form-control" value="<?php echo $row1["XVVehName"];?>"
                                                style="width:60%" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                <div class="col text-right">
                                    <label for="numb">หมายเลขเครื่องจักร : <input type="text" size="17" name="noof" value="<?php echo $row1["XVVehCode"];?>"
                                            class="form-control" id="noof" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <div class="col text-right">
                                    <label for="numb">ชื่อไชต์งาน : <input type="text" size="30" name="dname" id="dname" value="<?php echo $row1["XVDptname"];?>"
                                            class="form-control" readonly></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col text-right">
                                    <label for="numb">หมายเลขไซต์งาน : <input type="text" size="17" name="dcode" value="<?php echo $row1["XVDptCode"];?>"
                                            id="dcode" class="form-control" readonly></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <label for="numb">ตำแหน่งเครื่องจักร ณ ปัจจุบัน เลขที่:
                                    <input type="text" style="margin: 0px 10px;" size="10" name="dnum" id="dnum" value="<?php echo $row1["XVDptNumber"];?>" readonly
                                        class="form-control">
                                   ตำบล:<input type="text" style="margin: 0px 10px;" size="10" name="dsub" id="dsub" value="<?php echo $row1["XVDptSub-district"];?>" readonly
                                        class="form-control">
                                    อำเภอ:<input type="text" style="margin: 0px 10px;" size="10" name="ddis" id="ddis" value="<?php echo $row1["XVDptDistrict"];?>" readonly
                                        class="form-control">
                                     จังหวัด:<input type="text" style="margin: 0px 10px;" size="10" name="dpro" id="dpro" value="<?php echo $row1["XVDptProvince"];?>" readonly
                                        class="form-control"></label>
                            </div>
                        </div>


                                <div class="panel panel-default" style="margin-top:20px;">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">รายละเอียดการแจ้งซ่อม</h3>
                                    </div>

                                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                    <?php 

                        include '../database/connect.php';
                                     $sql2 = " SELECT   *
                                     FROM  tdoctmajob m,TDocTMaJobDetail detail
                                     WHERE  m.XVMajDocNo = detail.XVMajDocNo 
                               
                                     AND m.XVMajDocNo ='$id'"; //ค้นคืน รายการ เรื่องที่แจ้ง
                        
                                    $result2 = mysqli_query($connect,$sql2) or die(mysqli_query($connect));
                                    while ($row2=mysqli_fetch_array($result2)){
                                        
                                        
                               
                                    ?>
                                        <table class="table table-bordered" id="tab_logic">
                                            <thead>
                                            อนุมัติการซ่อม : <?php if($row2["XVMajConfirm"]=="confirm"){ echo 'อนุมัติแล้ว';}else{echo 'ไม่อนุมัติ';}?> <br>
                                            
                                                    รายการที่ : <?php echo $row2["XIMajdSeqNo"];?>
                                                   เรื่องที่แจ้ง : <?php echo $row2["XVMajdSubject"];?>
                                                   
                                    
                                                   สาเหตุที่ทราบ : <?php echo $row2["XVMajdCause"];?>
                                                  
                                    
                                                   <th style="background:#CCCCCC;">อะไหล่พร้อม</th>
                                                    <th style="background:#CCCCCC;">ลำดับ</th>
                                                    <th style="background:#CCCCCC;">รายการอะไหล่ </th>
                                                    <th style="background:#CCCCCC;">จำนวน</th>
                                                    <th style="background:#CCCCCC;">คลัง</th>
                                                    <th style="background:#CCCCCC;">สั่งซื้อ</th>
                                                    <th style="background:#CCCCCC;">จำนวนวัน</th>
                                                    <th style="background:#CCCCCC;">วันที่ของมา</th>
                                                    <th style="background:#CCCCCC;">เบิก</th>
                                                    <th style="background:#CCCCCC;">วันที่เบิก</th>
                                                </tr>
                                            </thead>
                                        
                                            <tbody class="sub">
                                               
                                 <?php ?>

                                          <tr id='addr0'>
                                          
                                  
                                           <?php  
                                            $count = 0 ;
                                    $sql3 = " SELECT   * 
                                    FROM  TDocTMaJobDetail detail,TDocTMaMachine_parts_use partsuse ,TMstMMachine_parts parts
                                    WHERE  detail.XVMajDocNo = partsuse.XVMajDocNo 
                                    And detail.XIMajdSeqNo = partsuse.XIMajdSeqNo
                                    AND partsuse.XVMachinePartsCode = parts.XVMachinePartsCode
                                    AND detail.XVMajDocNo='$id'
                                    AND partsuse.XIMajdSeqNo = %s"; //ค้นคืน รายการ อะไหล่ของแต่ละรายการเรื่องที่แจ้ง
                                     $sql3 = sprintf($sql3,$row2['XIMajdSeqNo']);
                                           $result3 = mysqli_query($connect,$sql3) or die(mysqli_query($connect));
                                          
                                            while ($row3=mysqli_fetch_array($result3)){
                                         $count ++ ;
                                         ?>
                                        <?php if($row3["XVMajConfirm"]=="confirm"){?>
                                           <td style="width:100px; "><input style="width:25px; height:25px; margin:5px 35px 0;" type="checkbox" name="parts_ready[<?php echo $row3["XIMachinePartsSeqNo"];?>]" id="<?php echo $row3["XIMachinePartsSeqNo"];?>" class="parts_ready" value="1" <?php if(isset($row3['XVPartsReady']) && $row3['XVPartsReady']=="1"){echo "checked";}?>></td>
                                           <?php }else{?>
                                            <td></td>
                                        <?php } ?>
                                         <td><?php echo $count;?></td>
                                         
                                         <td>
                                         <?php echo $row3["XVMachinePartsName"];?>
                                         <?php 
                                          $sql4 = "SELECT DATE_FORMAT(XDMachinePartsReady, '%d/%m/%Y') AS DA,DATE_FORMAT(XDMachinePartsUse, '%d/%m/%Y') AS DS,XDMachinePartsReady,XDMachinePartsUse
                                            FROM tdoctmamachine_parts_use
                                            WHERE XVMajDocNo='$id'
                                            AND XIMachinePartsSeqNo = '$row3[XIMachinePartsSeqNo]'
                                            AND XIMajdSeqNo = '$row2[XIMajdSeqNo]'"; //ค้นคืนวันที่เบิก วันที่ของมา ถ้ามีอยู่แล้ว
                                            $result4 = mysqli_query($connect,$sql4) or die(mysqli_query($connect));
                                          
                                         ?>
                                        
                                         </td>
                                         
                                         <td style="width:60px;"> <?php echo $row3["XVAmount"]; ?></td>
                                        <?php if($row3["XVMajConfirm"]=="confirm"){  
                                              while ($row4=mysqli_fetch_array($result4)){
                                            ?>
                                         <td><input style="width:25px; height:25px; margin:5px 25px 0;" type="radio" name="check_source[<?php echo $row3["XIMachinePartsSeqNo"];?>]" value="คลัง" <?php if(isset($row3['XVSource']) && $row3['XVSource']=="คลัง"){echo "checked";}?>></td>    <!-- คลัง -->
                                         <td><input style="width:25px; height:25px; margin:5px 25px 0;"  type="radio" name="check_source[<?php echo $row3["XIMachinePartsSeqNo"];?>]" value="สั่งซื้อ" <?php if(isset($row3['XVSource']) && $row3['XVSource']=="สั่งซื้อ"){echo "checked";}?>></td>    <!-- สั่งซื้อ -->
                                          <td style="width:80px;"><input type="number" name="dateforcoming[<?php echo $row3["XIMachinePartsSeqNo"];?>]" id="dateforcoming[<?php echo $row3["XIMachinePartsSeqNo"];?>]" min="0" value="<?php if(isset($row3['XVNumOfDays']) ){echo $row3['XVNumOfDays'];}?>"></td>  <!-- จำนวนวันที่ของจะมา-->
                                          
                                          <td> <input  size="11" name="XDMachinePartsReady[<?php echo $row3["XIMachinePartsSeqNo"];?>]" id="XDMachinePartsReady[<?php echo $row3["XIMachinePartsSeqNo"];?>]"  class="form-control" data-toggle="datepicker"value="<?php if(isset($row4['DA']) && $row4['XDMachinePartsReady']!= "0000-00-00"){echo $row4['DA'];}?>" > </td>      <!-- วันที่ของจะมา-->
                                          <td><input style="width:25px; height:25px; margin:5px 20px 0;" type="checkbox" name="dateforusing[<?php echo $row3["XIMachinePartsSeqNo"];?>]" id="<?php echo $row3["XIMachinePartsSeqNo"];?>" class="dateforusing" value="1"      <?php if(isset($row3['XVPickupParts']) && $row3['XVPickupParts']=="1"){echo "checked";}?>></td>    <!-- การเบิก-->
                                          
                                          <td> <input  size="6" name="XDMachinePartsUse[<?php echo $row3["XIMachinePartsSeqNo"];?>]" id="XDMachinePartsUse<?php echo $row3["XIMachinePartsSeqNo"];?>"  class="form-control hid" data-toggle="datepicker" disabled value="<?php if(isset($row4['DS']) && $row4['XDMachinePartsUse']!= "0000-00-00"){echo $row4['DS'];}?>"> </td>      <!-- วันที่เบิก-->
                                        <?php
                                    }//sql4
                                    }else{?>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        <?php } ?>
                                         </tr>
                                        <?php
                                        
                                     
                                     }//sql3
                                    }//sql2
                                    mysqli_close($connect);
                                    ?> 
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
                                            <label for="numb">สถานะรถ : <?php echo $row1["XVMaCarStatus"];?>
                                            </label>
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
                                            <label for="numb">วันนัดประเมิน : <?php $datecon2 = $row1["XDMajEstAppPlanDate"];
                                                         $DN2 = str_replace('-', '/', $datecon2);
                                                          $Dnew2 =  date('d/m/Y', strtotime($DN2));
                                                          echo $Dnew2;?>
                                                    
                                            </label>
                                            <label for="numb">วันที่ประเมิน : <?php $datecon3 = $row1["XDMajEstActualDate"];
                                                         $DN3 = str_replace('-', '/', $datecon3);
                                                          $Dnew3 =  date('d/m/Y', strtotime($DN3));
                                                          echo $Dnew3;?>
                                                    
                                            </label>
                                            <label for="numb">วันที่ประเมินเสร็จ : <?php $datecon4 = $row1["XDMajFinishEstDate"];
                                                         $DN4 = str_replace('-', '/', $datecon4);
                                                          $Dnew4 =  date('d/m/Y', strtotime($DN4));
                                                          echo $Dnew4;?>
                                                    
                                                    </label>
                                          
                                            <label for="numb">วันที่อนุมัติซ่อม : <?php $datecon5 = $row1["XDMajConfirmDate"];
                                                         $DN5 = str_replace('-', '/', $datecon5);
                                                          $Dnew5 =  date('d/m/Y', strtotime($DN5));
                                                          echo $Dnew5;?>
                                                    
                                            </label>
                                        <?php if(isset($row1['XDMajSpareDate']) && $row1['XDMajSpareDate'] != "0000-00-00"){
                                          
                                            echo "<label for='numb'>วันที่อะไหล่พร้อม : ".$row1['XDMajSpareDate']."</label>";
                                        }else{?>
                                            <label for="numb">วันที่อะไหล่พร้อม : <input id="XDMajSpareDate" size="6" name="XDMajSpareDate" 
                                                    class="form-control" data-toggle="datepicker"  >
                                            </label>
                                        <?php }?>
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

                                            <label for=""> <?php echo  $row["XVEpyCode"]." ".$row["XVEpyFirstname"]." ".$row["XVpyLastname"];?> </label>
                                            <?php } ?>
                                        </div>
                                    </div>
                                                    
                                </div>

                                <div class="modal-footer">
                                    <div class="col-md-6">
                                        <div class="col text-left">
                                        <a type="button" class="btn btn-danger mr-auto" href="ListConParts.php" >กลับ</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col text-right">

                                        <?php $sql5="SELECT COUNT(u.XIMachinePartsSeqNo) as total
                                        FROM tdoctmamachine_parts_use u ,tdoctmajobdetail d
                                        WHERE u.XVMajDocNo = d.XVMajDocNo
                                            AND u.XIMajdSeqNo = d.XIMajdSeqNo
                                            AND d.XVMajConfirm = 'confirm'
                                            AND u.XVMajDocNo='$id';";
                                              $result5 = mysqli_query($connect,$sql5) or die(mysqli_query($connect));
                                              $row5=mysqli_fetch_array($result5);
                                        ?>
                                        <input type="hidden" name="count_column" value="<?php echo $row5['total'];?>" id='count_column' >
                                        <input type="hidden" value="<?php echo $id?>" name='id'>
                                        <input type="submit" class="btn btn-success btndis" name="save"

                                                value="บันทึก">
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
        $(document).ready(function () {
           // $(".hid").hide()
           $("#XDMajSpareDate").prop('disabled', true);
        $(".dateforusing").click(function () {
                    if($(this).is(":checked")){
                       
                       //$("#XDMachinePartsUse"+this.id).show()
                       $("#XDMachinePartsUse"+this.id).prop('disabled', false);
                    }else if($(this).is(":not(:checked)")){
                       // $("#XDMachinePartsUse"+this.id).hide()
                        $("#XDMachinePartsUse"+this.id).prop('disabled', true);
                    }
                });

                $(".parts_ready").click(function (){
                    $('#XDMajSpareDate').prop('disabled',$('.parts_ready:checked').length != $("#count_column").val());
                    
                 })       
      
           
            });
        // $('#XDMachinePartsReady').change(() => {
        //      $('#XDMachinePartsReady').val()
        //     const date1 = new Date('7/13/2010');
        //     const date2 = new Date();
        //     const diffTime = Math.abs(date2 - date1);
        //     const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
        //     console.log( $('#XDMachinePartsReady').val())
        //     // console.log(diffTime + " milliseconds");
        //     // console.log(diffDays + " days");
        // })
       

    //    $('#XDMachinePartsUse[]').change(() => {
    //        $('#dateforusing').append("เบิกแล้ว")
    //    })
            
        </script>
       
     


</body>

</html>