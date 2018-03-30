<?php
 //启动session会话
   session_start();
//注销登录
   $var = isset($_GET['course']) ? $_GET['course'] : '';

   //echo $var;
   //print_r($_GET);
    foreach($_GET as $index => $value)
    {
        //echo "$_GET[$index]= $value, <BR>";
        //echo $_SESSION['username'];
        //echo $_SESSION['userid'];
        //访问数据库，进行连接
           include("conn.php");
           //检查用户名密码
           $sql = "DELETE  from coursetaken where studentid=".$_SESSION['userid']." AND courseid=(select id from courses where name='".$value."')";
           //echo $sql;
           $result = mysqli_query($link,$sql);
           if ($result)
           {
               //登录成功
               //$_SESSION['username']=$username;
               //$_SESSION['userid']=$result['l_id'];
               echo 'You have successfully delected: '.$value.'<br>';
               echo "<script>alert('You have successfully delected (a) course!');</script>";
               echo "<script>window.history.back();</script>";
           }

    }
    exit('click here to <a href="javascript:history.back(-1);">go back</a>');
?>