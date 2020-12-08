<?php
include('konekdb.php');
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html>
<head>
 <title>Delete Data</title>
</head>
<body>
 <h1>Delete Order </h1>
 <br>
 <?php
include "konekdb.php";
// sql to delete a record
$sql = "delete FROM shipping WHERE Ship_nota='$id'";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
// sql to delete a record
$sql = "delete FROM orderlistdetailed WHERE Ship_nota='$id'";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?> 

<p><a href="index.html">ke Menu Utama</a></p>
<p><a href="om.php">ke Daftar Menu</a></p>
 </form>
</body>
</html>

 