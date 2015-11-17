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
<th>BTC</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  $user=$row['user'].$row['email'];
  $hash=hash('sha512',$user);
  echo "<tr>";
  echo "<td>" . $hash . "</td>";
  echo "<td>" . $row['btc'] . "</td>";
  echo "</tr>";
}

echo "</table>";


echo "<table border='1'>
<tr>
<th>Total Liabilities</th>
</tr>
<tr>
<th>Bitcoin</th>

</tr>";
$result = mysqli_query($con,"SELECT SUM(btc) AS TotalLiabilities FROM site_users");
echo "<tr>";

while($row = mysqli_fetch_array($result)) {
  $tl=$row['TotalLiabilities'];
  echo "<td>".$tl."</td>";
}

echo "</tr>";
mysqli_close($con);
?>
