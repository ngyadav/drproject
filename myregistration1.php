<?php
    include 'conndb.php';
    session_start();
    $userid=$_SESSION["userid"];
    $allapn="SELECT * FROM `application` WHERE `userid` = '$userid' ORDER BY `datetime` DESC";
    $apn=mysqli_query($conn,$allapn);
    $nor=mysqli_num_rows($apn);
    if ($nor>0) {
        while($row=mysqli_fetch_assoc($apn))
        {
          echo '<div class="card border-info my-3">
  <div class="card-body">
    <h5 class="card-title">Registration no : '.$row["app_no"].'</h5>
    <p class="card-text">Name:'. $row["fname"] .'</p>
    <p class="card-text">Doctor:'. $row["Doctor"] .'</p>
    <p class="card-text">Doctor ID: '. $row["doctorcode"] .'</p>
    <p class="card-text"><strong>Status:'. $row["satus"] .'</strong></p>
    <p class="card-text"><strong>Feedback:'. $row["feedback"] .'</strong></p>

    <a href="./shownewreg.php"><button type="button" class="read_more_btn">Veiw Details</button></a>
  </div>
  </div>';
        }
    }
    else {
        echo '<div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">Oops!</h4>
  <p>No registrations has been applied from your side.</p>
  <hr>
  <p class="mb-0">Click <a href="apply.php">here</a> to apply new registration.</p>
</div>';
    }
?>