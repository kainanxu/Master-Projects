<?php
 //启动session会话
   session_start();


   //登录
   if (!isset($_POST['submit'])){
       exit('invaid acess!');
    }
   $username = trim($_POST['username']);
   $password = trim($_POST['password']);
   $tel = trim($_POST['tel']);
   $Email = trim($_POST['Email']);

   //访问数据库，进行连接
   include("conn.php");
   //检查用户名密码
   $sql = "INSERT INTO users VALUES (NULL,"."'$username'".","."'$username'".","."'$password'".","."3,"."'$tel',"."'$Email'".");";
   
   $result = mysqli_query($link,$sql);
   if ($result)
   {
       
       echo $username.', you have successfully registered! <br/>';
       echo 'click here to <a href="login.html">login</a>! <br/>';
   }

   else{
       exit('failed! click here to <a href="javascript:history.back(-1);">retry</a>');
    }
?>