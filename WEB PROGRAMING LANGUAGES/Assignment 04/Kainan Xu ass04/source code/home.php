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
              {if (confirm("Are you sure you want to delect these course(s)？"))
              {return (true);}
              else
              {return (false);}
              }
    </script>
</head>
<body>


<a name="top"></a>
<div id="cookie" align="right">
<?php
    if(isset($_COOKIE['name']))
    {
        if($_COOKIE['name']==$_SESSION['username'])
        {
        echo "Welcome," . $_SESSION['username'] . "!<br />";
        echo "Your Last Visit Date is:" . $_COOKIE['lastVisit'] . "<br />";
        }
        else
            echo "Welcome! ".$_SESSION['username']." This is your first login";
    }
?>
</div>

<div align="right" style="size: 8px">
    <a  href="login.php?action=logout">Log Out</a>
</div>

<p >Graduate Computer Science Department </p>
<p align="center">The University of Texas at Dallas </p>
<hr/>
<div id=information align="left">
    <fieldset>
    <h4>
    Welcome,<?php echo $_SESSION['username']?>
    <br/>

    Your track is: <?php if($_SESSION['Userdegreeplanid']==3) echo "Data Science."; if($_SESSION['Userdegreeplanid']==4) echo "Networks and Telecommunication."; ?> <br/>
    Your NetID is: <?php echo $_SESSION['userid']; ?> <br>
    Your telphone number is:
    <?php 
        echo $_SESSION['tel'];
    ?>
    <br>Your Email address is :
    <?php 
        echo $_SESSION['email'];
    ?>
    </h4>
    </fieldset>
    <fieldset>
    <h4>
    Making An Appointment with a advisor:<br>
    <?php 
    include("conn.php");
        $sql = "select period_id AS Apointment_ID, appointmentid AS Date_ID,advisor AS Advisor_Name, appoinmentdate AS Start_Time, student_userid AS Student_ID, occupied AS Registed  from appointment_student where occupied!=1";
        //echo $sql;
        $res = $link->query($sql);
        //获取返回总行数和列数
        echo "".$res->num_rows." appointments record(s) found in database!";
        //获取表头---从$res取出
        echo "<table border=2><tr>";
        while($field=$res->fetch_field())
        {
            echo "<th>{$field->name}</th>";
        }
        echo "<th>Action</th>";
        echo "</tr>";
        //循环取出数据
        while($row=$res->fetch_row()){
            
            echo "<tr>";

            foreach($row as $value)
            {
                echo "<td align='center'>$value</td>";
            }
            echo "<td><a  href='makeappointment.php?period_id_from_student=".$row[0]."' onclick='return checkdel()'>Register</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        $res->free();
        
    ?>
    <hr>
    And this is your up coming registration:<br>
    <br>
    <?php 
    include("conn.php");
        $sql = "select period_id AS Apointment_ID, appointmentid AS Date_ID,advisor AS Advisor_Name, appoinmentdate AS Start_Time, student_userid AS Student_ID, occupied AS Registed  from appointment_student where student_userid=".$_SESSION['userid'];
        //echo $sql;
        $res = $link->query($sql);
        //获取返回总行数和列数
        //echo "".$res->num_rows." appointments record(s) found in database!";
        //获取表头---从$res取出
        echo "<table border=2><tr>";
        while($field=$res->fetch_field())
        {
            echo "<th>{$field->name}</th>";
        }
        echo "<th>Action</th>";
        echo "</tr>";
        //循环取出数据
        while($row=$res->fetch_row()){
            
            echo "<tr>";

            foreach($row as $value)
            {
                echo "<td align='center'>$value</td>";
            }
            echo "<td><a  href='makeappointment.php?student_delete=".$row[0]."' onclick='return checkdel()'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        $res->free();
        
    ?>    
    </h4>
    </fieldset>
    <fieldset>
    <h4>
    Here is your information:<br> <br>
    <hr>
    Your OverAll GPA is: <?php 
            include("conn.php");
            $sql = "select grade from coursetaken where (studentid=".$_SESSION['userid']." AND coursetaken.states=0)";
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
             <br>Your Core GPA is: <?php 
            include("conn.php");
            $sql = "select coursetaken.grade from coursetaken,courses where (coursetaken.studentid=".$_SESSION['userid']." AND coursetaken.states=0 AND coursetaken.courseid=courses.id AND courses.core=1)";
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
    <br>Minimum Grade to requirement to graduate:3.19(Core) and 3.0(overall)<br>
    <br>Course Takken:
    </h4>

     <?php
            include("conn.php");
            $sql = "select coursetaken.recordid AS id,courses.name AS Course_Name,courses.number AS Course_Number,coursetaken.grade AS Grade from courses, coursetaken where (coursetaken.studentid=".$_SESSION['userid']." AND courses.id=coursetaken.courseid AND coursetaken.states=0)";
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
             echo "<th>Letter Grade</th>";
             echo "</tr>";
             //循环取出数据
             while($row=$res->fetch_row()){
              echo "<tr>";
              foreach($row as $value){
               echo "<td align='center'>$value</td>";
              }
              {
              if($row[3]<60)
                echo "<td align='center'>F</td>";
              else if($row[3]<70)
                echo "<td align='center'>D</td>";
              else if($row[3]<80)
                echo "<td align='center'>C</td>";
            else if($row[3]<83)
                echo "<td align='center'>B-</td>";
            else if($row[3]<87)
                echo "<td align='center'>B</td>";
            else if($row[3]<90)
                echo "<td align='center'>B+</td>";
            else if($row[3]<93)
                echo "<td align='center'>A-</td>";
            else
                echo "<td align='center'>A</td>";
        }
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
                      //course taking
                      include("conn.php");
                      $sql = "select coursetaken.recordid AS id,courses.name AS Course_Name,courses.number As Course_Number from courses, coursetaken where (coursetaken.studentid=".$_SESSION['userid']." AND courses.id=coursetaken.courseid AND coursetaken.states=1)";
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
             echo "</tr>";
             //循环取出数据
             while($row=$res->fetch_row()){
              echo "<tr>";
              foreach($row as $value){
               echo "<td align='center'>$value</td>";
              }
              
              echo "</tr>";
             }
             echo "</table>";
             $res->free();
            }
                      showTable_1($link,$sql);
                  ?>
     
            <h4>
                Course Taking at next term:<br>
            </h4>
                <?php
                       //course picked next term:
                       include("conn.php");
                        $sql = "select coursetaken.courseid AS CourseID ,courses.name AS Course_Name,courses.number AS Course_Number from courses, coursetaken where (coursetaken.studentid=".$_SESSION['userid']." AND courses.id=coursetaken.courseid AND coursetaken.states=2)";
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
             echo "</tr>";
             //循环取出数据
             while($row=$res->fetch_row()){
              echo "<tr>";
              foreach($row as $value){
               echo "<td align='center'>$value</td>";
              }
              
              echo "</tr>";
             }
             echo "</table>";
             $res->free();
            }
                        showTable_2($link,$sql);
                 ?>
                 </fieldset>
</div>

<hr/>

<div id="degree_plan" align="left">
<h2>Degree Planner</h2>
<fieldset>
    <div align="left">
    <h3>Delect Courses:<br></h3>
    <?php
        include("conn.php");
         $sql = "select courses.name from courses, coursetaken where (coursetaken.studentid=".$_SESSION['userid']." AND courses.id=coursetaken.courseid AND coursetaken.states=2)";
        function showbox($link,$query){
        $sql=$query;
        //$sql = "select courses.name,courses.number,coursetaken.grade from courses, coursetaken where (coursetaken.studentid=".$_SESSION['userid']." AND courses.id=coursetaken.courseid AND coursetaken.states=0)";
         $res = $link->query($sql);
         //获取返回总行数和列数
         //echo "Find: ".$res->num_rows." record in:".$res->field_count." Columns.";

         //循环取出数据
         echo "<form name='input' action='delect.php' method='get'>";
         $var=0;
         while($row=$res->fetch_row()){

          foreach($row as $value){
          $SESSION['course']=$value;
           echo "<label><input name='$value' type='checkbox' value='$value'>$value</label>";
           echo "<br>";
            $var++;
          // echo $value;
          }

         }
         $res->free();
         echo "<br>";
         echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='submit' value='DELETE SELECT COURSES' onclick='return checkdel()' align='center'/>";
        echo "</form>";
        }

        showbox($link,$sql);
    ?>
    <hr>
    <h3>Add Courses:<br></h3>
    <h4>Your track is: <?php if($_SESSION['Userdegreeplanid']==3) echo "Data Science."; if($_SESSION['Userdegreeplanid']==4) echo "Networks and Telecommunication."; ?>
    <br></h4>
    Core course available for your track:<br><br>
    <?php
    include("conn.php");
    if($_SESSION['Userdegreeplanid']==3)
    {$sql = "select id AS CourseID, number AS Course_Number, name AS Course_Name from courses where core=1 or core =3 ";}
    else if($_SESSION['Userdegreeplanid']==4)
    {echo $_SESSION['Userdegreeplanid'];
    $sql = "select id AS CourseID, number AS Course_Number, name AS Course_Name from courses where core=2";
    }
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
              echo "<td align='center'><a  href='Add.php?courseid=".$row[0]."&userid=".$_SESSION['userid']."&core=1'>Add</a></td>";
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
              echo "<td align='center'><a  href='Add.php?courseid=".$row[0]."&userid=".$_SESSION['userid']."&core=0'>Add</a></td>";
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