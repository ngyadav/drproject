<?php
if (isset($_POST["submit"])) {
    session_start();
    include 'conndb.php';
    $doctor = $_POST["doctor"];
    $location = $_POST["location"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $type = $_POST["type"];
    $code = $_SESSION["code"];
    $age = $_POST["age"];
    $exp = $_POST["exp"];
    $img = $_POST["img"];
    //$sql = "INSERT INTO `doctor` (`name`, `code`, `location`, `age`, `exp`, `phno`, `email`, `type`, `image`) VALUES ('$doctor', '$code', '$location', '$age', '$exp', '$phone', '$email', '$type', '$img')";
    $sqlu="UPDATE `doctor` SET `name` = '$doctor', `location` = '$location', `age` = '$age', `exp` = '$exp', `phno` = '$phone', `email` = '$email', `type` = '$type', `image` = '$img' WHERE `doctor`.`code` = '$code'";
    $update = mysqli_query($conn, $sqlu);
    if ($update) {
        echo '<div class="alert alert-success my-3" role="alert">
  <h4 class="alert-heading">Success!</h4>
  <p>RECORD UPDATED SUCCESSFULLY.</p>
  <hr>
  <p class="mb-0">Click <a href="./dochome.php">here</a> to go to home page</p>
</div>';
    } 
    else {
        echo '<div class="alert alert-danger my-3" role="alert">
        <h4 class="alert-heading">Error!</h4>
        <p>Can\'t Update the record.</p>
        <hr>
        <p class="mb-0">' . mysqli_error($conn) . '</p>
      </div>';
    }
}
