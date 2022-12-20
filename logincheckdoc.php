<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include 'conndb.php';
    $uname=$_POST["username"];
    $pass=$_POST["password"];
    $search="SELECT * FROM `doctor` WHERE `userid`='$uname' AND `password`='$pass'";
    $login=mysqli_query($conn,$search);
    $nor=mysqli_num_rows($login);
    if($nor==1)
    {
        $row=mysqli_fetch_assoc($login);
        //echo var_dump($row);
        $code=$row["code"];
        session_start();
        $_SESSION["loggedin"]="sup";
        $_SESSION["userid"]=$uname;
        $_SESSION["password"]=$pass;
        $_SESSION["code"]=$code;
        header("location: dochome.php");
    }
    else{
        echo '<div class="signup-link">ERROR! Username and password does not match.</div>';
    }

}


?>