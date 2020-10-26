<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dirname = "../img/";
    $images = glob($dirname."*.{jpg,gif,png}",GLOB_BRACE);
    
    foreach($images as $image) {
        echo '<img style="width: 50%;" src="'.$image.'" /><br />';
    }
    ?>
</body>
</html>
