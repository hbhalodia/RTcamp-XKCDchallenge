<?php
	require 'connection_db.php';

	if(isset($_GET['email'])){
		$email_id = $_GET['email'];
		$is_ver = 1;
		$is_sub = 1;

		$query = "UPDATE `visitors_email` SET is_verified='".$is_ver."' , is_subscribed = '".$is_sub."' WHERE email='".$email_id."' ";

		if($verify = mysqli_query($con,$query)){
			echo "<script type='text/javascript'>
                        window.location.replace(\"../html_page/verified_page.php\");
                    </script>
                ";
		}
		else{
		    echo "Error";
		}
	}
?>