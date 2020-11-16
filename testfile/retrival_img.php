<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .column {
        float: left;
        width: 20%;
        padding: 10px;
    }

    /* Style the images inside the grid */
    .column img {
        opacity: 0.8;
        cursor: pointer;
    }

    .column img:hover {
        opacity: 1;
    }

    .closebtn {
        position: absolute;
        right: 50px;
        color: #FFFFFF;
        font-size: 35px;
        cursor: pointer;
    }
    </style>
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
                        <div class="row">
                            <?php
            include '../database/connect.php';
            $ig = $_GET['id'];
            $igg = $_GET['seq'];
            $sql = "SELECT XVPicturePath FROM tdoctmajobdetail WHERE XVMajDocNo = '$ig' AND XIMajdSeqNo = $igg";
            $stmt = $dbh->query($sql);
            $pat = "";
            while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                $pat = $row['XVPicturePath'];
            }
            // echo $pat;
            $dirname = "../checkParts/$pat";
            $images = glob($dirname."*.{jpg,gif,png}",GLOB_BRACE);
            
            
            foreach($images as $image) {
                echo '<div class="column">
                    <img src="'.$image.'" style="width:100%" onclick="myFunction(this);">
                </div>';
            }
            ?>
                        </div>
                        <div class="container">
                            <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                            <img id="expandedImg" style="width:92%">
                            <div id="imgtext"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function myFunction(imgs) {
        var expandImg = document.getElementById("expandedImg");
        expandImg.src = imgs.src;
        expandImg.parentElement.style.display = "block";
    }
    </script>
</body>

</html>