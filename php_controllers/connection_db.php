<?php

	$mysql_host = 'localhost'; 

	$mysql_user = 'ictmu6ya_hit_bha';  

	$DB_name = 'ictmu6ya_rtcamp_hit';
	
	$DB_pass = 'Hit**008';
	  
	$con =  mysqli_connect($mysql_host, $mysql_user, $DB_pass);

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