<?php
    session_start();
?>

<html>
<head>
    <title>Appointment Management</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
	<style type="text/css">

	.custom-date-style {
		background-color: red !important;
	}

	.input{	
	}
	.input-wide{
		width: 500px;
	}
	</style>
	<script language="javascript">
              function checkdel()
              {if (confirm("Are you sure you want to delete this？"))
              {return (true);}
              else
              {return (false);}
              }
    </script>
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
    Appointment Management
    <br/>
    </h3>
    <h4>
    <fieldset>
    Current Appointment
    <hr>

    <?php 


	include("conn.php");
        $sql = "select appointmentid AS ID, title AS Title, creater AS Creater, createrid AS CreaterID, start AS Start_Date, end AS End_Date from appointment";
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
            echo "<td><a  href='makeappointment.php?id=".$row[0]."&&createrid=".$row[3]."' onclick='return checkdel()'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        $res->free();
        
    ?>

    </fieldset>
    </h4>
    
    <h4>
    <fieldset>
    Create An Appointment:<br>
    <h5>
    <hr>
    <form action="makeappointment.php" method="GET">
    Title:<br>
    <input type="text" name="Title" value="Set a Title"><br>
    <br>
    Date Period:<br>
    <input type="text" value="" id="datetimepicker" name="date"/> - <input type="text" value="" id="datetimepicker_1" name="date_2"/><br>
    <br>Despription:<br>
    <textarea name="Description" cols="49" rows="4"> 
              Set Appintment Description Here.
    </textarea> <br>
    <br>
    <input type="submit" name="asd" value="      Create Appointment      ">

    </form>
    <h5>
    </fieldset>
    </h4>
	 
    <h4>
    <fieldset>
    Manage Student Appointments
    
    <?php 
	include("conn.php");
        $sql = "select period_id AS Apointment_ID, appointmentid AS Date_ID, student_userid AS Student_ID,student_name AS Student_Name, appoinmentdate AS Start_Time, occupied AS Registed  from appointment_student where advisor_userid=".$_SESSION['userid'].";";
        //echo $sql;
        $res = $link->query($sql);
        //获取返回总行数和列数
        echo "".$res->num_rows." students appointments record(s) found in database!";
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
            echo "<td><a  href='makeappointment.php?period_id=".$row[0]."' onclick='return checkdel()'>DELETE</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        $res->free();
        
    ?>

    </fieldset>
    </h4>

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



<script src="./jquery.js"></script>
<script src="build/jquery.datetimepicker.full.js"></script>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2016/08/20 05:00', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'2016/08/20'
});
$('#datetimepicker').datetimepicker({value:'2016/08/20 15:00',step:10});
$('#datetimepicker_1').datetimepicker({value:'2016/08/20 17:00',step:10});
$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
	formatTime:'H:i',
	formatDate:'d.m.Y',
	//defaultDate:'8.12.1986', // it's my birthday
	defaultDate:'+03.01.1970', // it's my birthday
	defaultTime:'10:00',
	timepickerScrollbar:false
});

$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});

$('#datetimepicker1').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});
$('#datetimepicker2').datetimepicker({
	yearOffset:222,
	lang:'ch',
	timepicker:false,
	format:'d/m/Y',
	formatDate:'Y/m/d',
	minDate:'-1970/01/02', // yesterday is minimum date
	maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
$('#datetimepicker3').datetimepicker({
	inline:true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
	$('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
	$('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
	$('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
	datepicker:false,
	allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
	step:5
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
	if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
		$('#datetimepicker6').datetimepicker('destroy');
		this.value = 'create';
	}else{
		$('#datetimepicker6').datetimepicker();
		this.value = 'destroy';
	}
});
var logic = function( currentDateTime ){
	if (currentDateTime && currentDateTime.getDay() == 6){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};
$('#datetimepicker7').datetimepicker({
	onChangeDateTime:logic,
	onShow:logic
});
$('#datetimepicker8').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date')
			.toggleClass('xdsoft_disabled');
	},
	minDate:'-1970/01/2',
	maxDate:'+1970/01/2',
	timepicker:false
});
$('#datetimepicker9').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date.xdsoft_weekend')
			.addClass('xdsoft_disabled');
	},
	weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
	timepicker:false
});
var dateToDisable = new Date();
	dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [false, ""]
		}

		return [true, ""];
	}
});
$('#datetimepicker12').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [true, "custom-date-style"];
		}

		return [true, ""];
	}
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})


</script>
</html>