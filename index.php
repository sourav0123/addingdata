<!DOCTYPE html>
<html>
<head>
<title>project </title>

</head>
<body>
<table border="1" width='35%'  > 
<tr>
<th>ID</th>
<th>Name</th>
<th>Password</th>
<th>gender</th>
<th>place</th>
<th>email</th>
</tr>
<?php
error_reporting(0);
$conn= mysqli_connect("localhost", "root", "12345678", "larveldb");
if($conn->connect_error){
	die("connection failed:".$conn-> connect_error);
}
$sql="select id, name , password , gender , place   , email from larvel";
$result=$conn->query($sql);
if($result->num_rows > 0){
	while($row=$result->fetch_assoc()){
		echo"<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row[password]."</td><td>".$row[gender]."</td><td>".$row[place]."</td><td>".$row[email]."</td></tr>";
			
	}
	echo"</table>";	
}
else {
	echo"0 result";
}

$conn->close();

?>
<div class ="menu">
<a href="first.html">add data</a>
</table>
</body>
</html>