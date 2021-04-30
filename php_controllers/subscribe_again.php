<?php
	require 'connection_db.php';

	if(isset($_GET['email'])){
		$email_id = $_GET['email'];
		$is_sub = 1;

		$query = "UPDATE `visitors_email` SET is_subscribed = '".$is_sub."' WHERE email='".$email_id."' ";

		if($subscribe= mysqli_query($con,$query)){
			echo "Subscribed to XKCD!!You would Recive Images From Now.";
		}
		else{
			echo "Error";
		}
	}
?>