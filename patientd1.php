<?php
if(isset($_POST["submit"]))
{
    $gender=$_POST["gender"];
    $age=$_POST["age"];
    $mstatus=$_POST["mstatus"];
    $phone=$_POST["phone"];
    $altphno=$_POST["altphno"];
    $email=$_POST["email"];
    $discription=$_POST["discription"];
    $appno=$_COOKIE["appno"];
    include 'conndb.php';
    $sqlg="INSERT INTO `patient_details` (`app_no`, `gender`, `age`, `mstatus`, `f_phno`, `alt_phno`, `email`,  `discription`) VALUES ('$appno', '$gender', '$age', '$mstatus', '$phone', '$altphno', '$email', '$discription')";
    $insertg=mysqli_query($conn,$sqlg);
    if ($insertg) {
      echo  '<div class="container my-3">
        <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Submitted successfully</h4>
        <p>Your registration has been submitted successfully.Your registration number is <strong>'.$appno.'</strong> </p>
        <hr>
        <p class="mb-0"><a class="btn btn-primary" href="home.php" role="button">Go to home</a></p>
        </div>
        </div>';
        exit();
    }
    else {
      echo  '<div class="container my-3">
        <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Error!</h4>
  <p>can\'t submit ur application.</p>
  <hr>
  <p class="mb-0">'.mysqli_error($conn).'.</p>
</div>
        </div>';
    }
}

?>