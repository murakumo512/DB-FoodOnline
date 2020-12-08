<?php
// ambil daa kiriman dari page pemanggil
  session_start();
  $user_check =$_SESSION['login_user']; 
  $member = $_SESSION['usr_member'];
  $xNama =$_SESSION['Nama'];
  $xId = $_SESSION['XId'];
  $xBalanced =$_SESSION['XBalanced'];
  $shipnota=$_SESSION['$shipnota']; 
  $idres=$_SESSION['idres'];
   
  if(!isset($user_check))
  {
    header("Location: index.html");
  }
  //session_destroy();
    echo "User aktif : $user_check <br>" ;
	echo "status : $member <br>";
    echo "Nama   : $xNama <br>" ;
	echo "Id : $xId <br> ";
    echo "Balanced : $xBalanced <br>" ;
    echo "No Nota :  $shipnota <br>" ;
	
	// akhir ambil daa kiriman dari page pemanggil
?>

<!DOCTYPE html>
<html>
<head>
 <title>Input Makanan dan Minuman</title>
</head>
<body>
<h3>Pilih Restaurant:</h3>
<form action="save_pesanan_food.php" method="get">
<input type="hidden" name="edit" value="t"/> 
<input type="hidden" name="new" value="t"/> 
<select name="idfood">
  <?php
   include "konekdb.php";
   
   //ambil data dari tb_rest dan foodndrink
$ssql = "SELECT restaurant.*, food_and_drink.*
FROM restaurant INNER JOIN food_and_drink 
ON restaurant.Restaurant_Id = food_and_drink.Restaurant_Id where food_and_drink.Restaurant_Id = $idres order by restaurant_name";

   $ambildata=mysqli_query($conn, $ssql);
   while($a=mysqli_fetch_array($ambildata))
   {
    ?>
     <option value="<?php echo $a['FodDr_Id'];?>"><?php echo $a['FodDr_Id']. " ".$a['FoDr_Name'] ;?></option>
    <?php 
	}
  ?>
</select>
	<br>
   Qty: <input type="text" name="qtyfood"><br>
   <input type="submit">
</body>
</html>