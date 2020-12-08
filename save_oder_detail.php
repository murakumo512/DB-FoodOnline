<?php
// ambil daa kiriman dari page pemanggil
  session_start();
  $user_check =$_SESSION['login_user']; 
  $member = $_SESSION['usr_member'];
  $xNama =$_SESSION['Nama'];
  $xId = $_SESSION['XId'];
  $xBalanced =$_SESSION['XBalanced'];
  
// $shipnota=$_SESSION['$shipnota']; 
     
  if(!isset($user_check))
  {
    header("Location: index.html");
  }
// ambl data dari kiriman get_browser


$xEdit = $_GET["edit"];

?>

<html>
<body>
<?php
include "konekdb.php";

	

if ($xEdit=="t")  // jika bukan dipanggil dari pesan_food.php (proses tambah baru order)
	{
		$idfood = $_GET["idfood"] ; 
		$xShip_nota = $_GET["Ship_nota"]; 
		$qtyfood=$_GET["qtyfood"];
		$resid=$_GET["resid"];
		
		// cari harga
		$sqlfood="SELECT * FROM food_and_drink WHERE FodDr_Id=".$idfood;
		$resultfood = mysqli_query($conn, $sqlfood);
		if (mysqli_num_rows($resultfood) > 0) 
		{
		   while($row = mysqli_fetch_assoc($resultfood)) 
		   {
			$FoDr_Price= $row["FoDr_Price"];
			$FoDr_Stock=$row["FoDr_Stock"];
			}
		}
		
		// bagian eksekusi
			$tot=$_SESSION['tot'];
			if ($tot ==0)
			{
				$tot =$FoDr_Price*$qtyfood;
			}
			else
			{
				$tot = $tot +($FoDr_Price*$qtyfood);
			}
		 if ($xBalanced < $tot)
		 {
			$m= "lebih besar dari balanced ".  $xBalanced ;
			echo "<script type='text/javascript'>alert('$m');</script>";
//			$sqldel = "delete from orderlistdetailed where Ord_id=".$Ord_id ;
//			$conn->query($sqldel);  //eksekusi query
			goto a;

		 } else
		 {	 
			$sisaBalanced=$xBalanced-$tot;
			$sqlUpdtBal = "update consumer set Cons_Balanced = ". $sisaBalanced . " where Cons_Id=".$xId;
			$conn->query($sqlUpdtBal);  //eksekusi query
			$_SESSION['XBalanced']=$xBalanced -$tot;
			$m= "update $xBalanced, $tot " ;
			echo "<script type='text/javascript'>alert('$m');</script>";
		 }	


		$sql = "INSERT INTO orderlistdetailed (Ord_qty,Ord_TotalBayar,Ship_nota,FodDr_Id) 
		VALUES ($qtyfood,$FoDr_Price,'$xShip_nota',$idfood)";
		$conn->query($sql);  //eksekusi query
		
	// eksekusi penguranga stok
		$sisastok = $FoDr_Stock -$qtyfood;
		$sql2 = "UPDATE food_and_drink set FoDr_Stock=$sisastok where FodDr_Id = $idfood";
		echo $sql2;
		
		$conn->query($sql2);  //eksekusi query
		
	// eksekusi pengurangan balanced consumer	
		
	}
	elseif ($xEdit=="ok")   // jika sudah fix dipesan ( tombol ok pesan clicked)
	{
		$xShip_nota = $_GET["id"];  
		$resid=$_GET["resid"];
		$sql = "UPDATE shipping set Ship_ok='1' where Ship_nota = '$xShip_nota'"; // ship_ok =1 --> fix  pesan
		echo $sql;
		$conn->query($sql);  //eksekusi query
		
		// eksekusi status driver On duty jadi 1 kembali  (nilai 1 kalau driver ada tugas antar
		$sql1 = "UPDATE drivers set Driver_od='1' where Driver_Id =". $_GET['Driver_id'];
		
		
		$conn->query($sql1);  //eksekusi query
		
	}
	else //edit_orderMaster
	{
		$sql = "UPDATE shipping set Restaurant_Id='$idres' where Ship_nota = '$xShip_nota'";
	}


$conn->close();

?>
<?php
a:
if ($xEdit=="ok")
{ ?>	
<meta http-equiv="refresh" content="1; url='om.php?id=<?php echo $xShip_nota ?>&resid=<?php echo $resid ?>' />
<?php } else
{
?>
<meta http-equiv="refresh" content="100; url='IsiOrderDetail.php?x=m&id=<?php echo $xShip_nota ?>&resid=<?php echo $resid ?>' />
<?php } ?>

 <p><a href="utama.php">ke Menu Utama</a></p>
<p><a href="IsiOrderDetail.php?x=m&id=<?php echo $xShip_nota ?>&resid=<?php echo $resid ?>">ke Daftar Order</a></p>

</body>
</html> 