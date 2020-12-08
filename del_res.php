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
 <h1>Delete Restaurant </h1>
 <br>
 <?php
include "konekdb.php";
// sql to delete a record
$sql = "delete FROM restaurant WHERE Restaurant_Id=$id";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?> 

<p><a href="index.html">ke Menu Utama</a></p>
<p><a href="r.php">ke Daftar Restaurant</a></p>
 </form>
</body>
</html>

 