<?php

// Reads allowed servicenames from servies.json
$json = file_get_contents("../sources/servies.json");
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

$whitelist = array();
foreach ($jsonIterator as $key => $val) {
    if(!is_array($val)) {
		if($key == "servicename"){
			$whitelist[] = $val;
		}    
	}
}

// Checks if the requested service name is allowed and checks service status
if(isset($_GET["process"])){
	if(in_array($_GET['process'], $whitelist)){
		exec("systemctl status --output=json ".$_GET["process"], $output, $return);
		echo json_encode($output);
	} else {
		echo "ILLEGAL ARGUMENT";
	}
} else {
	echo "NO PROCESS ARGUMENT PROVIDED";
}

?>