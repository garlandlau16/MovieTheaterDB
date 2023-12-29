<html>
<head> <title> Advance Search Results </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
  font-family: 'Verdana', sans-serif;
}

.content {
  max-width: 500px;
  margin: auto;
  background: white;
  padding: 10px;
}
</style>
</head>
<body style="background-color:white;">

<div = "content">
  <p> Back to query page:
    <a 
    href="https://portal.azure.com/#@redhawks.onmicrosoft.com/resource/subscriptions/351b41fd-93b6-4f11-9aca-4bc5e6293977/resourceGroups/resource1/providers/Microsoft.Sql/servers/cpsc3300/databases/Movie%20Theater%20DB/overview">
    Movie Database</a>
  </p>
</div>

<?php

$servername = "cpsc3300.database.windows.net";
$username = "admin1234";
$password = "password1234";
$dbname = "Movie Theater DB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully <br>";

$sql = "select * from Movie";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	echo "<table border = '1'>\n";
	// output data of each row
	while($row = mysqli_fetch_row($result)) {
		echo "<tr>\n";
		for ($i = 0; $i < mysqli_num_fields($result); $i++) {
			echo "<td>" . $row[$i] . "</td>\n";
		}
		echo "</tr>\n";
	}
	echo "</table>\n";
} 
else {
	echo "0 results";
}

mysqli_free_result($result);
mysqli_close($conn);
?>