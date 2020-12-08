<html>
<body>
<?php

$name = $_GET["Cons_Nama"];
$Balanced=$_GET["Cons_Balanced"];
$Loc=$_GET["Cons_Location"];
$id =$_GET["id"];
$x =$_GET["edit"];
$login =$_GET["login"];
$pas =$_GET["pas"];

include "konekdb.php";
if ($x=="t")
	{
		$sql = "INSERT INTO consumer (Cons_Nama,Cons_Balanced,Cons_Location,usr_id) 
		VALUES ('$name','$Balanced','$Loc','$login')";
		$sql1 = "INSERT INTO usr (usr_id,usr_pa,usr_member) VALUES ('$login','$pas','consumer')";
		$conn->query($sql1);
	}
	else
	{
		$sql = "UPDATE consumer set Cons_Nama='$name',Cons_Balanced=$Balanced,Cons_Location='$Loc' where Cons_id = $id";

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
<p><a href="c.php">ke Daftar Consumer</a></p>



</body>
</html> 