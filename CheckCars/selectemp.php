<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <title>Test</title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
 <select id="a">
  <option name="One" value="1">One</option>
  <option name="Two" value="2">Two</option>
  <option name="Three" value="3">Three</option>
  <option name="Four" value="4">Four</option>
 </select>
<input type="text" name="" id="texts" value="">
<input type="submit" name="submit" id="submit" value="ยันยัน">
<script>
  $(document).ready(function() {
    $('#submit').click(function() {
      $('#texts').val($('#a :selected').val());
    });
  });
</script>
</body>
</html>
