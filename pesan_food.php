<?php
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
    echo "User aktif : $user_check <br>" ;
	echo "status : $member <br>";
    echo "Nama   : $xNama <br>" ;
	echo "Id : $xId <br> ";
    echo "Balanced : $xBalanced <br>" ;
// akhir ambil data kiriman dari page pemanggil
?>

<!DOCTYPE html>
<html>
<head>
 <title>Pesan Makanan dan Minuman</title>
</head>
<body>
<h3>Pilih Restaurant:</h3>
<form action="daftar_pesan_food.php" method="get">
<input type="hidden" name="edit" value="t"/> 
<input type="hidden" name="new" value="y"/>  <!-- // untuk parameter insert master bila dipanggil dari page ini -->
<select name="idres">
  <?php
   include "konekdb.php";
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