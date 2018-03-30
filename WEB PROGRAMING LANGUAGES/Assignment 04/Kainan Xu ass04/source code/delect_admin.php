<?php
    session_start();
?>

<html>
<head>
    <title>Edit Student Info</title>
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
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    include("conn.php");
    $sql = "delete from coursetaken where (recordid=".$id.")";
    $result = mysqli_query($link,$sql);
    if ($result)
           {
            echo "<script>alert('This record has been delete successfully!');</script>";
            echo "<script>window.history.back();</script>";
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