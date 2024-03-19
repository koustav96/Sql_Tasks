<?php

session_start();
if (isset($_SESSION["data"])) {
  header("location: homepage.php");
  exit();
}
include("connect.php");
require("email_process.php");
function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$email = sanitizeInput($_POST['email']);
$checkQuery = "select * from Signup  where mail_id = '$email' ";
$result = mysqli_query($conn, $checkQuery);
if (mysqli_num_rows($result) > 0) {
  $token = bin2hex(random_bytes(16));
  $token_hash = password_hash($token, PASSWORD_DEFAULT);
  $expiry = date("Y-m-d H:i:s", time() + 60 * 10);
  $query = "UPDATE Signup SET Reset_token_hash = '$token_hash', `Token_expiry_time` = '$expiry' WHERE Signup.mail_id = '$email' ";
  mysqli_query($conn, $query);
  send_email($email, $token_hash);
}
else {
  ?>
  <script type='text/javascript'> alert ('Your email is not registered with our database !!')</script>
  <?php
}
