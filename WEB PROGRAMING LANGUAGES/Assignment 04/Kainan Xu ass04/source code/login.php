<?php
 //session
   session_start();
//logout
   $var = isset($_GET['action']) ? $_GET['action'] : '';
   if ($var == "logout"){

       echo 'successfully logout! Click<a href=login.html> here!</a> to login';
       //set cookie, this should be used in logout!
       date_default_timezone_set("America/Chicago");
       setCookie("name",$_SESSION['username'],time()+3600*24*30);
       setCookie("lastVisit",$date=date("Y-m-d H:i:s"),time()+3600*24*30);
       unset($_SESSION['userid']);
       unset($_SESSION['username']);
       exit;
    }

   //login
   if (!isset($_POST['submit'])){
       exit('invaid acess!');
    }
   $username = trim($_POST['username']);
   $password = trim($_POST['password']);

   /*
   if($username == 'admin'&& $password='admin')
   {
    $_SESSION['username']=$username;
    echo "Welcome Admin, Please wait to be redirected!";
    echo "<meta http-equiv=\"refresh\" content=\"1.5;url=admin.php\">";
    exit;

   }
   */
   //access the DB
   include("conn.php");
   
   $sql = "select userid,tel,email,Userdegreeplanid from users where Userloginname="."'$username'"." and Userloginpassword="."'$password'";

        $result = mysqli_fetch_array(mysqli_query($link,$sql));

        if ($result)
        {
       //success
       $_SESSION['username']=$username;
       $_SESSION['userid'] = $result[0];
       $_SESSION['tel'] = $result[1];
       $_SESSION['email'] = $result[2];
       $_SESSION['Userdegreeplanid']= $result[3];
       if($_SESSION['Userdegreeplanid']>0){
       echo $username.', Welcome! <br/>';
       echo 'click here to <a href="login.php?action=logout">logout</a>! <br/>';
       echo "<meta http-equiv=\"refresh\" content=\"1.5;url=home.php\">";
        }
        if($_SESSION['Userdegreeplanid']==0)
        {
        echo "Welcome Admin, Please wait to be redirected!";
        echo "<meta http-equiv=\"refresh\" content=\"1.5;url=admin.php\">";
        exit;
        }
        }

   else{
      echo $_SESSION['Userdegreeplanid'];
       exit('failed! click here to <a href="javascript:history.back(-1);">retry</a>');
    }
?>