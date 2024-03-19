<?php

include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $token = $_POST['token'];
  $query = "UPDATE Signup SET password = '$password' WHERE Reset_token_hash = '$token' ";
  $result = mysqli_query($conn, $query);  
  if ($result) {
  ?>
    <script type='text/javascript'>alert('Password changed, Now you can LogIn !!')</script>
  <?php
  }
}
?>
