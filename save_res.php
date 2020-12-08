<html>
<body>
<?php

$name = $_GET["Restaurant_Name"];
$Loc = $_GET["Retaurant_Location"];
$id = $_GET["id"];
$x = $_GET["edit"];
include "konekdb.php";
if ($x=="t")
	{
		$sql = "INSERT INTO restaurant (Restaurant_Name,Retaurant_Location) VALUES ('$name','$Loc')";
	}
	else
	{
		$sql = "UPDATE restaurant set Restaurant_Name='$name',Retaurant_Location='$Loc' where Restaurant_id = $id";
	}

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
<!--    <meta http-equiv="refresh" content="1; url='c.php'" />
-->  <p><a href="index.html">ke Menu Utama</a></p>
<p><a href="r.php">ke Daftar Restaurant</a></p>



</body>
</html> 