<?php
//panggil file koneksi.php yang sudah anda buat
include "konekdb.php";
?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
	<head>
       <title>Data Driver</title>
	</head>
<body>
<h1 align="center"> Data Driver</h1>
    <table border="1" width="900" align="center">
       <thead>
       <tr>
           <td colspan="9"><a href="input_driver.php" title="input data">Tambah</a></td>
       </tr>
       <tr>
           <th>ID Driver</th>
           <th>Nama Driver</h>
           <th>No Pol</th>
           <th>Balanced</th>
           <th>Location</th>
       </tr>
       </thead>

       <tbody>
<?php
//ambil data dari tb_driver 
$ambildata=mysqli_query($conn, "SELECT * FROM drivers ORDER BY Driver_Id DESC");
while($a=mysqli_fetch_array($ambildata))
//  $query =mysqli_query($conn, "SELECT * FROM drivers ORDER BY Driver_Id DESC");
//            while($result=mysqli_fetch_array($query)){
{
    ?>
       <tr>
           <td><?php echo $a['Driver_Id'];?></td>
           <td><?php echo $a['Driver_name'];?></td>
           <td><?php echo $a['Driver_Nopol'];?></td>
           <td><?php echo $a['Driver_Balanced'];?></td>
           <td><?php echo $a['Driver_Location'];?></td>
           <td><a href="edit_driver.php?id=<?php echo $a['Driver_Id'];?>" title="edit data"><button>Edit</button></a> |
           <a href="del_driver.php?id=<?php echo $a['Driver_Id'];?>" title="hapus data"><button>Hapus</button></a></td>
       </tr>
<?php
}
?>
</tbody>
<h1 align="center"> 
  <p><a href="utama.php">ke Menu Utama</a></p>
</h1>
</table>
</body>
</html>

