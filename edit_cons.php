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

 <title>Edit Data Consumer</title>
</head>
<body>
 <h1>Edit Data Consumer</h1>
 <br>
 <?php 
  $sql2 = "SELECT * FROM consumer WHERE Cons_Id=$id";
  $query = mysqli_query($conn, $sql2);
  $row = mysqli_fetch_array($query);
 ?>

<form method="get" action='save_cons.php'>
 <input type="hidden" name="id" value="<?php echo $id?>"/>
  <input type="hidden" name="edit" value="y"/>    <!--  edit untuk kondisi di save_cons (jika y -> update) -->
<table   width: 40%>
  <tr> 
     <th><label>Nama Consumer</label></th> 
	 <th><input type="text" name="Cons_Nama" value="<?php echo $row['Cons_Nama']; ?>"></th>
  </tr> 
  <tr> 
	<th><label>Balanced</label></th> 
	<th><input type="text" name="Cons_Balanced" value="<?php echo $row['Cons_Balanced']; ?>"></th>
  </tr> 

  <tr> 
	<th><label>Location</label></th> 
	<th><input type="text" name="Cons_Location" value="<?php echo $row['Cons_Location']; ?>"></th>
  </tr> 
  <tr> 
  </tr>   
  <tr> 
    <th><input type="submit" name="simpan" value="Perbaharui"></th>
  <tr> 
  
  <table   width: 30%>
  <tr>
    <th><a href="index.html">Menu Utama</a></th>
    <th> <a href="c.php">Daftar consumer</a></th>
  </tr>
</table>
 </form>
</body>
</html>