<?php
    session_start();
?>

<html>
<head>
    <title>Admin Menu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>


<div align="right" style="size: 8px">
    <a  href="login.html">Log Out</a>
</div>

<p >Graduate Computer Science Department </p>
<p align="center">The University of Texas at Dallas </p>
<hr/>
<div id=information align="left">
    <h3>
    Administrator Page

    <br/>
    </h3>
<h5>
<a href="studentmanagement.php">Student Management</a>

</h5>
View Modify or Delete a Student Information
<h5>
<br><br>
<a href="coursemanagement.php">Course Management</a>
</h5>
View Modify or Delete the Course Information
<h5>
<br><br>
<a href="appointment.php">Appintment Management</a>
</h5>
Manage student appointmentts

</div>


<br><br><br><br>
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