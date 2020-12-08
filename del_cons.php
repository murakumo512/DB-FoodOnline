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
 <h1>Delete Consumer </h1>
 <br>
 <?php
include "konekdb.php";
// sql to delete a record
$sql = "delete FROM consumer WHERE Cons_Id=$id";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?> 
<meta http-equiv="refresh" content="0; url='c.php'" />
<p><a href="index.html">ke Menu Utama</a></p>
<p><a href="c.php">ke Daftar consumer</a></p>
 </form>
</body>
</html>

 