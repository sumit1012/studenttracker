
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
    <div class="user">Faculty</div>
</body>
</html>
<?php
include "connection.php";

$fid = $_SESSION['fid'];

$sql1="SELECT fid,fname,fmail,depid,fphone FROM `faculty` WHERE fid= '".$fid."'";
$select1 = mysqli_query($con,$sql1);
$num_rows1 = mysqli_num_rows($select1);
$rows1 = mysqli_fetch_array($select1, MYSQLI_ASSOC);
echo "
    <div>Name: " . $rows1['fname'] . " </div>
    <div>Faculty ID: " . $rows1['fid'] . " </div>
    <div>Department: " . $rows1['depid'] . "</div>
    <div>Email ID: " . $rows1['fmail'] . "</div>
    <div>Phone Number:" . $rows1['fphone'] . " </div>
     ";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
<form action="update.php" method="POST">
		<div class="">
			<h1>Update</h1>
			<div class="">
            <table border=1px>
            <tr>
            <th>USN</th>
            <th>Course ID</th>
            <th>CIE: 1</th>
            <th>CIE: 2</th>
            <th>CIE: 3</th>
            <th>AAT</th>
            
            </tr>
            <tr>
                <td><input  type="text" placeholder="usn"name="usn"  value=""  required></td>
                <td><input  type="text" placeholder="cid"name="cid"  value="" required></td>
                <td><input  type="text" placeholder="cie1"name="cie1"  value="" required></td>
                <td><input  type="text" placeholder="cie2"name="cie2"  value="" required></td>
                <td><input  type="text" placeholder="cie3"name="cie3"  value="" required></td>
                <td><input  type="text" placeholder="aat"name="aat"  value="" required></td>
            </tr>
            </table>
            <table border=1px>
                <tr>
                <th>Lab Exam</th>
            <th>Lab Record</th>
            <th>Eligibility</th>
            <th>Total classes helded</th>
            <th>Total classes attended</th>
            <th>Attendance Eligibility</th>
                </tr>
                <tr>
                <td><input  type="text" placeholder="labexam"name="labe"  value="" required></td>
                <td><input  type="text" placeholder="labrecord"name="labr"  value="" required></td>
                <td><input  type="text" placeholder="Eligibility"name="iel"  value="" required></td>
                <td><input  type="text" placeholder="total classes"name="totalc"  value="" required></td>
                <td><input  type="text" placeholder="attended"name="attendc"  value="" required></td>
                <td><input  type="text" placeholder="attendance eligibility"name="ael"  value="" required></td>
            </tr>
            </table>
			<input class="button" type="submit"name="update" value="update">
		</div>
	</form>
</body>
</html>
<?php

    echo "<br><br><br><br>";
     $sql="SELECT t.cid,c.cname from teaches as t,course as c where t.fid='".$fid."' and t.cid = c.cid GROUP BY t.cid  ";
     $select = mysqli_query($con,$sql);
     $num_rows = mysqli_num_rows($select);
     echo "<div>
     <div> Currently courses handled Courses</div> 
     <div><table border=1px>
     <tr>
     <th>Course ID</th>
     <th>Course Name</th>
     </tr>";
     if ($num_rows > 0) {
     
         while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
         echo "<tr>";
         echo "<td>" . $rows['cid'] . "</td>";
         echo "<td>" . $rows['cname'] . "</td>";
         echo "</tr>";
     }
     }
     echo "</table></div></div>";

     $sql="SELECT sec from teaches where fid='".$fid."' GROUP BY sec ";
    $select = mysqli_query($con,$sql);
    $num_rows = mysqli_num_rows($select);
    echo "Details of every Section <br>";

    if ($num_rows > 0) {

    while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
        // echo "<br> '".$rows['sec']."' : <br>";
        $sql1="SELECT cid from teaches where sec='".$rows['sec']."' and fid='".$fid."'  ";
        $select1 = mysqli_query($con,$sql1);
        $num_rows1 = mysqli_num_rows($select1);
        if($num_rows1>0){
            while($rows1 = mysqli_fetch_array($select1, MYSQLI_ASSOC)){
                // echo "<br>'".$rows1['cid']."':-> '".$rows['sec']."'   <br>";

                $sql2 = "select e.usn, s.sname, e.cie1,e.cie2,e.cie3,e.aat,e.labexam,e.labrecord,e.eligibility,a.totalclass,a.attended,a.aeligibility from atttends as a,enrolls as e, student as s where s.usn=a.usn and a.cid = e.cid and a.usn = e.usn and s.ssec = '".$rows['sec']."' and a.cid = '".$rows1['cid']."'";
                $select2 = mysqli_query($con,$sql2);
                $num_rows2 = mysqli_num_rows($select2);
                echo "<br> Section: ".$rows['sec']." <br> ";
                echo "Course ID: ".$rows1['cid']." <br>";                
                if($num_rows2>0){

                echo "<div>
                <div><table border=1px>
                <tr>
                <th>USN</th>
                <th>Name</th>
                <th>CIE:1</th>
                <th>CIE:2</th>
                <th>CIE:3</th>
                <th>AAT</th>
                <th>Labexam</th>
                <th>Labrecord</th>
                <th>eligibility</th>
                <th>total classes helded</th>
                <th>total attended</th>
                <th>attendance elegibility</th>
                 </tr>";
                    while($rows2 = mysqli_fetch_array($select2, MYSQLI_ASSOC)){
                        echo "<tr>";
                        echo "<td>" . $rows2['usn'] . "</td>";
                        echo "<td>" . $rows2['sname'] . "</td>";
                        echo "<td>" . $rows2['cie1'] . "</td>";
                        echo "<td>" . $rows2['cie2'] . "</td>";
                        echo "<td>" . $rows2['cie3'] . "</td>";
                        echo "<td>" . $rows2['aat'] . "</td>";
                        echo "<td>" . $rows2['labexam'] . "</td>";
                        echo "<td>" . $rows2['labrecord'] . "</td>";
                        echo "<td>" . $rows2['eligibility'] . "</td>";
                        echo "<td>" . $rows2['totalclass'] . "</td>";
                        echo "<td>" . $rows2['attended'] . "</td>";
                        echo "<td>" . $rows2['aeligibility'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table></div></div>";
                }
                else {
                    echo "No Students <br>";
                }
                
            }
        }

            }
    }

?>