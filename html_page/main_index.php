<!DOCTYPE html>
<html>
<head>
	<title>XKCD-Random Images</title>
	<style type="text/css">
		.parent{
			align-content: center;
			margin-top: 20%;
			margin-left: auto;
			margin-right: auto;
			width: 60%;
			
		}

		body{
			background-image: url('../images/background.png');
	  		background-repeat: no-repeat;
	  		background-attachment: fixed;
	  		background-size: cover;
		}
		input{
			padding: 2%;
			font-size: 100%;
			color: #5c13d1;
			background-color: #34ebb4;
			border-radius: 2%;
		}
		p{
			color: red;
			text-align: center;
		}
	</style>
</head>
<body onload="return isValueorNot();">
	<div class="parent">
		<form action="../php_controllers/registerEmail.php" method="post">
			<div>
				<input type="email" autocomplete="off" onfocus="return isValueorNot();" onkeyup="return isValidEmail('Email is Invalid');" size="80" placeholder="Enter Email" id="validateEmail" name="email">
				<input type="submit" id="register" name="register" value="Register Email">
			</div><br>
		</form>
	</div>
	<p id="error" ></p>
	<script type="text/javascript" src="../js_files/email_validation.js"></script>


</body>
</html>