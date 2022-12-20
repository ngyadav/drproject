<?php
$conn=mysqli_connect("localhost","root","","drdb");
if(!$conn)
{
    die ("Can't connect to database because ". mysqli_connect_error());
}

?>