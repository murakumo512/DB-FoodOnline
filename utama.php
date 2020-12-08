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
 //   echo "Nama   : $xNama <br>" ;
//	echo "Id : $xId <br> ";  //id user
 //   echo "Balanced : $xBalanced <br>" ;
  echo "</td>";
  echo "</tr>";
  echo "</table>";
// akhir ambil data kiriman dari page pemanggil

?>

<html>
<head>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 60%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
 <body>
 <h3 align=center>Menu Admin</h3>
 </body>
 <table align=center>
  <tr>
    <th></th align=center>

  </tr>
  <tr>
    <td><a href="x.php">Input/Del/Edit driver</a></td>
    <td></td>
	<td></td>
  </tr>
  <tr>
    <td><a href="m.php">Input/Del/Edit Menu Makanan</a></td>
    <td></td>
    <td> </td>
  </tr>
  <tr>
    <td><a href="r.php">Input/Del/Edit Restaurant</a></td>
    <td></td>
    <td></td>
  </tr>
    <tr>
    <td><a href="c.php">Input/Del/Edit Customer</a></td>
    <td></td>
    <td></td>
  </tr>
 
 
</table>
<!-- 
  <script type='text/javascript'>alert('test');</script>
-->
<h1 align="center"> 
  <p><a href="index.html">logout</a></p>
</h1>
</html