<?php

require 'cred.php';

global $servername, $username, $password, $dbname;
$conn = new mysqli(
    $servername,
    $username,
    $password,
    $dbname
  );

// For checking if connection is successful or not.
if ($conn->connect_error) {
    die("Connection failed: "
      . $conn->connect_error);
  }
