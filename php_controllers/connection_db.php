<?php

	$mysql_host = 'localhost'; 

	$mysql_user = 'root'; 

	$DB_name = 'rtcamp';
	  
	$con =  mysqli_connect($mysql_host, $mysql_user);

	if (! ($con)) 
	{ 
	    die('Cannot connect to database'); 
	} 
	else
	{ 

	    if (!mysqli_select_db($con,$DB_name)) 
	    { 
	    	die('Cannot connect to database'); 
	    } 
	} 
?>