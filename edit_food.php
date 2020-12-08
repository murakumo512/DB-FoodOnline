<?php
include('konekdb.php');
$id = $_GET["id"];
$rest = $_GET["R"];
?>

<!DOCTYPE html>
<html>
<head>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

 <title>Edit Data Food</title>
</head>
<body>
 <h1>Edit Data Food</h1>
 <br>
 <?php 
  $sql2 = "SELECT * FROM food_and_drink WHERE FodDr_Id=$id";
  $query = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_array($query);
 ?>

<form method="get" action='save_food.php'>
 <input type="hidden" name="id" value="<?php echo $id?>"/>
  <input type="hidden" name="edit" value="y"/>    <!--  edit untuk kondisi di save_cons (jika y -> update) -->
<table   width: 40%>
  <tr> 
     <th><label>Nama Restaurant</label></th> 
<!--	 <th><input type="text" name="Restaurant_Name" value="<?php echo $row['Restaurant_Name']; ?>"></th>
-->
<th> <?php echo $rest; ?></th>
  </tr> 

  <tr> 
	<th>FoDr_Name: <input type="text" name="FoDr_Name" value="<?php echo $row['FoDr_Name']; ?>" ></th>
	<th>FoDr_Price: <input type="text" name="FoDr_Price" value="<?php echo $row['FoDr_Price']; ?>"></th>
	<th>FoDr_Stock: <input type="text" name="FoDr_Stock" value="<?php echo $row['FoDr_Stock']; ?>"></th>
  </tr> 
  <tr> 
    <th><input type="submit" name="simpan" value="Perbaharui"></th>
  <tr> 
  
  <table   width: 30%>
  <tr>
    <th><a href="index.html">Menu Utama</a></th>
    <th> <a href="m.php">Daftar Menu</a></th>
  </tr>
</table>
 </form>
</body>
</html>