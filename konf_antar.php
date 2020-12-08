
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

// eksekusi status di shipping (ok_done ke 1)
$xShip_nota=$_GET["Ship_nota"];	
$sql = "UPDATE shipping set Ship_done='1' where Ship_nota = $xShip_nota";
$conn->query($sql);  //eksekusi query

// eksekusi status driver On duty jadi 0 kembali  (nilai 1 kalau driver ada tugas antar
$sqldriver = "UPDATE drivers set Driver_od='0' where Driver_Id = $xId";
$conn->query($sqldriver);  //eksekusi query
$conn->close();
echo "<h1 align='center'>"; 
echo "Status Pesanan selesai diantar <br>";
echo "<a href='driver_duty.php' title='KEMBALI'>KEMBALI</a>";
echo "</h1>";

?>
