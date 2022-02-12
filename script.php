<?php
$con = mysqli_connect("localhost","root","","hillside_stuff");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$result = mysqli_query($con, 'SELECT SUM(Total) AS value_sum FROM lpo'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
echo $sum;
?>