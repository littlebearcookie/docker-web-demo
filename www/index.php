<?php
echo "Hello Docker Compose!!!<br>";

$con = mysqli_connect("mysql", "root", "root", "demo");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Perform query
if ($result = mysqli_query($con, "SELECT * FROM users")) {
  $i = 1;
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "User " . $i . ": " . $row['name'] . "<br>";
    $i++;
  }
}

mysqli_close($con);
