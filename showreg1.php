<?php
include 'conndb.php';
session_start();
$code = $_SESSION["code"];
$status="NA";
$sql="SELECT * FROM `application` WHERE `doctorcode` = '$code' AND `satus` = '$status' ORDER BY `datetime` ASC";
$app=mysqli_query($conn,$sql);
$nor=mysqli_num_rows($app);
if($nor>0)
{
    $row=mysqli_fetch_assoc($app);
    setcookie("appno",$row["app_no"],time()+86400,"/");
   // echo var_dump($row);
    $sql1="SELECT * FROM `patient_details` WHERE `app_no` =".$row['app_no'];
    $app1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($app1);
    echo "<br>";
    //echo var_dump($row1);
    echo '<h3><strong>Registration no : '.$row["app_no"].'</strong></h3>
                <br />
                <div class="container">
                  <p><strong>First name    : </strong><block>'.$row["fname"].'</block></p>
                  <p><strong>Last name     : </strong><block>'.$row["lname"].'</block></p>
                  <p><strong>Gaurdian name : </strong><block>'.$row["gname"].'</block></p>
                  <p><strong>Date of birth : </strong><block>'.$row["dob"].'</block></p>
                  <p><strong>Gender        : </strong><block>'.$row1["gender"].'</block></p>
                  <p><strong>Age           : </strong><block>'.$row1["age"].'</block></p>
                  <p><strong>MaritialStatus: </strong><block>'.$row1["mstatus"].'</block></p>
                  <p><strong>Address       : </strong><block>'.$row["address"].'</block></p>
                  <p><strong>Discription   : </strong><block>'.$row1["discription"].'</block></p>
                  <p><strong>Phone no.     : </strong><block>'. $row1["f_phno"] , $row1["alt_phno"].'</block></p>
                  <p><strong>Email         : </strong><block>'.$row1["email"].'</block></p>
                  <p><strong>Retinal Image : </strong><block>'.$row1["image"].'</block></p>
                  <img src="./patientimg/'.$row1["image"].'" class="d-block w-100" alt="..." height="500" width="500">
                  
                  <form action="changestatus.php" method="POST">

                  <div class="form-group"> <label for="form_message"><strong>Feedback : </strong></label>
                        <textarea id="form_message" name="feedback" class="form-control"
                          placeholder="Type Here" rows="4" ></textarea> </div>
                          
                    <div class="controls">
                      <div class="row">
                        <div class="col-md-12 my-3">
                        <div class="col-md-12 my-3">
                          <button
                            type="submit"
                            class="btn btn-outline-success btn-send pt-2 btn-block"
                            value="Updated"
                            name="status"
                          >
                            Update
                          </button>
                        </div>
                        <div class="col-md-12 my-3">
                          <button
                            type="submit"
                            class="btn btn-outline-danger btn-send pt-2 btn-block"
                            value="Rejected"
                            name="status"
                          >
                            Reject
                          </button>
                        </div>
                      </div>
                      <div class="col-md-12 my-3"><a href="./dochome.php">
                        <button type="button"
                          class="btn btn-outline-primary btn-send pt-2 btn-block"
                        >
                          go to home
                        </button></a
                      ></div>
                    </div>
                  </form>
                </div>';
}
else {
    echo '<h3><strong>Oops!</strong></h3>
    <br />
    <div class="container">
    <p>No new registrations</p>
    <br>
    <div class="col-md-12 my-3"><a href="./dochome.php">
                        <button type="button"
                          class="btn btn-outline-primary btn-send pt-2 btn-block">
                          go to home
                        </button></a
                      ></div>';
}