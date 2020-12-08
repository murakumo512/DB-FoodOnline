<html>
 <body>
  <form action="save_res.php" method="get">
   <input type="hidden" name="id" value="<?php echo $id?>"/>
   <input type="hidden" name="edit" value="t"/>    <!--  edit untuk kondisi di save_driver (jika y -> update) -->
  <table>
   <tr>
    <th>
	 Restoran Name : 
	</th>
	<th>
		<input type="text" name="Restaurant_Name">
     </th>
   </tr>
   <tr>
    <th align ="left">
	Location: 
	</th>
	<th>
	  <input type="text" name="Retaurant_Location">
	</th>
   </tr>
	<tr>
   <th><input type="submit" value="Simpan"></>
	</tr>
   </table>
     <br><br>
  <p><a href="index.html">ke Menu Utama</a></p>
<p><a href="r.php">kembali Daftar Restoran</a></p>

  </form>
 </body>
</html>  