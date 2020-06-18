<!DOCTYPE html>
<html>
<head>
<title>Displaying data</title>
<style>
table {
border-collapse: collapse;
width: 75%;
font-family: monospace;
font-size: 25px;
text-align: center;
}
th {
background-color: lightblue;
color: black;
}
</style>
</head>
<body>
<center>
<table>
<tr>
<th>Username</th>
<th>Password</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "sample");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM mydb";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["username"] . "</td><td>"
. $row["password"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</center>
</body>
</html>