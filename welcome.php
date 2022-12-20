<?php
$user=$_SESSION["userid"];
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<h3>Welcome '. $user .':)</h3> 
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

?>