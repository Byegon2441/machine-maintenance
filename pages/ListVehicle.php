<?php
//หน้าหลักเครื่องจักร
include 'templsidebar.php';
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">เครื่องจักร</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    จัดการเครื่องจักร
                </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>รหัสเครื่องจักร</th>
                                        <th>หมายเลขเครื่องยนต์</th>
                                        <th>ไซต์งาน</th>
                                        <th>ประเภทเครื่องจักร</th>
                                        <th>แก้ไข</th>
                                        <th>ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeA">
                                        <td>WK852741963</td>
                                        <td>password</td>
                                        <td>Dee Makmak</td>
                                        <td>Dee Makmak</td>
                                        <td><input class='btn btn-primary' type='button' value='แก้ไข'/></td>
                                        <td><input class='btn btn-danger' type='button' value='ลบ'/></td>
                                    </tr>
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
        </div>
        <!-- /#page-wrapper -->
