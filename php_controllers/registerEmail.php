<?php
	require 'connection_db.php';

	if(isset($_POST['register'])){
		$is_veri = 0;
		$is_sub = 0;
		$query_register  = "INSERT INTO `visitors_email` (email,is_verified,is_subscribed) VALUES ('".$_POST['email']."','".$is_veri."','".$is_sub."')";

		if($email_registerd = mysqli_query($con,$query_register))
        {
            echo "You Had recived One verification Link to Your Email, Please verified the email to Get the FUNNY XKCD Images";

            $msg = "<html><head></head><body>";
            $msg .= "<a href='abc.html'><h1>Verify Email : </h1></a>";
            $msg.= "</body></html>";
            $subject_mail = "Verify Email - XKCD Images";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $to = "hitkumar.bhalodia105373@marwadiuniversity.ac.in";
            // More headers
            $headers .= 'From: <noreply@XKCD.in>' . "\r\n";
            if(mail($to,$subject_mail,$msg,$headers)){
            	echo "<br>Done";
            }
            else{
            	echo "<script>alert('Email Failed')</script>";
            }
        }
        else{
        	echo "Email Already Registerd";
        }
	}
?>