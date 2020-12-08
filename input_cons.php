<html>
 <body>
<table border='1' width='400' align='center'>
  <form action="save_cons.php" method="GET">
   <input type="hidden" name="id" value="<?php echo $id?>"/>
   <input type="hidden" name="edit" value="t"/>    <!--  edit untuk kondisi di save_driver (jika y -> update) -->
  <tr>
   <th>Name Consumer: </th>
    <th><input type="text" name="Cons_Nama"></th>
  </tr>
  <tr>
    <th>Balanced: </th>
	<th><input type="text" name="Cons_Balanced"></th>
   </tr>
   <tr>
   <th>Location: </th>
   <th><input type="text" name="Cons_Location"></th>
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
  <p><a href="c.php">ke Daftar Consumer</a></p>
  <p><a href="index.html">logout</a></p>

</h2>

  </form>
 </body>
</html>  