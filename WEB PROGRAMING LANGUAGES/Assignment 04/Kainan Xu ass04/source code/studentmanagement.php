<?php
    session_start();
?>

<html>
<head>
    <title>Main Menu</title>
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
    <h4>
    Welcome,<?php echo $_SESSION['username']?> (Admin)
    <br/>
    Please select a student to view or manage!
    </h4>
    <?php
        include("conn.php");
        $sql = "select userid AS UserID, username AS UserName, userdegreeplanid AS Degree_Plan,tel AS Telphone_Number, email AS Email from users where (userdegreeplanid>0)";
        function showTable($link,$query){
        $sql=$query;
        $res = $link->query($sql);
        //获取返回总行数和列数
        echo "".$res->num_rows." student information in database!";
        //获取表头---从$res取出
        echo "<table border=1><tr>";
        while($field=$res->fetch_field())
        {
            echo "<th>{$field->name}</th>";
        }
        echo "<th>action</th>";
        echo "</tr>";
        //循环取出数据
        while($row=$res->fetch_row()){
            
            echo "<tr>";

            foreach($row as $value)
            {
                echo "<td align='center'>$value</td>";
            }
            
            //echo "<td><form action='studentedit.php'>&nbsp <input type='submit' value='view/edit' />&nbsp</form></td>";
            //echo "<td><input type='button' onClick='window.open('http://www.163.com ')' value='view/edit'/></td>";
            echo "<td><a  href='studentedit.php?id=".$row[0]."&name=".$row[1]."'>view/edit</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        $res->free();
        }
        showTable($link,$sql);
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