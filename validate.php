<?php
include "connection.php";
// echo $_POST['username'];
// echo $_POST['password'];
if(isset($_POST['username'])){
    $uname = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $type=mysqli_real_escape_string($con,$_POST['type']);
    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from user where userid='".$uname."' and password='".$password."' and type = '".$type."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            if($type=="admin"){
                $_SESSION['aid']=$uname;
                // echo "admin";
                header('location: admin.php');
            }
            elseif ($type=="faculty") {
                $_SESSION['fid']=$uname;
                // echo "faculty";
                header('location: faculty.php');
            }
            else{
                $_SESSION['usn']=$uname;
                // echo "student";
                header('Location: student.php');
            }
            
        
        }else{
            header('Location: index.php');
        }

    }

}
else{
    echo "there is no value with but_submit as key";
}
?>