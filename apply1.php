<?php
if(isset($_POST["next"]))
{
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $gname=$_POST["gname"];
    $dob=$_POST["dob"];
    $code=$_POST["code"];
    $doctor=$_POST["doctor"];
    $address=$_POST["address"];
    session_start();
    $userid=$_SESSION["userid"];
    $status="NA";
    include 'conndb.php';
    $sqla="INSERT INTO `application` (`fname`, `lname`, `gname`, `dob`, `address`, `Doctor`, `doctorcode`, `satus`, `userid`, `datetime`) VALUES ('$fname', '$lname', '$gname', '$dob', '$address', '$doctor', '$code', '$status', '$userid', current_timestamp())";
    $appins=mysqli_query($conn,$sqla);
    if ($appins) {
        $sqlapno="SELECT * FROM `application` WHERE `userid` = '$userid' ORDER BY `datetime` DESC";
        $appno=mysqli_query($conn,$sqlapno);
        $row=mysqli_fetch_assoc($appno);
        $no=$row['app_no'];
       setcookie("appno","$no", time()+86400,"/");
        header("location: patientd.php");
        exit();
    }
    else {
        echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">ERROR!</h4>
        <p>Can\'t insert ur registration details into database.</p>
        <hr>
        <p class="mb-0">'.mysqli_error($conn).'</p>
      </div>';
    }

}



?>