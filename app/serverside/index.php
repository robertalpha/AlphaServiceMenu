<?php

$whitelist = array(
	"transmission-daemon",
	"monitorix",
	"fail2ban"
	);
$platform = "init.d";

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
