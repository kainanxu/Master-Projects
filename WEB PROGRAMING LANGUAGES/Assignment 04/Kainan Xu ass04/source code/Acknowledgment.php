<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>home page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">

</head>
<body >
<div align="right" style="size: 8px">
    <a  href="home.php">Back to the home page</a>
</div>
<p >Graduate Computer Science Department </p>
<p align="center">The University of Texas at Dallas </p>
<hr/>
<h1>Master’s Acknowledgment of Policies Form </h1>
<p>**All students must read, complete, sign, and date this form upon entrance to the Graduate CS Department**</p>
<form>
    Name (Last, First):
    <input type="text" name="firstname" />
    <br/>
    UTD ID Number:
    <input type="text" name="firstname" />
    <br/>
</form>
<hr/>
<div align="center">
<form>
    Prerequisites I was assigned in my admission letter/email (check all that apply):
    <br/>
    <input type="checkbox" name="1" />
    CS 5303 Computer Science I
    <input type="checkbox" name="2" />
    CS 5330 Computer Science II
    <br />
    <input type="checkbox" name="3" />
    CS 5333 Discrete Structures
    <input type="checkbox" name="4" />
    CS 5343 Data Structures
    <br />
    <input type="checkbox" name="5" />
    CS 5348 Operating Systems
    <input type="checkbox" name="6" />
    CS 5349 Automata Theory
    <br />
    <input type="checkbox" name="7" />
    CS 5354 Software Engineering
    <input type="checkbox" name="8" />
    CS 5390 Computer Networks
    <br/>
    <input type="checkbox" name="9" />
    CS 3341 Probability & Statistics
</form>
</div>
<hr/>
<div align="left">
    <p>
        By initialing each item below, I indicate that I understand the following policies of The University of Texas at Dallas and the Graduate Computer Science Department:
    </p>
    <form>

        <input type="checkbox" name="1" />
        I must take all my assigned prerequisites unless it has been officially waived by the department or is   not a requirement of my track/degree plan.
        <br/>
        <input type="checkbox" name="2" />
        I must meet with a Faculty Academic Advisor at least once a year to be advised.
        <br/>
        <input type="checkbox" name="3" />
        I know that I will not be allowed to enroll in a closed course. No exceptions. No waitlists.
        <br/>
        <input type="checkbox" name="4" />
        There is a 6-year window to complete all coursework.
        <br/>
        <input type="checkbox" name="5" />
        GPA is calculated on the + and – scale (A, A-, B+, B, B-, C+, C).
        <br/>
        <input type="checkbox" name="6" />
        I must have a core GPA ≥ 3.19, an elective GPA ≥ 3.0, and an overall GPA ≥ 3.0 to graduate.
        <br/>
        <input type="checkbox" name="7" />
        I may only repeat a course two times; I can only have a total of three repeats across all courses
        <br/>
        <input type="checkbox" name="8" />
        I must make up any incomplete (I) grades by the deadline or it will turn into an F on my transcript
        <br/>
        <input type="checkbox" name="9" />
        I know I must complete additional paperwork to change my major/program from CS to SE or from  SE to CS at least two semesters prior to graduation.
        <br/>


    </form>
<hr>
</div>
<div id="footer" align="left">
UNIVERSITY LINKS<br>
<a href="course_list.html">Course List</a>
<br>
<a href="Acknowledgment.php">Acknowledgment of Policies Form</a>
<div align="left">
    © The University of Texas at Dallas<br>
</div>
</div>

</body>
</html>