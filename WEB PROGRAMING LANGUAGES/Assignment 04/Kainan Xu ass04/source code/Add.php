<?php
    session_start();
?>

<html>
<head>
    <title>Add A Course</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">

</head>
<body>


<div align="right" style="size: 8px">
    <a  href="login.php?action=logout">Log Out</a>
</div>

<p >Graduate Computer Science Department </p>
<p align="center">The University of Texas at Dallas </p>
<hr/>
<div id=information align="left">
<?php
    $courseid = isset($_GET['courseid']) ? $_GET['courseid'] : '';
    $userid = isset($_GET['userid']) ? $_GET['userid'] : '';
    $core = isset($_GET['core']) ? $_GET['core'] : '';
    include("conn.php");
    $sql = "select * from coursetaken where (studentid=".$userid." AND states=2)" ;
    //echo $sql;
    $res = $link->query($sql);
    $total_course=$res->num_rows;
    if($total_course>2)
    {
    echo "<script>alert('Your have already selected to much courses!(>3)');</script>";
    echo "<script>window.history.back();</script>";
    exit();
    
    }

    $sql = "select courseid from coursetaken where (studentid=".$userid.");";
    //echo $sql;
    $res = $link->query($sql);
    while($row=$res->fetch_row()){
            if($courseid==$row[0])
            {
              echo "<script>alert('You have already taken this course or this course has been selected!');</script>";
              echo "<script>window.history.back();</script>";
              exit();
              
            }
        }

    $sql = "select * from coursetaken,courses where (coursetaken.courseid=courses.id AND studentid=".$userid." AND states=2 AND courses.core>0)" ;
    $res = $link->query($sql);
    $num_rows=$res->num_rows;
    if ($num_rows>0&&$core==1)
           {
            echo "<script>alert('Your have already selected a core course, each semester can only select one core course!');</script>";
            echo "<script>window.history.back();</script>";
            exit();
            
           }
    else
    {
      
      $sql = "INSERT INTO coursetaken  VALUES (NULL,". $userid.",".$courseid.",2,NULL)" ;
      $res = $link->query($sql);
      echo "<script>alert('You have successfully add a course!');</script>";
       echo "<script>window.history.back();</script>";
      exit();
     
    }
?>

</div>



<hr>
<div id="footer" align="left">
UNIVERSITY LINKS<br>
<a href="course_list.php">Course List</a>
<br>
<a href="Acknowledgment.php">Acknowledgment of Policies Form</a>
<div align="left">
    © The University of Texas at Dallas<br>
</div>
</div>

</body>
</html>