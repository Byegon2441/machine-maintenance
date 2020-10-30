<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    include '../Template/templCRUD.php';?>
    <div class="container">
        <div class="panel panel-default" style="margin-top:20px;">
            <div class="panel-heading">
                <h3 class="panel-title">รูปอะไหล่</h3>
            </div>
                <div class="panel-body">
                    <div class="col">
                        <div class="col-md-12">
            <?php
            include '../database/connect.php';
            $ig = $_GET['id'];
            $igg = $_GET['seq'];
            $sql = "SELECT XVPicturePath FROM tdoctmajobdetail WHERE XVMajDocNo = '$ig' AND XIMajdSeqNo = $igg";
            $result2 = mysqli_query($connect,$sql) or die(mysqli_query($connect));
            $pat = "";
            while ($row2=mysqli_fetch_array($result2)){
                $pat = $row2['XVPicturePath'];
            }
            // echo $pat;
            $dirname = "../checkParts/$pat";
            $images = glob($dirname."*.{jpg,gif,png}",GLOB_BRACE);
            
            foreach($images as $image) {
                echo '<img style="width: 500px; height:500px;" src="'.$image.'" />&nbsp </n>';
            }
            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
