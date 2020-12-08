<?php
include('konekdb.php');
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html>
<head>
 <title>Edit Data</title>
</head>
<body>
 <h1>Edit Data Driver</h1>
 <br>
 <?php
include "konekdb.php";
// sql to delete a record
$sql = "delete FROM drivers WHERE Driver_Id=$id";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?> 
<p><a href="index.html">ke Menu Utama</a></p>
<p><a href="x.php">ke Daftar Driver</a></p>
 </form>
</body>
</html>

 