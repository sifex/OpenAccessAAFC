<?php 

	// Open Access Functions

	// CadetOne - Open Access Functions Script

	// Copyright (C) 304 Squadron | Australian Air Force Cadets 2016
	// Script made by http://design5.co

	/* ---------------- */
    
    $siteid = '304sqn';

	/* ---------------- */

	function oALogin() {
		if(!isset($_SESSION['all'])) {
			if(isset($_GET['id'])) {
				if(oA($_GET['id'])) {
					$fd = $_SESSION['fd'];
					$emaildom ='@aafc.org.au';
					$_SESSION['fnames']=$fd[0]; // seperate values from hector into individual variables.
					$_SESSION['lname']=$fd[1];
					$_SESSION['rank']=$fd[2];
					$_SESSION['role']=$fd[3];
					$_SESSION['unit']=$fd[4];
					$_SESSION['useremail']=$fd[5];
					$_SESSION['useremail'].=$emaildom;
					$_SESSION['servicenumber']=$fd[6];
					$_SESSION['appointments'] = array();
					if(isset($fd[8])) {
						$_SESSION['appointments'][0] = $fd[8];
					}
					if(isset($fd[9])) {
						$_SESSION['appointments'][1] = $fd[9];
					}
					if(isset($fd[10])) {
						$_SESSION['appointments'][2] = $fd[10];
					}
					$_SESSION['all']=$fd;


					return true;
				} else {
					echo "oALogin disfunction";
				}
			}

		}
	}

	function oA($id = 0) {

	    global $user; $sessionid = $id; $callbackURL = 'https://cadetone.aafc.org.au/openaccess/server-getdetails.php'; $localunits = array('Staff', 'Cadet'); $open_url = $callbackURL . "?siteid=$siteid&sessionid=$sessionid"; $ch = curl_init($open_url); curl_setopt($ch, CURLOPT_USERAGENT, "Drupal-OpenAccess"); curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); curl_setopt($ch, CURLOPT_HEADER, FALSE); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); $fd = curl_exec($ch); $fd = explode("\n",$fd); $curlerr= curl_errno($ch); $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); if ($curlerr != 0 && $status_code != 200) {echo 'Curl Error'; return false; } else {$_SESSION['fd'] = $fd; return $fd; } 
	}

	function oALogout() {
		unset($_SESSION['fnames']); // seperate values from hector into individual variables.
		unset($_SESSION['lname']);
		unset($_SESSION['rank']);
		unset($_SESSION['role']);
		unset($_SESSION['unit']);
		unset($_SESSION['useremail']);
		unset($_SESSION['servicenumber']);
		unset($_SESSION['appointments']);
		unset($_SESSION['all']);
	}

	function rankImage() {
		switch($_SESSION['rank']) {
			case "Cadet":
			$rankNumber = '10';
			break;
			case "Leading Cadet":
			$rankNumber = '20';
			break;
			case "Cadet Corporal":
			$rankNumber = '30';
			break;
			case "Cadet Sergeant":
			$rankNumber = '40';
			break;
			case "Cadet Flight Sergeant":
			$rankNumber = '50';
			break;
			case "Cadet Warrant Officer":
			$rankNumber = '60';
			break;
			case "Cadet Under Officer":
			$rankNumber = '70';
			break;
			default:
			$rankNumber = '';
			break;
		}
	    
	    return array('img' => "http://cadetone.aafc.org.au/images/" . $rankNumber . ".jpg", 'number' => $rankNumber);
	    
	}

	function appointments($num = 2) {
		if(isset($_SESSION['appointments'])) {
			foreach($_SESSION['appointments'] as $point) {
				$appointment = explode(',', $point);
				if(isset($appointment[$num])) {
					$final[] = trim($appointment[$num], '"');
				}
			}

		return $final;

		}
	}
?>