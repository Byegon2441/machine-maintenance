<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php include 'templCRUD.php';
?>
<form class="form" action="insertEditMachine.php" method="post">
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
                    <p><div class="panel panel-primary">
                        <div class="panel-heading">
                                แก้ไขเครื่องจักร
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                                <div class="form-row">
                                    <div class="form-group">
                                                            <div class="col-lg-5">
                                                                <label for="inputEmail4">ชื่อเครื่องจักร : </label>
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <input type="text" class="form-control nameof" id="nameof1" name="XVVehName" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                                                            </div>

                                                                <div class="col-lg-5">
                                                                    <label for="inputEmail4">ทะเบียนรถ : </label>
                                                                </div>
                                                                <div class="form-group col-lg-6">
                                                                    <input type="text" class="form-control nameof" id="nameof2" name="XVVehRegistration" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                                                                </div>

                                                                    <div class="col-lg-5">
                                                                        <label for="inputEmail4">เบอร์รถ : </label>
                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <input type="text" class="form-control nameof" id="nameof3" name="XVVehNumber" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                                                                    </div>

                                                                        <div class="col-lg-5">
                                                                            <label for="inputEmail4">เลขทะเบียน MANGO : </label>
                                                                        </div>
                                                                        <div class="form-group col-lg-6">
                                                                            <input type="text" class="form-control nameof" id="nameof4" name="XVVehMango"  style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                                                                        </div>

                                                                                <div class="col-lg-5">
                                                                                    <label for="inputEmail4">ยี่ห้อ : </label>
                                                                                </div>
                                                                                <div class="form-group col-lg-6">
                                                                                    <input type="text" class="form-control nameof" id="nameof5" name="XVVehBrand" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                                                                                </div>

                                                                                    <div class="col-lg-5">
                                                                                        <label for="inputEmail4">รุ่นรถ : </label>
                                                                                    </div>
                                                                                    <div class="form-group col-lg-6">
                                                                                        <input type="text" class="form-control nameof" id="nameof6" name="XVVehModel" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                                                                                    </div>

                                                                                        <div class="col-lg-5">
                                                                                            <label for="inputEmail4">เลขคัทซี : </label>
                                                                                        </div>
                                                                                        <div class="form-group col-lg-6">
                                                                                            <input type="text" class="form-control nameof" id="nameof7" name="XVVehChassisNumber" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                                                                                        </div>

                                                                                                <div class="col-lg-5">
                                                                                                    <label for="inputEmail4">เลขเครื่อง : </label>
                                                                                                </div>
                                                                                                <div class="form-group col-lg-6">
                                                                                                    <input type="text" class="form-control nameof" id="nameof8" name="XVVehEngineNumber" style="width:120%" pattern="^[a-zA-Z0-9]+$" minlength="1" maxlength="100" title="YOUR_WARNING_TEXT">
                                                                                                </div>

                                                                                                    <div class="col-lg-5">
                                                                                                        <label for="inputEmail4">ชื่อประเภทเครื่องจักร : </label>
                                                                                                    </div>
                                                                                                      <div class="form-group col-lg-6">
                                                                                                        <select class="custom-select" id="inputGroupSelect01">
                                                                                                          <option selected>ค้าหาประเภทเครื่องจักร</option>
                                                                                                              <?php
                                                                                                              include '../database/connect.php';
                                                                                                              $sql = "SELECT XVVehTypeCode,XVVehTypeName FROM TMstMVehicleType";
                                                                                                              $result = mysqli_query($connect,$sql) or die(mysqli_query($connect));
                                                                                                              while ($row=mysqli_fetch_array($result)) {
                                                                                                                 echo "<option value="$row["XVVehTypeCode"]">"$row["XVVehTypeName"]"</option>";
                                                                                                              }
                                                                                                              mysqli_close($connect);
                                                                                                               ?>
                                                                                                        </select>
                                                                                                        </div>



                                        </div>

                                    <div class="col-sm-12" align="right">
                                        <button type="Reset" class="btn btn-danger" id="btn1"> <span class="fa fa-times"></span> Reset  </button>
                                        <button type="submit" class="btn btn-success" id="btn"> <span class="fa fa-check"></span> Save  </button>
                                    </div>
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

      </form>



    <!-- DataTables JavaScript -->'
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
    <script>
    let nameof = document.querySelectorAll('.nameof')
let form = document.querySelector('.form')


function check(e) {
        let tooLong=false
        nameof.forEach((answ) => {
            if(answ.value.length < 1){
                tooLong=true
            }
        })
                if(tooLong){
                    alert(' ?')
                }
}

form.addEventListener('submit' , check)
    </script>

</body>

</html>
