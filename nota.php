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
  echo "<td width='300'>";
    echo "User aktif : $user_check <br>" ;
	echo "status : $member <br>";
    echo "Nama   : $xNama". " ( ". $xId ." )<br> ";  //id user
    echo "Balanced : $xBalanced <br>" ;
  echo "</td>";
  
   echo "<td align ='center'>";
   echo "<h1>";
   echo "Invoice";
   echo "</h1>";
   echo "</td>";
   echo "</tr>";
   echo "</table>";
// akhir ambil data kiriman dari page pemanggil

 $Ship_nota = $_GET["id"];   // pegangannya no ship_nota
 $resid = $_GET["resid"];  
 
  echo "<table border='1' width='900' align='center'>";
  echo "<tr>";
  echo "<td>";
  echo "No Nota : ".$Ship_nota;
  echo "</td>";
  echo "</tr>";
  

	//ambil data dari tb_driver 
$ssql = "SELECT shipping.*, restaurant.*, drivers.*, shipping.Driver_Id
FROM (drivers INNER JOIN shipping ON drivers.driver_id = shipping.Driver_Id) INNER JOIN restaurant ON shipping.Restaurant_Id = restaurant.restaurant_id
WHERE (((shipping.Ship_nota)='$Ship_nota'))";
		$resultssql = mysqli_query($conn, $ssql);
		if (mysqli_num_rows($resultssql) > 0) 
		{
		   while($row = mysqli_fetch_assoc($resultssql)) 
		   {
			$Driver_Id= $row["Driver_Id"];
			$Driver_name= $row["Driver_name"];
			$Ongkir= $row["Restaurant_ongkir"];
			}
		}
  echo "<tr>";
  echo "<td>";
  echo "Ongkos Kirim : ".$Ongkir;
  echo "</td>";
  echo "</tr>";
?>

<!DOCTYPE html>
<html>
<head>
 <title>Input Makanan dan Minuman</title>
</head>
<body>
<form action="save_oder_detail.php" method="get">
<input type="hidden" name="edit" value="t"/> 
<input type="hidden" name="Ship_nota" value="<?php echo $Ship_nota ?>"/> 
<input type="hidden" name="new" value="t"/> 
<input type="hidden" name="resid" value="<?php echo $resid ?>"/> 

  </td>
  </tr>
  </table>
  
  <table border='1' width='900' align='center'>
  <tr>
  <td>Makanan</td>
  <td>Harga</td>
  <td>Qty</td>
  <td>Total</td>
  </tr> 

  <?php
$sqldet="SELECT orderlistdetailed.*, food_and_drink.*, orderlistdetailed.Ship_nota
FROM orderlistdetailed INNER JOIN food_and_drink ON orderlistdetailed.FodDr_Id = food_and_drink.FodDr_Id
WHERE (((orderlistdetailed.Ship_nota)='$Ship_nota'))";
$ambildatadet=mysqli_query($conn, $sqldet);
$tot = $Ongkir;
while($a=mysqli_fetch_array($ambildatadet))
{
	 $Ord_id=$a['Ord_id'];
	 $FodDr_Id=$a['FodDr_Id'];
	 echo "<td align='right'>";
	 echo $a['FoDr_Name'];	

	 echo "</td>";
	 
	 echo "<td align='right'>";
	 echo $a['FoDr_Price'];
	 echo "</td>";
	 
	 echo "<td align='right' width='50'>";
	 echo $a['Ord_qty'];
	 $qty = $a['Ord_qty'];
	 echo "</td>";

	 echo "<td align='right'>";
	 echo $a['FoDr_Price']*$a['Ord_qty'];
	 $tot = ($a['FoDr_Price']*$a['Ord_qty'])+$tot;
     
	 echo "</td>";
	 echo "</tr>";
	 

	 
} // end while

	$_SESSION['tot']=$tot;
 ?>

  </td>
  </tr>
      <td colspan="3"><a href="log_cust.php" title="kembali">kembali</a></td>
	  <td align="right"> <?php echo $tot ?> </td>
  </table>
</body>
</html>