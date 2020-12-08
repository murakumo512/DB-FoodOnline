<html>
 <body>
<table border='1' width='400' align='center'>
  <form action="save_driver.php" method="GET">
   <input type="hidden" name="id" value="<?php echo $id?>"/>
   <input type="hidden" name="edit" value="t"/>    <!--  edit untuk kondisi di save_driver (jika y -> update) -->
  <tr>
   <th>Driver_name: </th>
    <th><input type="text" name="Driver_name"></th>
  </tr>
  <tr>
    <th>Driver_Nopol: </th>
	<th><input type="text" name="Driver_Nopol"></th>
   </tr>
   <tr>
   <th>Driver_Balanced: </th>
   <th><input type="text" name="Driver_Balanced"></th>
   <tr>
   <tr>
   <th>Driver_Location: </th>
   <th><input type="text" name="Driver_Location"></th>
   <tr>   
   
   
   <th>Login: </th>
   <th><input type="text" name="login"></th>
   </tr>
   <tr >
   <th>pas:</th> 
   <th ><input type="text" name="pas"></th>
   </th>
   </tr>
   <tr><td  colspan = "2" align="center">
   <input type="submit">
   </th>
   </tr>
</table>
   
<h2 align="center"> 
  <p><a href="x.php">ke Daftar Consumer</a></p>
  <p><a href="index.html">logout</a></p>

</h2>

  </form>
 </body>
</html>  