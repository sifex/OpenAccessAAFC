<?php 

	// CadetOne - Open Access Script

	// Copyright (C) 304 Squadron | Australian Air Force Cadets 2016
	// Script made by http://design5.co

	/* ---------------------- */

	/*

		This file acts as the redirect to the CadetOne Login

		1)	Set your squadron variable under the $siteid
			Make sure it has no spaces, and looks something like the eg.

			Eg.	
				$site = '304sqn';

		2)	Upload "OpenAccess.php" to your website, and make your Login link go to "/OpenAccess.php"

			"OpenAccess.php" does the following
				> Generates a link to Cadet One with a SQN and Session ID sent with it.
				> Forwards the user on to the login page 
	*/

    /* ---------------- */
    
    $siteid = '304sqn';

	/* ---------------- */



	session_start();

    $openURL = 'https://cadetone.aafc.org.au/openaccess/server-createsession.php';


    // Generate sessionid function
    function _genpassword($length){  

		srand((double)microtime()*1000000);  

		$vowels = array("a", "e", "i", "o", "u");  
		$cons = array("b", "c", "d", "g", "h", "j", "k", "l", "m", "n", "p", "r", "s", "t", "u", "v", "w", "tr",  
		"cr", "br", "fr", "th", "dr", "ch", "ph", "wr", "st", "sp", "sw", "pr", "sl", "cl"); 

		$num_vowels = count($vowels);  
		$num_cons = count($cons);  
		$password = null;
		for($i = 0; $i < $length; $i++){  
			$password .= $cons[rand(0, $num_cons - 1)] . $vowels[rand(0, $num_vowels - 1)];  
	    }  
	      
	    return substr($password, 0, $length);  
	}
    
	// Generate session ID
	$sessionid = _genpassword(10);
	$_SESSION["HectorSessionID"] = $sessionid;
	

	// Generate link text
	// Forward the user on to the login page
	header('Location:' . $openURL . "?siteid=" . $siteid . "&sessionid=" . $sessionid);
	
	
	/*
	 *	When the user returns, they'll be directed to "xxxsqn.aafc.org.au/processOpenAccess.php"
	 */

?>