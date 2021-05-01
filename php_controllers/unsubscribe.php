<?php
	require 'connection_db.php';

	if(isset($_GET['email'])){
		$email_id = $_GET['email'];
		$is_sub = 0;

		$query = "UPDATE `visitors_email` SET is_subscribed = '".$is_sub."' WHERE email='".$email_id."' ";

		if($unsubscribe= mysqli_query($con,$query)){
			echo "Unsubscribed from the XKCD";
            $msg = "<html><head></head><body>";
            $msg .= "<a href='https://procit.ictmu.in/hit_rtCamp_xkcd/php_controllers/subscribe_again.php?email=".$email_id."'><h1>Subscribe Again</h1></a>";
            $msg.= "</body></html>";
            $subject_mail = "Unsubscribed - XKCD Images";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $to = $email_id;
            // More headers
            $headers .= 'From: <noreply@XKCD.in>' . "\r\n";
            if(!mail($to,$subject_mail,$msg,$headers)){
                echo "<script>alert('Email Failed')</script>";
            }
		}
		else{
		    echo "Error";
		}
	}
?>