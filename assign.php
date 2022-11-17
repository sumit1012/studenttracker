<?php
include "connection.php";


    $cid = mysqli_real_escape_string($con,$_POST['cid']);
    $fid = mysqli_real_escape_string($con,$_POST['fid']);
    $sec = mysqli_real_escape_string($con,$_POST['sec']);
    $depid = mysqli_real_escape_string($con,$_POST['depid']);
    if ($cid != "" && $fid != ""&& $sec != ""&& $depid != ""){
        $sql_query = "INSERT INTO `teaches` VALUES ('".$cid."','".$fid."','".$sec."','".$depid."')";
        $result = mysqli_query($con,$sql_query);
        if($result){
            echo "<br> bingo ";
            $sql="SELECT usn FROM student  where ssec='2D'";
            $select = mysqli_query($con,$sql);
            $num_rows = mysqli_num_rows($select);
            if ($num_rows > 0) {
                while ($rows = mysqli_fetch_array($select, MYSQLI_ASSOC)) {
                    echo $rows['usn'];
                    $sql_query = "INSERT INTO enrolls VALUES ('".$cid."','".$rows['usn']."',0,0,0,0,0,0,0)";
                    $result = mysqli_query($con,$sql_query);
                    $sql_query1 = "INSERT INTO atttends  VALUES ('".$cid."', '".$rows['usn']."', 0, 0, 0);";
                    $result1 = mysqli_query($con,$sql_query1);
                }
                header('Location: admin.php');
            }
            else{
                echo "no";
            }
        }
        else {
            header('Location: admin.php');
        }
    }
?>