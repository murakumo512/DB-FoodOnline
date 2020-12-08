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
           <td colspan="9"><a href="input_food.php" title="input data">Tambah</a></td>
       </tr>
       <tr>

           <th>No Order</th>
		   <th>Tgl Order</th>
		   <th width = "200">Restaurant</th>
 			<th>Driver</th>		
			<th width = "200">Action</th>		
			<th>Status</th>
       </tr>
       </thead>

       <tbody>
<?php
 
$ssql = "SELECT shipping.*, restaurant.*, drivers.*, shipping.Driver_Id
FROM (drivers INNER JOIN shipping ON drivers.driver_id = shipping.Driver_Id) INNER JOIN restaurant ON shipping.Restaurant_Id = restaurant.restaurant_id
WHERE (((shipping.usr_id)='$user_check')) and shipping.Ship_done='1'" ;

$ambildataShip=mysqli_query($conn, $ssql);
while($a=mysqli_fetch_array($ambildataShip))
{ 
 ?>
   <tr>
           <td><?php echo $a['Ship_nota'];?></td>
		   <td><?php echo $a['Ship_tgl'];?></td>
           <td><?php echo $a['Restaurant_Name'];?></td>
           <td><?php echo $a['Driver_name'];?></td>
           <td>
		   
		   <?php $Driver_Id=$a['Driver_Id'];?>
		   <?php $resId=$a['Restaurant_Id'];?>
<?php	
			if ($a['Ship_ok'] == '1') {
?>
				<a href="edit_OrderMaster.php?id=<?php echo $a['Ship_nota'];?>" 
				title="edit Order"><button disabled>Edit</button></a> 
				<a href="del_OrderMaster.php?id=<?php echo $a['Ship_nota'];?>" 
				title="hapus Order"><button disabled>Hapus</button></a>
				<a href="IsiOrderDetail.php?id=<?php echo $a['Ship_nota'];?>&resid=<?php echo $resId ?>" 
				title="Isi OrderDetail"><button disabled>Isi Order Detail</button></a>
				<a href="save_oder_detail.php?id=<?php echo $a['Ship_nota'];?>&resid=<?php echo $resId ?>&edit=ok" 
			title="Ok Pesan"><button disabled>Ok Pesan</button></a>
							<a href="nota.php?id=<?php echo $a['Ship_nota'];?>&resid=<?php echo $resId ?>" 
				title="Nota"><button >Nota</button></a>

			<?php } else 
			{?>
				<a href="edit_OrderMaster.php?id=<?php echo $a['Ship_nota'];?>" 
				title="edit Order"><button>Edit</button></a> 
				<a href="del_OrderMaster.php?id=<?php echo $a['Ship_nota'];?>" 
				title="hapus Order"><button>Hapus</button></a>
				<a href="IsiOrderDetail.php?id=<?php echo $a['Ship_nota'];?>&resid=<?php echo $resId ?>" 
				title="Isi OrderDetail"><button>Isi Order Detail</button></a>
				<a href="save_oder_detail.php?id=<?php echo $a['Ship_nota'];?>&resid=<?php echo $resId ?>&edit=ok&Driver_id=<?php echo $Driver_Id ?>" 
				title="Ok Pesan"><button>Ok Pesan</button></a>
			<?php } ?>
		   </td>
		   <?php
		   if ($a['Ship_ok'] == '0')
		   {  ?> 
			<td align = "center"><?php echo "Blm Fix";?></td>
		   <?php } else { ?>
		   <td align = "center"><?php echo "Fix";?></td>
		   <?php 
		   } ?> 
		   
       </tr>
<?php
  } // end while
  
?>
  </tbody>

</table>
<h1 align="center"> 
  <p><a href="utamac.php">ke Menu Utama</a></p>
</h1>
</body>
</html>

