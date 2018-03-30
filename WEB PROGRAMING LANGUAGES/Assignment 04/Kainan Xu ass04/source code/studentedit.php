<?php
    session_start();
?>

<html>
<head>
    <title>Edit Student Info</title>
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
<a name="top"></a>
<p >Graduate Computer Science Department </p>
<p align="center">The University of Texas at Dallas </p>

<hr/>
<div id=information align="left">
    <?php
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $name = isset($_GET['name']) ? $_GET['name'] : '';

    ?>
    <h4>
    <?php
    include("conn.php");
    $sql = "select userid AS UserID, username AS UserName,userloginpassword, userdegreeplanid AS Degree_Plan,tel AS Telphone_Number, email AS Email from users where userid=".$id;
    $res = $link->query($sql);
    $row = $res->fetch_row();
    $passwd = $row[2];
    $userdegreeplanid = $row[3];
    $tel = $row[4];
    $email = $row[5];
    $_SESSION['uid']=$id;
    ?>
    Student <?php echo $name . "'s information:" ?> <br/>
    Track: <?php if($userdegreeplanid==3) echo "Data Science."; if($userdegreeplanid==4) echo "Networks and Telecommunication."; ?>  <a href='edit.php?action=changedegree_plan' onclick='return checkdel()'>change</a><br/>
    <?php
    $_SESSION['netid']=$id;
    $_SESSION['userdegreeplanid']=$userdegreeplanid;
    ?>
    NetID: <?php echo $id; ?> <br>
    Password:<?php 
      echo $passwd;
    ?><br>
    <form  method="POST" action="edit.php" >
            <input name = "passwd" type="text"/>
            <input value="Change" type="submit" name="submit" onclick='return checkdel()'/>
    </form>
    Telphone number:
    <?php 
        echo $tel;
    ?>
    <form  method="POST" action="edit.php" >
            <input name = "tel" type="text"/>
            <input value="Change" type="submit" name="submit" onclick='return checkdel()'/>
    </form>
    Email address:
    <?php 
        echo $email;
    ?>
    <form  method="POST" action="edit.php" >
            <input name = "Email" type="text"/>
            <input value="Change" type="submit" name="submit" onclick='return checkdel()'/>
    </form>

    <br/>
    </h4>

    <h4>
    OverAll GPA: <?php 
            include("conn.php");
            $sql = "select grade from coursetaken where (studentid=".$id." AND coursetaken.states=0)";
            $res = $link->query($sql);
            

            $max=0;
            while($row=$res->fetch_row())
            {
                foreach($row as $value){
                if($value<60)
                    $gpa=0;
                 else if($value<70)
                $gpa=1;
                else if($value<80)
                $gpa=2;
                 else if($value<83)
                $gpa=2.7;
                else if($value<86)
                $gpa=3;
                 else if($value<90)
                $gpa=3.4;
                else if($value<93)
                $gpa=3.7;
                else
                $gpa=4.0;
                $max=$gpa+$max;
              }
              $avg=$max/$res->num_rows;
              
            }
              if(isset($avg))
              echo $avg;
            ?>
    <br>Core GPA: <?php 
            include("conn.php");
            $sql = "select coursetaken.grade from coursetaken,courses where (coursetaken.studentid=".$id." AND coursetaken.states=0 AND coursetaken.courseid=courses.id AND courses.core=1)";
            $res = $link->query($sql);
            $num_cores=$res->num_rows;
            if($num_cores==0)
                echo "0";
            else
            {
                $max=0;
                while($row=$res->fetch_row())
                {
                    foreach($row as $value){
                    if($value<60)
                        $gpa=0;
                    else if($value<70)
                    $gpa=1;
                    else if($value<80)
                    $gpa=2;
                    else if($value<83)
                    $gpa=2.7;
                    else if($value<86)
                    $gpa=3;
                    else if($value<90)
                    $gpa=3.4;
                    else if($value<93)
                    $gpa=3.7;
                    else
                    $gpa=4.0;
                    $max=$gpa+$max;
                }
                $avg=$max/$res->num_rows;
                echo $avg;
            }
            }
              
              //echo $avg;
            ?>
    <br>Course Takken:<br>
    </h4>
     <?php
            include("conn.php");
            $sql = "select coursetaken.recordid AS id,courses.name AS Course_Name,courses.number AS Course_Number,coursetaken.grade AS Grade from courses, coursetaken where (coursetaken.studentid=".$id." AND courses.id=coursetaken.courseid AND coursetaken.states=0)";
            //$result = mysqli_query($link,$sql);
            //echo $sql;
            //$result = mysqli_fetch_array(mysqli_query($link,$sql));
            function showTable($link,$query){
            $sql=$query;
            $res = $link->query($sql);
            //获取返回总行数和列数
            echo "Find ".$res->num_rows." record(s)";
            //获取表头---从$res取出
            echo "<table border=1><tr>";
            while($field=$res->fetch_field()){
            echo "<th>{$field->name}</th>";
            }
            echo "<th>Action</th>";
            echo "</tr>";
            //循环取出数据
            while($row=$res->fetch_row()){
              echo "<tr>";
              foreach($row as $value){
              echo "<td align='center'>$value</td>";
              }
              echo "<td><a href='delect_admin.php?id=".$row[0]."' onclick='return checkdel()'>DELETE</a></td>";
              echo "</tr>";
            }
            echo "</table>";
            $res->free();
            }
            showTable($link,$sql);
        ?>

     
      <h4>
          Course Taking at this term:<br>
      </h4>
          <?php
            include("conn.php");
            $sql = "select coursetaken.recordid AS id,courses.name AS Course_Name,courses.number As Course_Number from courses, coursetaken where (coursetaken.studentid=".$id." AND courses.id=coursetaken.courseid AND coursetaken.states=1)";
            function showTable_1($link,$query){
            $sql=$query;
            $res = $link->query($sql);
            //获取返回总行数和列数
            echo "Find ".$res->num_rows." record(s)";
            //获取表头---从$res取出
            echo "<table border=1><tr>";
            while($field=$res->fetch_field()){
            echo "<th>{$field->name}</th>";
            }
            echo "<th>action</th>";
            echo "</tr>";
            //循环取出数据
            while($row=$res->fetch_row()){
            echo "<tr>";
            foreach($row as $value){
            echo "<td align='center'>$value</td>";
            }
            echo "<td><a href='delect.php' onclick='return checkdel()'>DELETE</a></td>";
            echo "</tr>";
            
            }
            echo "</table>";
            $res->free();
            }
            showTable($link,$sql);
            ?>
     
            <h4>
                Course Taking at next term:<br>
            </h4>
            <?php
                include("conn.php");
                $sql = "select coursetaken.recordid AS id ,courses.name AS Course_Name,courses.number AS Course_Number from courses, coursetaken where (coursetaken.studentid=".$id." AND courses.id=coursetaken.courseid AND coursetaken.states=2)";
                function showTable_2($link,$query){
                $sql=$query;
                $res = $link->query($sql);
                //获取返回总行数和列数
                echo "Find ".$res->num_rows." record(s)";
                //获取表头---从$res取出
                echo "<table border=1><tr>";
                while($field=$res->fetch_field()){
                echo "<th>{$field->name}</th>";
                }
                echo "<th>action</th>";
                echo "</tr>";
                //循环取出数据
                while($row=$res->fetch_row()){
                echo "<tr>";
                foreach($row as $value){
                echo "<td align='center'>$value</td>";
                }
                echo "<td><a href='delect.php' onclick='return checkdel()'>delect</a></td>";
                echo "</tr>";
                
              }
              echo "</table>";
              $res->free();
              }
              showTable($link,$sql);
            ?>
<hr>
<fieldset>
<h4>Add a course for this student</h4>
<h4>Student's track is: <?php if($userdegreeplanid==3) echo "Data Science."; if($userdegreeplanid==4) echo "Networks and Telecommunication."; ?><br></h4>
    Core course available for this track:<br><br>
    <?php
    include("conn.php");
    if($userdegreeplanid==3)
    $sql = "select id AS CourseID, number AS Course_Number, name AS Course_Name from courses where core=1 or core=3";
    else if($userdegreeplanid==4)
    $sql = "select id AS CourseID, number AS Course_Number, name AS Course_Name from courses where core=2";
    $res = $link->query($sql);
             $res = $link->query($sql);
             //获取返回总行数和列数
             //echo "Find ".$res->num_rows." record(s)";
             //获取表头---从$res取出
             echo "<table border=1><tr>";
             while($field=$res->fetch_field()){
               echo "<th>{$field->name}</th>";
             }
             echo "<th>Action</th>";
             echo "</tr>";
             //循环取出数据
             while($row=$res->fetch_row()){
              echo "<tr>";
              foreach($row as $value){
               echo "<td align='center'>$value</td>";
              }
              echo "<td align='center'><a  href='Add.php?courseid=".$row[0]."&userid=".$id."&core=1'>Add</a></td>";
              echo "</tr>";
             }
             echo "</table>";
             $res->free();

    ?>
    <br>
    Elective Course for your track:<br>
    Choose one from below:<br>
    <?php
    include("conn.php");
    $sql = "select id AS CourseID, number AS Course_Number, name AS Course_Name from courses where core=0";
    $res = $link->query($sql);
             $res = $link->query($sql);
             //获取返回总行数和列数
             //echo "Find ".$res->num_rows." record(s)";
             //获取表头---从$res取出
             echo "<table border=1><tr>";
             while($field=$res->fetch_field()){
               echo "<th>{$field->name}</th>";
             }
             echo "<th>Action</th>";
             echo "</tr>";
             //循环取出数据
             while($row=$res->fetch_row()){
              echo "<tr>";
              foreach($row as $value){
               echo "<td align='center'>$value</td>";
              }
              echo "<td align='center'><a  href='Add.php?courseid=".$row[0]."&userid=".$id."&core=0'>Add</a></td>";
              echo "</tr>";
             }
             echo "</table>";
             $res->free();

    ?>
    
    </div>
</fieldset>

</div>



<a href="#top">Back to top of page</a>
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