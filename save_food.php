<html>
<body>
<?php
$name = $_GET["FoDr_Name"];
$Price = $_GET["FoDr_Price"];
$Stock = $_GET["FoDr_Stock"];
$id = $_GET["id"];
$x = $_GET["edit"];

include "konekdb.php";
if ($x=="t")
	{
		$sql = "INSERT INTO food_and_drink (FoDr_Name,FoDr_Price,FoDr_Stock,Restaurant_Id) 
		VALUES ('$name','$Price','$Stock','$id')";
	}
	else
	{
		$sql = "UPDATE food_and_drink set FoDr_Name='$name',FoDr_Price='$Price' where FodDr_Id = $id";
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
<p><a href="m.php">ke Daftar food_and_drink</a></p>



</body>
</html> 