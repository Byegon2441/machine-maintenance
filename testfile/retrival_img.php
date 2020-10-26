<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include '../database/connect.php';
    $sql = "SELECT XVPicturePath FROM tdoctmajobdetail WHERE XVMajDocNo = 'byymm-000001' AND XIMajdSeqNo = 1 ";
    $result2 = mysqli_query($connect,$sql) or die(mysqli_query($connect));
    $pat = "";
    while ($row2=mysqli_fetch_array($result2)){
        $pat = $row2['XVPicturePath'];
    }
    echo $pat;
    $dirname = "../checkParts/$pat";
    $images = glob($dirname."*.{jpg,gif,png}",GLOB_BRACE);
    
    foreach($images as $image) {
        echo '<img style="width: 50%;" src="'.$image.'" /><br />';
    }
    ?>
</body>
</html>
