<?php
include "konekdb.php";
// Start the session
session_start();
// username and password sent from form
$myusername=$_GET["myusername"];
$mypassword=$_GET["mypassword"];
$ax=0;

$ambildata=mysqli_query($conn, "SELECT * FROM usr where usr_id='$myusername' and usr_pa='$mypassword'");

while($a=mysqli_fetch_array($ambildata))
{ 
 $ax=1;
 $_SESSION['login_user']=$myusername;  // sbg variable yang dikirim ke form2 selanjutnya
 $_SESSION['usr_member']=$a['usr_member'];
 $member=$a['usr_member'];

}

if ($ax==0)
 {
   header('location: index.html');
  }
  else
 { 
echo $member;
  // ambil informasi user
  if ($member == 'consumer')
  {
  $inf_user=mysqli_query($conn, "SELECT * FROM consumer where usr_id='$myusername'");
  while($a=mysqli_fetch_array($inf_user))
   { 
   $_SESSION['Nama']=$a['Cons_Nama'];
   $_SESSION['XId']=$a['Cons_Id'];
   $_SESSION['XBalanced']=$a['Cons_Balanced'];
   header('location: utamac.php');	
   }
  }  // end while
 if ($member == 'driver')
  {
  $inf_userD=mysqli_query($conn, "SELECT * FROM drivers where usr_id='$myusername'");
  while($ad=mysqli_fetch_array($inf_userD))
    { 

	$_SESSION['Nama']=$ad['Driver_name'];
	$_SESSION['XId']=$ad['Driver_Id'];
	$_SESSION['XBalanced']=$ad['Driver_Balanced'];
    header('location: utamaD.php');
	}
  } //elseif
 if ($member == 'admin')
  {
	echo "SELECT * FROM drivers where usr_id='$myusername'";
	
	$inf_userD=mysqli_query($conn, "SELECT * FROM consumer where usr_id='$myusername'");
  while($ad=mysqli_fetch_array($inf_userD))
    { 
	$_SESSION['Nama']=$ad['Driver_name'];
	$_SESSION['XId']=$ad['Driver_Id'];
	$_SESSION['XBalanced']=$ad['Driver_Balanced'];
    header('location: utama.php');
	}
  } //end else
} //end else cek passw //
?>