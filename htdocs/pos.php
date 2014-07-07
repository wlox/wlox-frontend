<?php
$con=mysqli_connect("localhost","root","password","wlox");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM site_users");

echo "<table border='1'>
<tr>
<th>User</th>
<th>Balance BTC</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['user'] . "</td>";
  echo "<td>" . $row['btc'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>
