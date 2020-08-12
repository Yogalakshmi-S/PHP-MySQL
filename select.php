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
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "sample";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "SELECT * FROM mydb";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["username"] . "</td><td>"
. $row["password"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }}
$conn->close();
?>
</table>    
</center>
</body>
</html>