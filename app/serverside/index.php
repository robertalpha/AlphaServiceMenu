<?php

$platform = "init.d";
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
    exec(sprintf(getCommand(),$_GET["process"]), $output, $return);
    $status = determineStatus($output);
    $result = Array($status, $output);
    echo json_encode($result);
  } else {
    echo "ILLEGAL ARGUMENT";
  }
} else {
  echo "NO PROCESS ARGUMENT PROVIDED";
}

function determineStatus($output) {
  global $platform;
  switch($platform) {
    case "init.d":
      $lastLine = $output[count($output)-1];
      if (preg_match("/is running$/", $lastLine)) return "running";
      if (preg_match("/is not running$/", $lastLine)) return "not running";
      return "unknown";
    case "systemctl":
      if (strpos($output[2],"Active: active (running) since")===FALSE) return "not running";
      return "running";
  }
  return "unknown";
}

function getCommand() {
  global $platform;
  switch ($platform) {
    case "init.d":
      return "/etc/init.d/%s status";
    case "systemctl":
      return "systemctl status --output=json %s";
    default:
      return "";
  }
}
?>
