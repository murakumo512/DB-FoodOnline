<?php
//panggil file koneksi.php yang sudah anda buat
include "konekdb.php";
?>
<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
	<head>
       <title>Data Consumer</title>
	</head>
<body>
<h1 align="center"> Data Consumer</h1>
    <table border="1" width="900" align="center">
       <thead>
       <tr>
           <td colspan="9"><a href="input_cons.php" title="input data">Tambah</a></td>
       </tr>
       <tr>
           <th>Cons_Id</th>
           <th>Cons_Nama</h>
           <th>Cons_Balanced</th>
           <th>Cons_Location</th>
		   <th>Login</th>
       </tr>
       </thead>

       <tbody>
<?php
//ambil data dari tb_driver 
$ambildata=mysqli_query($conn, "SELECT * FROM consumer ORDER BY Cons_Id ASC");
while($a=mysqli_fetch_array($ambildata))
{ 
 ?>
   <tr>
           <td><?php echo $a['Cons_Id'];?></td>
           <td><?php echo $a['Cons_Nama'];?></td>
           <td><?php echo $a['Cons_Balanced'];?></td>
           <td><?php echo $a['Cons_Location'];?></td>
           <td><?php echo $a['usr_id'];?></td>
		   
           <td><a href="edit_cons.php?id=<?php echo $a['Cons_Id'];?>" title="edit data"><button>Edit</button></a> |
           <a href="del_cons.php?id=<?php echo $a['Cons_Id'];?>" title="hapus data"><button>Hapus</button></a></td>
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

