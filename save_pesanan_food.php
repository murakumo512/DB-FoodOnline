<?php
// ambil daa kiriman dari page pemanggil
  session_start();
  $user_check =$_SESSION['login_user']; 
  $member = $_SESSION['usr_member'];
  $xNama =$_SESSION['Nama'];
  $xId = $_SESSION['XId'];
  $xBalanced =$_SESSION['XBalanced'];
  if ($_GET["edit"] != 't')
  {  
//  $shipnota=$_SESSION['$shipnota'];
  $shipnota=$_GET['Ship_nota'];
  
  } 
   
  if(!isset($user_check))
  {
    header("Location: index.html");
  }
// ambl data dari kiriman get_browser
$xEdit = $_GET["edit"];
if ($xEdit != 't')
{
$xDriver_id = $_GET["Driver_Id"]; 
$xusr_id = $_GET["usr_id"] ; 
$xShip_tgl = $_GET["Ship_tgl"]; 
$xShip_nota = $_GET["Ship_nota"]; 
$xnew = $_GET["new"] ;
$idres = $_GET["idres"];
}
else  // kalau proses input data, cuma ada id restorant saja, yg lain di create di bawah
{
 $idres = $_GET["idres"];	
}

?>

<html>
<body>
<?php


include "konekdb.php";
if ($xEdit=="t")  // jika dipanggil dari pesan_food.php (proses tambah baru order)
	{
		// cari driver dgn cara random
		$sssql='SELECT * FROM drivers WHERE Driver_od="0" ORDER BY RAND() LIMIT 1';
		$result = mysqli_query($conn, $sssql);
		if (mysqli_num_rows($result) > 0) 
		{
		   while($row = mysqli_fetch_assoc($result)) 
		   {
			$Driver_Id= $row["Driver_Id"];
			$Driver_name= $row["Driver_name"];
			//$_SESSION['$Driver_Id']=$Driver_Id;
			//$_SESSION['$Driver_name']=$Driver_name;
			}
		}
		
		// buat no nota
		$shipnota=$xId . date("dyhis"); //Cons_Id+tgl+thn+jam+menit+detik
	
		$sql = "INSERT INTO shipping (Cons_Id,Restaurant_Id,Driver_Id,usr_id,Ship_nota,Ship_tgl,Ship_ok,Ship_done) 
		VALUES ($xId,$idres,$Driver_Id,'$user_check','$shipnota',Now(),'0','0')";
//		echo $sql;
	}
	else //edit_orderMaster
	{
		$sql = "UPDATE shipping set Restaurant_Id='$idres' where Ship_nota = $xShip_nota";
	}
$conn->query($sql);  //eksekusi query

$conn->close();

?>
  
   <meta http-equiv="refresh" content="1; url='om.php'" />   
  
  <p><a href="utama.php">ke Menu Utama</a></p>
<p><a href="om.php?usr_id=<?php echo $user_check ?>">ke Daftar Order</a></p>

</body>
</html> 