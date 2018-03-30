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
<?php
$var = isset($_GET['id']) ? $_GET['id'] : '';
if(isset($_GET['id']))
{
	if($_GET['createrid']==$_SESSION['userid'])
	{
		include("conn.php");
		//检查用户名密码
		$sql = "delete from appointment where appointmentid=".$_GET['id'];
		$sql_2 = "delete from appointment_student where appointmentid=".$_GET['id'];
		//echo $sql;
		
	   $result = mysqli_query($link,$sql);
	   $result = mysqli_query($link,$sql_2);
	   if ($result)
	   {
	       
	       	echo "<script>alert('You have successfully delete an appointment!');</script>";
	    	echo "<script>window.history.back();</script>";
	   }

	   else{
	       exit('failed! click here to <a href="javascript:history.back(-1);">retry</a>');
	    }
	    	  
	   }
   else
   {
   	echo "<script>alert('You cant delete an appointment from another administrator!');</script>";
	echo "<script>window.history.back();</script>";
	}

}
else if(isset($_GET['period_id_from_student']))
{
	include("conn.php");
	$sql_1 = "select * from appointment_student where student_userid=".$_SESSION['userid'];
	$result_1 = mysqli_query($link,$sql_1);
	$var = $result_1->num_rows;
	if($var!=0)
	{
		echo "<script>alert('You cant register more than one appoinment at the same time!');</script>";
		echo "<script>window.history.back();</script>";
	}
	else
	{
		$sql = "update appointment_student set student_userid=".$_SESSION['userid'].",occupied=1, student_name='".$_SESSION['username']."' where period_id=".$_GET['period_id_from_student'];
		//echo $sql;
		
		$result = mysqli_query($link,$sql);
		if ($result)
		   {
		       
		       	echo "<script>alert('You have successfully registered an appointment!');</script>";
		    	echo "<script>window.history.back();</script>";
		   }

		   else{
		   		echo $sql;
		       exit('failed! click here to <a href="javascript:history.back(-1);">retry</a>');

		    }
	}
	    
}
else if(isset($_GET['student_delete']))
{
	include("conn.php");
	//$sql_1 = "update from appointment_student where period_id=".$_GET['student_delete'];
	//$sql_1 = "update appointment_student SET( student_userid = 'NULL', 'occupied' = '0', 'student_name' = '') WHERE 'appointment_student'.'period_id' = ".$_GET['student_delete'].";";
	$sql_1 = "UPDATE `utd_course`.`appointment_student` SET `student_userid` = null, `occupied` = '0', `student_name` = null WHERE `appointment_student`.`period_id` = ".$_GET['student_delete'].";";
	echo $sql_1;
	$result_1 = mysqli_query($link,$sql_1);
	if($result_1)
	{
		echo "<script>alert('You have successfully delete an appointment!');</script>";
		echo "<script>window.history.back();</script>";
	}
	else{
		       exit('failed! click here to <a href="javascript:history.back(-1);">retry</a>');
		    }
	    
}
else if(isset($_GET['period_id']))
{
	include("conn.php");
	$sql = "delete from appointment_student where period_id=".$_GET['period_id'];
	//echo $sql;
	$result = mysqli_query($link,$sql);
	if ($result)
	   {
	       
	       	echo "<script>alert('You have successfully delete an appointment!');</script>";
	    	echo "<script>window.history.back();</script>";
	   }

	   else{
	       exit('failed! click here to <a href="javascript:history.back(-1);">retry</a>');
	    }
}
else{
	//echo $_GET['Title'];
	//echo $_GET['date'];
	//echo $_GET['date_2'];
	//echo $_GET['Description'];
	$start=$_GET['date'];
	$end=$_GET['date_2'];
	$Author=$_SESSION['username'];
	$descrp = $_GET['Description'];
	
	if(isset($_GET['Title']))
	{
		include("conn.php");

		$sql="select appointmentid from appointment where (start='".$start."' and creater='".$Author."')";
		$result_11 = mysqli_query($link,$sql);
		if(mysqli_num_rows($result_11)!=0)
		{
			echo "<script>alert('You cant create 2 appointments in one day!');</script>";
			echo "<script>window.history.back();</script>";
			exit('failed! click here to <a href="javascript:history.back(-1);">retry</a>'); 
		}

		$Date_1 = $start;
		$Date_2 = $end;
		$Date_List_a1 = explode("/",$Date_1);
		$Date_List_a2 = explode("/",$Date_2);

		$year_2=$Date_List_a2[0];
		$month_2=$Date_List_a2[1];
		$dayandtime_2=explode(" ",$Date_List_a2[2]);
		$day_2 = $dayandtime_2[0];
		$time_2 = $dayandtime_2[1];
		$time_list_2 = explode(":",$time_2);
		$hour_2 = $time_list_2[0];
		$minute_2 = $time_list_2[1];

		$year_1=$Date_List_a1[0];
		$month_1=$Date_List_a1[1];
		$dayandtime_1=explode(" ",$Date_List_a1[2]);
		$day_1 = $dayandtime_1[0];
		$time_1 = $dayandtime_1[1];
		$time_list_1 = explode(":",$time_1);
		$hour_1 = $time_list_1[0];
		$minute_1 = $time_list_1[1];

		$d=$day_2-$day_1;
		$period=$time_2-$time_1;
		if($year_1<2016||$month_1<7||$day_1<26)
		{
			echo "<script>alert('You cant create an appointment is in the past!');</script>";
		    echo "<script>window.history.back();</script>";
		}
		if($d!=0)
		{
			echo "<script>alert('You cant create an appointment which last more than one day!');</script>";
		    echo "<script>window.history.back();</script>";
		}
		else
		{
			//访问数据库，进行连接
		   include("conn.php");
		   //检查用户名密码
		   $sql = "INSERT INTO appointment VALUES (NULL, 'Test_1', '".$Author."', '".$_SESSION['userid']."','".$start."', '".$end."', '".$descrp."');";
		   $result = mysqli_query($link,$sql);
		   if ($result)
		   {
		       	include("conn.php");
		       	$sql="select appointmentid from appointment where (start='".$start."' and creater='".$Author."')";
		   		//echo $sql;

		   		$res = $link->query($sql);
		   		$row = $res->fetch_row();
		   		$appointmentid=$row[0];
		   		//echo $row[0];
		   		//echo $time_1."  ".$time_2;
		   		//echo $hour_1." ".$hour_2." ".$minute_1." ".$minute_2;
		       	$dur = ($hour_2-$hour_1)*60+$minute_2+$minute_1;
		       	//echo "dur:".$dur;
		       	$count=$period/0.5;
		       	//echo "period:".$period;
		  		for($i=0;$i*30<$dur;$i++)
		   		{
		   			$min=$i*30;
		   			$sql = "INSERT INTO appointment_student VALUES (NULL, '".$appointmentid."', '".$Author."', '".$_SESSION['userid']."', DATE_ADD('".$start."', INTERVAL $min MINUTE), NULL, '0',NULL);";
		   			//echo $sql;
		   			$res = $link->query($sql);
		   		}
		       	echo "<script>alert('You have successfully registered an appointment!');</script>";
		    	echo "<script>window.history.back();</script>";

		   }
		   else{
		       exit('failed! click here to <a href="javascript:history.back(-1);">retry</a>');
		    }
		}
	}
}
?>


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