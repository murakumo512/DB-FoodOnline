<?php
include('konekdb.php');
$id = $_GET["id"];
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

 <title>Edit Data Restaurant</title>
</head>
<body>
 <h1>Edit Data Restaurant</h1>
 <br>
 <?php 
  $sql2 = "SELECT * FROM restaurant WHERE Restaurant_Id=$id";
  $query = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_array($query);
 ?>

<form method="get" action='save_res.php'>
 <input type="hidden" name="id" value="<?php echo $id?>"/>
  <input type="hidden" name="edit" value="y"/>    <!--  edit untuk kondisi di save_cons (jika y -> update) -->
<table   width: 40%>
  <tr> 
     <th><label>Nama Restaurant</label></th> 
	 <th><input type="text" name="Restaurant_Name" value="<?php echo $row['Restaurant_Name']; ?>"></th>
  </tr> 

  <tr> 
	<th><label>Location</label></th> 
	<th><input type="text" name="Retaurant_Location" value="<?php echo $row['Retaurant_Location']; ?>"></th>
  </tr> 
  <tr> 
  </tr>   
  <tr> 
    <th><input type="submit" name="simpan" value="Perbaharui"></th>
  <tr> 
  
  <table   width: 30%>
  <tr>
    <th><a href="index.html">Menu Utama</a></th>
    <th> <a href="r.php">Daftar Restaurant</a></th>
  </tr>
</table>
 </form>
</body>
</html>