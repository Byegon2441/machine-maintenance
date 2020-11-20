<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.6.0/dist/sweetalert2.all.min.js"></script>
      <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <title></title>
  </head>
  <body>
<?php
session_start();
session_destroy();

echo '<script>';
    echo "Swal.fire({
        title: 'แจ้งเตือน',
        text: 'ออกจากระบบเรียบร้อยแล้ว',
        icon: 'success',
        confirmButtonText: 'Back'
      }).then(function() {
        window.location = 'login.php';
    });";
    echo '</script>';
?>

</body>
  </html>
