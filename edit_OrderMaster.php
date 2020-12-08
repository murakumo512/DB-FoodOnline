<?php
//panggil file koneksi.php yang sudah anda buat
include "konekdb.php";
// ambil data kiriman dari page pemanggil
  session_start();
  $user_check =$_SESSION['login_user']; 
  $member = $_SESSION['usr_member'];
  $xNama =$_SESSION['Nama'];
  $xId = $_SESSION['XId'];
  $xBalanced =$_SESSION['XBalanced'];
  if(!isset($user_check))  // jika mau akses tidak melalui login, diarahkan ke login
  {
    header("Location: index.html");
  }
  //session_destroy();
  echo "<table border='1' width='900' align='center'>";
  echo "<tr>";
  echo "<td>";
    echo "User aktif : $user_check <br>" ;
	echo "status : $member <br>";
    echo "Nama   : $xNama <br>" ;
	echo "Id : $xId <br> ";  //id user
    echo "Balanced : $xBalanced <br>" ;
  echo "</td>";
  echo "</tr>";
  echo "</table>";
// akhir ambil data kiriman dari page pemanggil

$Ship_nota = $_GET["id"];
// ambil data dari shipping untuk di edit

   $ambildataSh=mysqli_query($conn, "SELECT * FROM shipping where Ship_nota='$Ship_nota'");
   while($a=mysqli_fetch_array($ambildataSh))
   {
	   $Restaurant_Id = $a['Restaurant_Id'];
	   $Driver_Id = $a['Driver_Id'];
	   $usr_id= $a['usr_id'];
	   $Ship_nota=$a['Ship_nota'];
	   $Ship_tgl=$a['Ship_tgl'];
   }

?>

<!DOCTYPE html>
<html>
<head>
 <title>Pesan Makanan dan Minuman</title>
</head>
<body>
<h3>Pilih Restaurant:</h3>
<form action="save_pesanan_food.php" method="get">
<input type="hidden" name="edit" value="y"/> 
<input type="hidden" name="Driver_Id" value="<?php echo $Driver_Id ?>"/> 
<input type="hidden" name="usr_id" value="<?php echo $usr_id ?>"/> 
<input type="hidden" name="Ship_tgl" value="<?php echo $Ship_tgl ?>"/> 
<input type="hidden" name="Ship_nota" value="<?php echo $Ship_nota ?>"/>
<input type="hidden" name="new" value="t"/>  <!-- // untuk parameter insert master bila dipanggil dari page ini -->
<br>
<select name="idres">
  <?php

   $ambildata=mysqli_query($conn, "SELECT * FROM restaurant ORDER BY Restaurant_Id ASC");
   while($a=mysqli_fetch_array($ambildata))
   {
    ?>
     <option value="<?php echo $a['Restaurant_Id'];?>"><?php echo $a['Restaurant_Id']. " ".$a['Restaurant_Name'] ;?></option>
    <?php 
	}
  ?>
 
</select>
	<br>

   <input type="submit">
</body>
</html>