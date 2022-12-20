<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
   $status=$_POST["status"];
   $appno=$_COOKIE["appno"];
   $feedback=$_POST["feedback"];
   include 'conndb.php';
   $sql="UPDATE `application` SET `satus` = '$status' , `feedback` = '$feedback' WHERE `application`.`app_no` = $appno";
   $upst=mysqli_query($conn,$sql);
   header("location:showreg.php");
}
?>