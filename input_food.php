<?php
//panggil file koneksi.php yang sudah anda buat
include "konekdb.php";
// ambil data kiriman dari page pemanggil
  session_start();
  $user_check =$_SESSION['login_user']; 
  $member = $_SESSION['usr_member'];
  $xNama =$_SESSION['Nama'];
  $xId = $_SESSION['XId']; //idUser
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
    echo "Nama   : $xNama (". $xId . ") <br> ";  //id user
    echo "Balanced : $xBalanced <br>" ;
  echo "</td>";
  echo "</tr>";
  echo "</table>";
// akhir ambil data kiriman dari page pemanggil

?>

<!DOCTYPE html>
<html>
<head>
 <title>Input Order</title>
</head>
<body>
<h3>Pilih Restaurant:</h3>
<form action="save_pesanan_food.php" method="get">
<input type="hidden" name="edit" value="t"/> 

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