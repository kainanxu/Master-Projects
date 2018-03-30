<?php
    session_start();
?>

<html>
<head>
    <title>Main Menu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <script language="javascript">
              function checkdel()
              {if (confirm("Are you sure you want to delete/change this？"))
              {return (true);}
              else
              {return (false);}
              }
    </script>
</head>
<body>


<div align="right" style="size: 8px">
    <a  href="login.php?action=logout">Log Out</a><br>
    <a  href="admin.php">Back to Admin Home</a>
</div>

<p >Graduate Computer Science Department </p>
<a name="top"></a>
<p align="center">The University of Texas at Dallas </p>
<hr/>
<div id=information align="left">
    <h4>
    Welcome,<?php echo $_SESSION['username']?> (Admin)
    <br/>
    Please add a new course or select a course to manage!
    </h4>
    <form method='POST' action="addcourse.php">
    course number: <input type="text" name="number"/>
    &nbsp&nbspcourse name:&nbsp&nbsp &nbsp<input type="text" name="name"/><br>
    description:&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp<input type="text" name="descrip"/>&nbsp&nbsp
    core_course?:&nbsp&nbsp <input type="text" name="core"/>
    <input type="submit" value="create a new course!">
    </form>
    <?php
        include("conn.php");
        $sql = "select id AS CourseID, number AS Course_Number, name AS Course_Name,description AS Description, core AS Core_Course from courses";
        function showTable($link,$query){
        $sql=$query;
        $res = $link->query($sql);
        //获取返回总行数和列数
        echo "".$res->num_rows." courses information in database!";
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
            echo "<td><a  href='delete_c.php?id=".$row[0]."' onclick='return checkdel()'>view/DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        $res->free();
        }
        showTable($link,$sql);
?>


<a href="#top">Back to top of page</a>
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