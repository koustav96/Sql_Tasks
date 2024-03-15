<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details Entry</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <form action="data.php" method="post">
      
      <label for="firstName">Employee Firstname</label>
      <input type="text" name="firstName">
      
      
      <label for="lastName">Employee Lastname</label>
      <input type="text" name="lastName">
      
      <label for="codeName">Employee Code Name</label>
      <input type="text" name="codeName">

      <label for="id">Employee ID</label>
      <input type="text" name="id">
      
      <label for="domain">Employee Domain</label>
      <input type="text" name="domain">
      
      <label for="salary">Employee Salary</label>
      <input type="text" name="salary">
      
      <label for="percentile">Graduation Percentile</label>
      <input type="text" name="percentile">

      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
