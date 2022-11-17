
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks and Attendance Tracker</title>
    <link rel="stylesheet" href="rest.css">
</head>
<body>
    <div class="head"> Student Marks And Attendance Tracker</div>
    <div class="user">ADMIN</div>
</body>
</html>
<?php
include "connection.php";
$aid = $_SESSION['aid'];

$sql1="SELECT aname,aemail,depid FROM `Admin` WHERE aid= '".$aid."'";
$select1 = mysqli_query($con,$sql1);
$num_rows1 = mysqli_num_rows($select1);
$rows1 = mysqli_fetch_array($select1, MYSQLI_ASSOC);
echo "
    <div style =\" 
    text-align: left;
    padding-top:50px;  
    padding-left:20px;
    font-size:large;

    \">
    <div>Name: " . $rows1['aname'] . " </div>
    <div>Department: " . $rows1['depid'] . "</div>
    <div>Email ID: " . $rows1['aemail'] . "</div>
    </div>
     ";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student marks and attendance tracker</title>
    <link rel="stylesheet" href="rest.css">
</head>
<body >
<form action="assign.php" method="POST">
		<div class="login">
			<h1>Assign Courses to sections </h1>
			<div class="textbox">
                Course ID: 
				<input  type="text" placeholder="cid"name="cid"  value=""required >
			</div>
			<div class="textbox">
                Faculty Id: 
				<input type="text" placeholder="fid"name="fid"  value=""required >
			</div>
			<div class="textbox">
				Section: 
				<input type="text" placeholder="sec"name="sec"  value="" required>
			</div>
			<div class="textbox">
				Department ID: 
				<input type="text" placeholder="depid"name="depid"  value="" required>
			</div>
            <div class="submit">
			<input class="button" type="submit"name="login" value="assign">
            </div>
		</div>
	</form>
</body>
</html>
<?php
$sql="SELECT depid,dname,demail from Department";
$select = mysqli_query($con,$sql);
$num_rows = mysqli_num_rows($select);
echo "<div style =\" 
padding-top:50px;  
padding-left:20px;
font-size:large;
\">
<div> Department </div> 
<div><table 
border=1px>
<tr>
<th>Department ID</th>
<th>Department Name</th>
<th>Department Email-ID</th>
</tr>";
if ($num_rows > 0) {

    while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $rows['depid'] . "</td>";
    echo "<td>" . $rows['dname'] . "</td>";
    echo "<td>" . $rows['demail'] . "</td>";
    echo "</tr>";
}
}
echo "</table></div></div>";
$sql="SELECT sec from section";
$select = mysqli_query($con,$sql);
$num_rows = mysqli_num_rows($select);
echo " <div style =\" 
float:left; 
padding-top:50px;  
padding-left:20px;
font-size:large;
\">
<div> Section </div> 
<div><table border=1px>
<tr>
<th>Section</th>
</tr>";
if ($num_rows > 0) {

    while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $rows['sec'] . "</td>";
    echo "</tr>";
}
}
echo "</table></div></div>";
$sql="SELECT c.cid,c.cname,c.credits,c.labcourse,d.dname,a.depid FROM course as c, admin as a,Department as d WHERE  c.depid=a.depid and d.depid = a.depid and a.aid = '".$aid."'";
$select = mysqli_query($con,$sql);
$num_rows = mysqli_num_rows($select);
echo "<div style =\" 
float:left; 
padding-top:50px;  
padding-left:20px;
font-size:large;
\">
<div> Courses taught </div> 
<div><table border=1px>
<tr>
<th>Course Id</th>
<th>Course Name</th>
<th>Credits</th>
<th>Labcourse</th>
<th>Department name</th>
<th>Department Id</th>
</tr>";
if ($num_rows > 0) {

    while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $rows['cid'] . "</td>";
    echo "<td>" . $rows['cname'] . "</td>";
    echo "<td>" . $rows['credits'] . "</td>";
    echo "<td>" . $rows['labcourse'] . "</td>";
    echo "<td>" . $rows['dname'] . "</td>";
    echo "<td>" . $rows['depid'] . "</td>";
    echo "</tr>";
}
}
echo "</table></div></div>";


$sql="SELECT f.fid,f.fname,f.fmail,f.fphone FROM faculty  as f, admin as a,Department as d WHERE  f.depid=a.depid and d.depid = a.depid and a.aid = 'is001' and a.aid = '".$aid."'";
$select = mysqli_query($con,$sql);
$num_rows = mysqli_num_rows($select);
echo "<div style =\" 
padding-top:50px;  
padding-left:20px;
font-size:large;
float:left;
\">
<div> faculty </div> 
<div><table border=1px>
<tr>
<th>Faculty Id</th>
<th>Name</th>
<th>Email Address</th>
<th>phone Number</th>
</tr>";
if ($num_rows > 0) {

    while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $rows['fid'] . "</td>";
    echo "<td>" . $rows['fname'] . "</td>";
    echo "<td>" . $rows['fmail'] . "</td>";
    echo "<td>" . $rows['fphone'] . "</td>";
    echo "</tr>";
}
}
echo "</table></div></div>";
?>