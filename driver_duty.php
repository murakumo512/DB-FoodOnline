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

?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
	<head>
       <title>Data Pesanan Consumer</title>
	</head>
<body>
<h1 align="center"> Data Pesanan Consumer</h1>
    <table border="1" width="850" align="center">
       <thead>
 
       <tr>

           <th>No Order</th>
		   <th>Tgl Order</th>
		   <th width = "200">Restaurant</th>
       </tr>
       </thead>

       <tbody>
<?php
 
// bagian ini untuk menampilkan master pesanan
//$ssql="SELECT shipping.*, restaurant.Restaurant_Name, drivers.Driver_name, shipping.*, restaurant.*, drivers.*, shipping.Ship_ok, shipping.Ship_done
//FROM restaurant INNER JOIN (shipping INNER JOIN drivers ON shipping.Driver_Id = drivers.driver_id) ON restaurant.restaurant_id = shipping.Restaurant_Id
//WHERE (((shipping.Ship_ok)='1') AND ((shipping.Ship_done)='0') AND ((shipping.Driver_Id)=$xId))";


$ssql="SELECT shipping.*, restaurant.Restaurant_Name, drivers.Driver_name, shipping.*, restaurant.*, drivers.*, shipping.Ship_ok, shipping.Ship_done, consumer.Cons_Nama, consumer.Cons_Location
FROM (restaurant INNER JOIN (shipping INNER JOIN drivers ON shipping.Driver_Id = drivers.driver_id) ON restaurant.restaurant_id = shipping.Restaurant_Id) INNER JOIN consumer ON shipping.Cons_Id = consumer.Cons_Id
WHERE (((shipping.Ship_ok)='1') AND ((shipping.Ship_done)='0') AND ((shipping.Driver_Id)=$xId))";

$ambildataShip=mysqli_query($conn, $ssql);
while($a=mysqli_fetch_array($ambildataShip))
{ 
echo "<tr>";
echo "<td>";
echo $a['Ship_nota'] . "<br>";
echo $a['Cons_Nama'] . "<br>";
echo $a['Cons_Location'] . "<br>";

echo "</td>";


echo "<td>";
echo $a['Ship_tgl'];
echo "</td>";
echo "<td>";
echo $a['Restaurant_Name'];
echo "<br>";
echo $a['Retaurant_Location'];
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='4'>";
echo "</td>";
echo "</tr>";
$Ship_nota = $a['Ship_nota'];	
}
?>
  </tbody>
</table>
    <table border="1" width="850" align="center">
	<?php
// bagian ini untuk menampilkan isi pesanan
 

$sqlIsi = "SELECT shipping.*, restaurant.Restaurant_Name, drivers.Driver_name, orderlistdetailed.*, food_and_drink.FoDr_Name, food_and_drink.FoDr_Price
FROM ((restaurant INNER JOIN (shipping INNER JOIN drivers ON shipping.Driver_Id = drivers.driver_id) ON restaurant.restaurant_id = shipping.Restaurant_Id) INNER JOIN orderlistdetailed ON shipping.Ship_nota = orderlistdetailed.Ship_nota) INNER JOIN food_and_drink ON orderlistdetailed.FodDr_Id = food_and_drink.FodDr_Id
WHERE (((shipping.Ship_ok)='1') AND ((shipping.Ship_done)='0') AND ((shipping.Driver_Id)=$xId))";


$ambildataIsi=mysqli_query($conn, $sqlIsi);
$tot = 0;
while($aIsi=mysqli_fetch_array($ambildataIsi))
{
  $Ship_nota= $aIsi['Ship_nota'];

  echo "<tr>";  
  echo "</td>";
  echo "<td>";
  echo 	$aIsi['FoDr_Name'];
  echo "</td>";
  echo "<td align='right'>";
  echo 	$aIsi['FoDr_Price'];
  echo "</td>";
  echo "<td align='right'>";
  echo 	$aIsi['Ord_qty'];
  echo "</td>";
  echo "<td align='right'>";
  echo 	$aIsi['FoDr_Price']*$aIsi['Ord_qty'];
  echo "</td>";
  $tot = $tot +($aIsi['FoDr_Price']*$aIsi['Ord_qty']);
echo "</tr>";
}
  echo "<td align='right' colspan='5'>";
  echo 	$tot;
  echo "</td>";

?>

</table>

<h1 align="center"> 
      
  <a href="konf_antar.php?Ship_nota=<?php echo $Ship_nota ?>" title="input data">Konfirmasi sudah diantar</a>
      
  <p><a href="utamaD.php">ke Menu Utama</a></p>
</h1>
</body>
</html>

