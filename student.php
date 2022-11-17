
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
    <div class="user">Student</div>
</body>
</html>
<?php
include "connection.php";
$usn = $_SESSION['usn'];
$sql1="SELECT sname,semail,ssem,sphone,ssec,depid FROM `student` WHERE usn= '".$usn."'";
$select1 = mysqli_query($con,$sql1);
$num_rows1 = mysqli_num_rows($select1);
$rows1 = mysqli_fetch_array($select1, MYSQLI_ASSOC);
echo "
<div style =\" 
padding-top:50px;  
padding-left:220px;
font-size:large;
\">
    <div>Name: " . $rows1['sname'] . " </div>
    <div>Department: " . $rows1['depid'] . "</div>
    <div>Section:" . $rows1['ssec'] . " </div>
    <div>Semester:" . $rows1['ssem'] . " </div>
    <div>Email ID: " . $rows1['semail'] . "</div>
    <div>Phone Number:" . $rows1['sphone'] . " </div>
    </div>
     ";


$sql="SELECT e.cid, e.cie1,e.cie2,e.cie3,e.aat,e.labexam,e.labrecord,e.eligibility,a.totalclass,a.attended,a.aeligibility
FROM enrolls as e, atttends as a WHERE a.cid=e.cid and a.usn = e.usn and e.usn = '".$usn."'";
$select = mysqli_query($con,$sql);
$num_rows = mysqli_num_rows($select);
echo " 

<div style =\" 
padding-top:50px;  
padding-left:20px;
font-size:large;
\">
<div style=\"  color:black;
text-align: center;
\"> Internals Marks</div>
<div style=\" padding-left:200px;\">
<table style =\" 
content-align:center;
\" border=1px>
<tr>
<th>cid</th>
<th>cie1</th>
<th>cie2</th>
<th>cie3</th>
<th>aat</th>
<th>labexam</th>
<th>labrecord</th>
<th>eligibility(in internals)</th>
<th>totalclasses</th>
<th>attended</th>
<th>eligibility(in attendance)</th>
</tr>";

if ($num_rows > 0) {

    while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $rows['cid'] . "</td>";
    echo "<td>" . $rows['cie1'] . "</td>";
    echo "<td>" . $rows['cie2'] . "</td>";
    echo "<td>" . $rows['cie3'] . "</td>";
    echo "<td>" . $rows['att'] . "</td>";
    echo "<td>" . $rows['labexam'] . "</td>";
    echo "<td>" . $rows['labrecord'] . "</td>";
    echo "<td>" . $rows['eligibility'] . "</td>";
    echo "<td>" . $rows['totalclass'] . "</td>";
    echo "<td>" . $rows['attended'] . "</td>";
    echo "<td>" . $rows['aeligibility'] . "</td>";
    echo "</tr>";
}
}
echo "</table></div></div></div>";
?>