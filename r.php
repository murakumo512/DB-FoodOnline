<?php
//panggil file koneksi.php yang sudah anda buat
include "konekdb.php";
?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
	<head>
       <title>Data Restoran</title>
	</head>
<body>
<h1 align="center"> Data Restoran</h1>
    <table border="1" width="900" align="center">
       <thead>
       <tr>
           <td colspan="9"><a href="input_res.php" title="input data">Tambah</a></td>
       </tr>
       <tr>
           <th>Restaurant_Id</th>
           <th>Restaurant_Name</h>
           <th>Retaurant_Location</th>
       </tr>
       </thead>

       <tbody>
<?php
//ambil data dari tb_driver 
$ambildata=mysqli_query($conn, "SELECT * FROM restaurant ORDER BY Restaurant_Id ASC");
while($a=mysqli_fetch_array($ambildata))
{ 
 ?>
   <tr>
           <td><?php echo $a['Restaurant_Id'];?></td>
           <td><?php echo $a['Restaurant_Name'];?></td>
           <td><?php echo $a['Retaurant_Location'];?></td>
		   <?php $rest = $a['Restaurant_Name'] ;?>
           <td><a href="edit_res.php?id=<?php echo $a['Restaurant_Id'];?>" title="edit data"><button>Edit</button></a> |
           <a href="del_res.php?id=<?php echo $a['Restaurant_Id'];?>" title="hapus data"><button>Hapus</button></a>
           <a href="tambah_makanan.php?id=<?php echo $a['Restaurant_Id'];?>&rest= <?php echo $rest ?>" title="Tambah Makanan">
			<button>TambahMakanan</button></a>
			<a href="daftarFoodRinci.php?id=<?php echo $a['Restaurant_Id'];?>" title="Lihat daftar"><button>Lihat Daftar</button></a>
      
			</td>
       </tr>
<?php
  }
?>

  </tbody>

</table>
<h1 align="center"> 
  <p><a href="utama.php">ke Menu Utama</a></p>
</h1>
</body>
</html>

