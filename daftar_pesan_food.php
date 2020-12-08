<?php
// ambil data kiriman dari page pemanggil
  session_start();
  $user_check =$_SESSION['login_user']; 
  $member = $_SESSION['usr_member'];
  $xNama =$_SESSION['Nama'];
  $xId = $_SESSION['XId'];
  $xBalanced =$_SESSION['XBalanced'];
  if(!isset($user_check))
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

include "konekdb.php";
if ($_GET['new']=='y')
{
 $_SESSION['idres']=$_GET["idres"];
 $idres =$_GET["idres"];
 $x =$_GET["edit"];
 $xNew =$_GET['new'];
} else
{ $idres=$_SESSION['idres'];
}

// ambil data dari form pesan_food.php yg isinya : restoran_id
// insert kan ke tabel shipping sebagai master order

include "konekdb.php";
if ($_GET['new']=='y')  // jika dipanggil dari page pesan food, berarti pesanan baru, lakukan proses insert
{
	$shipnota=$xId . date("his");
	$_SESSION['$shipnota']=$shipnota;
	// cari driver dgn cara random
	$sssql='SELECT * FROM drivers WHERE Driver_od="0" ORDER BY RAND() LIMIT 1';
	$result = mysqli_query($conn, $sssql);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
		$Driver_Id= $row["Driver_Id"];
		$Driver_name= $row["Driver_name"];
		$_SESSION['$Driver_Id']=$Driver_Id;
		$_SESSION['$Driver_name']=$Driver_name;
		}
	}
   // cari info restaurant
	$ambilres=mysqli_query($conn, "SELECT * FROM restaurant where Restaurant_Id=$idres");
	while($a=mysqli_fetch_array($ambilres))
    {     
		$resto=$a['Restaurant_Name'];  //ambil  nama restaurant
		$restongkir=$a['Restaurant_ongkir'];  //ambil  nama restaurant
		$_SESSION['$Restaurant_Name']=$resto;
		$_SESSION['$Restaurant_ongkir']=$restongkir;
 	}
	// simpan order master (di tabel shipping)
	$sql = "INSERT INTO shipping (Cons_Id, Restaurant_Id, Driver_Id,Ship_Fee,usr_id,Ship_nota)
	VALUES ($xId, $idres, $Driver_Id,$restongkir,'$user_check','$shipnota')";
	$conn->query($sql);  //lakukan proses insert
}
else  // jika new=t  artinya tampilkan form ini tanpa insert data master lagi
{
	$shipnota=$_SESSION['$shipnota']; 	
	$Driver_Id=$_SESSION['$Driver_Id'];
	$Driver_name=$_SESSION['$Driver_name'];
	$resto=		$_SESSION['$Restaurant_Name'];
}	$restongkir=$_SESSION['$Restaurant_ongkir'];
//function writeMsg($a) {
//  echo "Hello world! $a";
//  return $a."saya";
//}

//$x=writeMsg("aaa");
//echo $x


?>

<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
	<head>
       <title>Daftar Pesanan</title>
	</head>
<body>
<h1 align="center"> Daftar Pesanan</h1>
  <?php



// batas akhir tampilkan oerder master
// bagian ini untuk input order detail
  ?>
     <table border="1" width="900" align="center">
       <thead>
       <tr>
           <td colspan="5"> 
		    <?php
			echo "Restaurant : $resto <br>";
			echo "Driver : $Driver_name <br>";
            echo "Ongkir : $restongkir <br>";
            echo "Nomor Nota : $shipnota";	
			?>
		   </td>

           <td colspan="9"><a href="input_pesanan_food.php" title="input data">Tambah</a></td>
		   
       </tr>
       <tr>
		   <th width="20">food Id</th>
           <th width="400">Food Name</th>
           
		   <th width="30">Qty</th>
		   <th width="100">Price</th>
		   <th width="100">Tot Price</th>
		   
		   
       </tr>
       </thead>

       <tbody>
<?php
$ssql = "SELECT orderlistdetailed.*, food_and_drink.*
FROM orderlistdetailed INNER JOIN food_and_drink 
ON orderlistdetailed.FodDr_Id = food_and_drink.FodDr_Id 
WHERE Ship_nota='$shipnota'";
$ambilorder=mysqli_query($conn,$ssql);
$tot=0;
while($a1=mysqli_fetch_array($ambilorder))
{ 
 ?>
   <tr>
           <td><?php echo $a1['FodDr_Id'];?></td>
           <td><?php echo $a1['FoDr_Name'];?></td>
		   <td><?php echo $a1['Ord_qty'];?></td>
           <td><?php echo $a1['FoDr_Price'];?></td>
		   <?php $tot1=$a1['Ord_qty']*$a1['FoDr_Price'];?>
           <td style='text-align:right'><?php echo $tot1;?></td>
		   <?php
		   
           $tot=$tot+$tot1;		   
		   $_SESSION['$totprice']=$tot;
		   
		   ?>
           <td><a href="edit_food.php?id=<?php echo $a['FodDr_Id']."&R=".$a['Restaurant_Name'] ;?>" title="edit data"><button>Edit</button></a> |
           <a href="del_food.php?id=<?php echo $a['FodDr_Id'];?>" title="hapus data"><button>Hapus</button></a></td>
       </tr>
<?php
  }
  echo "<tr>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td></td>";
  
  echo "<td style='text-align:right'> $tot</td>";
  echo "</tr>";

?>

  </tbody>

</table>
<h1 align="center"> 
  <p><a href="index.html">ke Menu Utama</a></p>
</h1>
</body>
</html>

