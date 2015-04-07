<?php
	//this is the portal for infusionsoft campaign to communicate with, contactID, FirstName, LastName, Email, Password, Country, ZipCode, InfusionsoftEmail will be the post fields.
	//Written by Jifeng Sun at 30 July 2014
	//Modified by Jifeng Sun at 08 August 2014 for additional email address if the email that doesn't contain anything.
	//Modified by Jifeng Sun at 11 August 2014 for bug fixes on previous change.
	
	//firstly to determine the password is empty or not
	if (empty($_POST["Password"])){
		//no pre-defined password, randomly generate one.
		$Password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
	}
	else{
		//already existed pre-defined password, assign it to local variable
		$Password = $_POST["Password"];
	}
	//Determine the email address is empty, if empty, will use InfusionsoftEmail instead.
	if (empty($_POST["Email"])){
		//no pre-defined email, use InfusionsoftEmail instead
		$Email = $_POST["InfusionsoftEmail"];
	}
	else{
		//already existed email
		$Email = $_POST["Email"];
	}
	//Assign a default country short code for wrong country
	$Country = "AU";
	//Match Country from database to find out the short code. eg. Australia -> AU
	$db = mysql_connect('localhost', 'stylefin_user', 'magnus');
	mysql_select_db('stylefin_db', $db);
	$query_cnt = "SELECT `ccode`, `country` FROM `Countries` Order by `order`, `country`";
	$result_cnt = mysql_query($query_cnt, $db) or (error_handling(basename($_SERVER['PHP_SELF']).' - '.mysql_error().' - '.$query_cnt));
	while ($line_cnt = mysql_fetch_assoc($result_cnt)){
		if ($line_cnt["country"] == $_POST["Country"]){
			$Country = $line_cnt["ccode"];
			break;
		}
	}
	
	//Assign the rest post info to local variable
	
	$FirstName = $_POST["FirstName"];
	$LastName = $_POST["LastName"];
	$contactID = $_POST["contactID"];
	$ZipCode = $_POST["ZipCode"];
	
	//create user in database and lead the CreatePage info to step 1
	$query_rem = "INSERT INTO `Users` (`email`, `password`, `name`, `surname`, `CreatePage`, `InfusionSoftId`, `country`, `zip`) VALUES ('".mysql_real_escape_string($Email)."', '".mysql_real_escape_string($Password)."', '".mysql_real_escape_string($FirstName)."', '".mysql_real_escape_string($LastName)."', '1','".mysql_real_escape_string($contactID)."', '".mysql_real_escape_string($Country)."', '".mysql_real_escape_string($ZipCode)."')";
	mysql_query($query_rem, $db);
	
	//Send back info to infusionsoft
	require_once ('infusionsoft.php');
	CreateInfusionsoftUser($FirstName, $LastName, $Email, $Password, true);
?>