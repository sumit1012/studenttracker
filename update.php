<?php
include "connection.php";
$fid = $_SESSION['fid'];

$usn = mysqli_real_escape_string($con,$_POST['usn']);
$cid = mysqli_real_escape_string($con,$_POST['cid']);
$cie1 = mysqli_real_escape_string($con,$_POST['cie1']);
$cie2 = mysqli_real_escape_string($con,$_POST['cie2']);
$cie3 = mysqli_real_escape_string($con,$_POST['cie3']);
$aat = mysqli_real_escape_string($con,$_POST['aat']);
$labe = mysqli_real_escape_string($con,$_POST['labe']);
$labr = mysqli_real_escape_string($con,$_POST['labr']);
$iel = mysqli_real_escape_string($con,$_POST['iel']);
$totalc = mysqli_real_escape_string($con,$_POST['totalc']);
$attendc = mysqli_real_escape_string($con,$_POST['attendc']);
$ael = mysqli_real_escape_string($con,$_POST['ael']);

        $sql_query = "SELECT COUNT(usn) as cntUser from student as s, teaches as t where t.sec=s.ssec and s.usn='".$usn."' and t.cid = '".$cid."' and t.fid = '".$fid."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);
        $count = $row['cntUser'];
        if($count>0){
            $sql1 = "UPDATE atttends SET totalclass='".$totalc."',attended='".$attendc."',aeligibility='".$ael."' WHERE usn = '".$usn."' and cid = '".$cid."'";
            $result1 = mysqli_query($con,$sql1);
            $sql2 = "UPDATE enrolls SET cie1='".$cie1."',cie2='".$cie2."',cie3='".$cie3."',aat='".$aat."',labexam='".$labe."',labrecord='".$labr."',eligibility='".$iel."' WHERE usn= '".$usn."' and cid = '".$cid."'";
            $result1 = mysqli_query($con,$sql2);
            header('Location: faculty.php');
        }
        header('Location: faculty.php');
    
?>