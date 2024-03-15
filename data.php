<?php

require 'creds.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $codeName = $_POST['codeName'];
  $salary = $_POST['salary'];
  $domain = $_POST['domain'];
  $id = $_POST['id'];
  $percentile = $_POST['percentile'];
  $empCode = 'su_' . strtolower($firstName);
  
}
global $servername, $username, $password, $dbname;
$conn = new mysqli(
    $servername,
    $username,
    $password,
    $dbname
  );

  if ($conn->connect_error) {
    // Die connection if connection is not established.
    die("Connection failed: "
      . $conn->connect_error);
  }
  else {
    // Insert value into table with help of sql query.
    $query = "INSERT INTO employee_code_table VALUES('$empCode', '$codeName', '$domain')";
    mysqli_query($conn, $query);

    $query = "INSERT INTO employee_salary_table VALUES('$id', '$salary', '$empCode')";
    mysqli_query($conn, $query);

    $query = "INSERT INTO employee_details_table VALUES('$id', '$firstName', '$lastName', '$percentile')";
    mysqli_query($conn, $query);
    ?>
    <p>Form submitted successfully !!</p>
    <?php
  }
