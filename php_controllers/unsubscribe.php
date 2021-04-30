<?php
	require 'connection_db.php';

	if(isset($_GET['email'])){
		$email_id = $_GET['email'];
		$is_sub = 0;

		$query = "UPDATE `visitors_email` SET is_subscribed = '".$is_sub."' WHERE email='".$email_id."' ";

		if($unsubscribe= mysqli_query($con,$query)){
			echo "Unsubscribed from the XKCD";
		}
		else{
		    echo "Error";
		}
	}
?>