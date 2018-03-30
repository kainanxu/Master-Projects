<?php
 //session
   session_start();


   //login
   $passwd = isset($_POST['passwd']) ? $_POST['passwd'] : "";
   $tel = isset($_POST['tel']) ? $_POST['tel'] : "";
   $Email = isset($_POST['Email']) ? $_POST['Email'] : "";
   echo $passwd;
   echo $Email;
   echo $tel;
   if(isset($_POST['passwd']))
   {
   	include("conn.php");
  	$sql = "UPDATE users SET Userloginpassword = '".$_POST['passwd']."' WHERE Userid = ".$_SESSION['uid'].";";
   	$res = $link->query($sql);
   	echo "<script>alert('This record has been reset successfully!');</script>";
    echo "<script>window.history.back();</script>";
	}

  if(isset($_GET['action']))
   {
    include("conn.php");
    if($_SESSION['userdegreeplanid']==4)
    $sql = "UPDATE users SET Userdegreeplanid = 3 WHERE Userid = ".$_SESSION['uid'];
    else
    {
      $sql = "UPDATE users SET Userdegreeplanid = 4 WHERE Userid = ".$_SESSION['uid'];
    }
    $res = $link->query($sql);
    echo "<script>alert('This record has been reset successfully!');</script>";
    echo "<script>window.history.back();</script>";
  }
	
   
   
   if(isset($_POST['Email'])){
   	include("conn.php");
  	$sql = "UPDATE users SET email = '".$_POST['Email']."' WHERE Userid = ".$_SESSION['uid'].";";
   	$res = $link->query($sql);
   	echo "<script>alert('This record has been reset successfully!');</script>";
    echo "<script>window.history.back();</script>";
   }
   
   
   if(isset($_POST['tel'])){
   	include("conn.php");
  	$sql = "UPDATE users SET tel = '".$_POST['tel']."' WHERE Userid = ".$_SESSION['uid'].";";
   	$res = $link->query($sql);
   	echo "<script>alert('This record has been reset successfully!');</script>";
    echo "<script>window.history.back();</script>";
   }
   
   
?>