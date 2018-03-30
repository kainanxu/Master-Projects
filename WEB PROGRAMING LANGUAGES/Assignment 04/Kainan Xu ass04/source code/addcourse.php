<?php
 //session
   session_start();


   //login
   $number = isset($_POST['number']) ? $_POST['number'] : "";
   $name = isset($_POST['name']) ? $_POST['name'] : "";
   $descrip = isset($_POST['descrip']) ? $_POST['descrip'] : "";
   $core = isset($_POST['core']) ? $_POST['core'] : "";

    include("conn.php");
    $sql = "INSERT INTO courses VALUES (NULL, '".$number."', 'CS', '".$name."', '".$descrip."', '2016-06-12 12:01:01', '2016-06-12 12:01:01', '".$core."');";
    //echo $sql;
    $res = $link->query($sql);
    echo "<script>alert('This record has been added successfully!');</script>";
    echo "<script>window.history.back();</script>";
  
   
?>