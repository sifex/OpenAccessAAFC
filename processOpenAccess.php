<?php 

	// CadetOne - Open Access Script

	// Copyright (C) 304 Squadron | Australian Air Force Cadets 2016
	// Script made by http://design5.co



	/* 
	 * 	File needs to be located in the root directory on AAFC Hosting (eg. 000sqn.aafc.org.au)
	 */

	session_start();
	$sessionid = $_SESSION["HectorSessionID"];
	
	if($_SERVER['REMOTE_ADDR'] == '1124.188.96.14') {
		header('Location: http://hq.304squadron.org/logon/');
	} else {
		header('Location: http://304squadron.org/headquarters?id=' . $sessionid);
	}
?>