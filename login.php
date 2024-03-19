<?php

session_start();
if (isset($_SESSION["data"])) {
  header("location: homepage.php");
  exit();
}
include("connect.php");
if($_SERVER['REQUEST_METHOD'] == "POST") {
  $mailId = $_POST['mailId'];
  $password = $_POST['password'];
  if(!empty($mailId) && !empty($password)) {
    $query = "select * from Signup  where mail_id = '$mailId' ";
    $result = mysqli_query($conn, $query);
    if($result) {
      $userData = mysqli_fetch_assoc($result);
      if(password_verify($password, $userData['password'])) {
        $_SESSION["data"] = $mailId;
        header('location: homepage.php');
        exit;
      }
      ?>
      <script type='text/javascript'> alert ('Invalid username or password')</script>
      <?php
    }
  }
  ?>
  <script type='text/javascript'> alert ('Invalid username or password')</script>
  <?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <form method="post">

      <label for="mailId">Mail ID</label>
      <input type="text" name="mailId">

      <label for= "password">Password</label>
      <input type="text" name="password">

      <input type="submit" value="Submit">
    </form>
    <p>
      Don't have an account? <a href="signup.php">SignUp Here</a>
    </p>
    <p><a href="forgot_password.php">Forgot Password?</a></p>
  </div>
</body>
</html>
