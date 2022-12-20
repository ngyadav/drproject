<?php
    include 'conndb.php';
    $slcths="SELECT * FROM `doctor`";
    $hstls=mysqli_query($conn,$slcths);
    if ($hstls) {
        while($row=mysqli_fetch_assoc($hstls))
        {
            echo '<div class="col">
            <div class="card h-100">
              <img src="./dradmin/doctorimg/'.$row["image"].'" class="card-img-top" alt="image" height="250" height="250">
              <div class="card-body">
                <h5 class="card-title">'.$row["name"].'</h5>
                <br>
                <div class="container">
                <p class="card-text">Location:<br>'.$row["location"].'</p>
                <hr>
              </div>
              <ul class="list-group list-group-flush mx-3">
              <li class="list-group-item">'. $row["type"].'</li>
                <li class="list-group-item">Age:'. $row["age"].'</li>
                <li class="list-group-item">Experience:'. $row["exp"].'</li>
                <li class="list-group-item">Doctor ID:'. $row["code"].'</li>
                <li class="list-group-item">Contact:'.$row["phno"].','.$row["email"].'</li>
              </ul>
              </div>
            </div>
          </div>';
        }
    }
?>