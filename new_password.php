<?php

include("connect.php");

$token = $_GET["token"];

$query = "select * from Signup  where Reset_token_hash = '$token' ";

$result = mysqli_query($conn, $query);
if (!$result) {
  ?>
  <script type='text/javascript'> alert ('Invalid token or token expired.')</script>
  <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <form action="process_new_password.php" method="post">
      <label for= "password">Password</label>
      <input type="text" name="password">
      <input type="hidden" name="token" value="<?php echo $token;?>">

      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
