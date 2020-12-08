<?php
include('konekdb.php');
$id = $_GET["id"];
$Ship_nota= $_GET["Ship_nota"];
$resid=$_GET["resid"];
$qty=$_GET["qty"];
$FodDr_Id = $_GET["FodDr_Id"];
?>

<!DOCTYPE html>
<html>
<head>
 <title>Delete Data</title>
</head>
<body>
 <h1>Delete Food/Drink </h1>
 <br>
 <?php
include "konekdb.php";
	// eksekusi restore  stok
			// cari stok yg ada
		$sssql='SELECT * FROM food_and_drink WHERE FodDr_Id='.$FodDr_Id ;

		$resultA = mysqli_query($conn, $sssql);
		if (mysqli_num_rows($resultA) > 0) 
		{
		   while($row = mysqli_fetch_assoc($resultA)) 
		   {
			$Stock= $row["FoDr_Stock"];
			}
		}
		$sisastok = $Stock +$qty;
		$sql2 = "UPDATE food_and_drink set FoDr_Stock=$sisastok where FodDr_Id =". $FodDr_Id;
        $conn->query($sql2);

$sql = "delete FROM orderlistdetailed WHERE Ord_id=$id";

if ($conn->query($sql) === TRUE) {
 echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?> 

<p><a href="utama.html">ke Menu Utama</a></p>
<p><a href="IsiOrderDetail.php?id=<?php echo $Ship_nota ?>&resid=<?php echo $resid ?>">ke Daftar Menu</a></p>
 </form>
</body>
</html>
