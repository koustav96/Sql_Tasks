<?php

session_start();
if (isset($_SESSION["data"])) {
  header("location: homepage.php");
  exit();
}
require("email_validation.php");
include("connect.php");

function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($_SERVER['REQUEST_METHOD'] == "POST") {

  $name = sanitizeInput($_POST['name']);
  $mailId = sanitizeInput($_POST['mailId']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  if(!empty($name) && !empty($mailId) && !empty($password)) {

    $checkQuery = "select * from Signup  where mail_id = '$mailId' ";

    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
      ?>
      <script type='text/javascript'> alert ('Mail ID already exists !!')</script>
      <?php
    }
    else {
      if (filter_var($mailId, FILTER_VALIDATE_EMAIL)) {
        if(isEmailValid($mailId)) {
              
          $insertQuery = "INSERT INTO Signup (name, mail_id, password) VALUES ('$name' ,'$mailId', '$password')";
          mysqli_query($conn, $insertQuery);
          ?>
          <script type='text/javascript'> alert ('SignUp successfully !! Now you can Login')</script>
          <?php               
        }
        else {
          ?>
          <script type='text/javascript'> alert ('Email Address is not valid !!')</script>
          <?php
        }
      }
      else {
        ?>
        <script type='text/javascript'> alert ('Invalid Email Format !!')</script>
        <?php
      }
    }
          
  }
  else {
    ?>
    <script type='text/javascript'> alert ('Please provide the require fields !!')</script>
    <?php
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <form  method="post">
      
      <label for="name">Name</label>
      <input type="text" name="name">
      
      <label for="mailId">Mail ID</label>
      <input type="text" name="mailId">

      <label for="password">Password</label>
      <input type="text" name="password">

      <input type="submit" value="Submit">
    </form>
    <p>
      Already have an account? <a href="login.php">Login</a>
    </p>
  </div>
</body>
</html>
