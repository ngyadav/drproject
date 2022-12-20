<?php
if (isset($_POST["submit"])) {
    session_start();
    include 'conndb.php';
    $code = $_SESSION["code"];
    $age = $_POST["age"];
    $exp = $_POST["exp"];
    //$sql = "INSERT INTO `doctor` (`name`, `code`, `location`, `age`, `exp`, `warden`, `phno`, `email`, `type`, `image`) VALUES ('$doctor', '$code', '$location', '$age', '$exp', '$warden', '$phone', '$email', '$type', '$img')";
    $sqlu="UPDATE `doctor` SET `age` = '$age', `exp` = '$exp' WHERE `doctor`.`code` = '$code'";
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
