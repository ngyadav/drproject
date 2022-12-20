<?php
$cn=mysqli_connect("localhost","root","","drdb") or die("Could not Connect My Sql");
$regno=$_POST["regno"];
$output_dir = "patientimg/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
	$ImageType      = $_FILES['image']['type'][0];
 
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt       = str_replace('.','',$ImageExt);
	$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;
	
	/* Try to create the directory if it does not exist */
	if (!file_exists($output_dir))
	{
		@mkdir($output_dir, 0777);
	}               
	move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );
	     $sqlim = "UPDATE `patient_details` SET `image` = '$NewImageName' WHERE `patient_details`.`app_no` = $regno" ;
		 $upi = mysqli_query($cn, $sqlim);
		 if ($upi) {
			echo '<div class="alert alert-success my-3" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>IMAGE UPLOADED SUCCESSFULLY.</p>
  <hr>
  <p class="mb-0">Click <a href="./home.php">here</a> to go to home page</p>
</div>';
		} 
	// 	else {
	// 	echo "Error: " . $sql . "" . mysqli_error($cn);
	//  }
	 	else {
        echo '<div class="alert alert-danger my-3" role="alert">
        <h4 class="alert-heading">Error!</h4>
        <p>Can\'t upload.</p>
        <hr>
        <p class="mb-0">' . mysqli_error($cn) . '</p>
      </div>';
    }

?>