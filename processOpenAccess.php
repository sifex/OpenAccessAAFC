<?php 

	// CadetOne - Open Access Script

	// Copyright (C) 304 Squadron | Australian Air Force Cadets 2016
	// Script made by http://design5.co

	/*

		!!! This file needs to be located under the root directory of your AAFC Hosting (eg. 999sqn.aafc.org.au/processOpenAccess.php) !!!

		1) 	Change the location of the redirect to where you want the user to be directed
			Call the 'oALogin()' function on that redirected page and you should have all of the variables for the user available. (eg. $_SESSION['fnames'], $_SESSION['lname'], $_SESSION['rank'])
	*/

	session_start();
	$sessionid = $_SESSION["HectorSessionID"];
	
	header('Location: http://304squadron.org/headquarters?id=' . $sessionid);

?>