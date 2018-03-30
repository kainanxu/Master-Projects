<?php
$link = mysqli_connect("localhost","root","","utd_course");
if (!$link) {
	die('Could not connect to MySQL: ' . mysql_error());
	echo 'connection failed'; mysql_close($link);
}
//echo 'Connection OK';

?>