<?php
require("config.php");

// Checks if the requested service name is allowed and checks service status
if(isset($_GET["process"])){
  if(in_array($_GET['process'], $servicelist)){
    exec(sprintf(getCommand(),$services[$_GET["process"]]["service"]), $output, $return);
    $status = determineStatus($output);
    $result = Array($status, $output);
    echo json_encode($result);
    } else {
    echo "ILLEGAL ARGUMENT";
  }
} else if(isset($_GET["request"]) && $_GET['request']=="config"){
  echo formattedConfig($services,$servicelist,$hosts);
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

function formattedConfig($serviceconfigs,$servicenames,$hosts) {
  $result = array();
  $services = array();
  foreach ($servicenames as $key => $name) {
    if($serviceconfigs[$name]!=null){
      $row = array();
      $row["servicename"] = $name;
      $def = $serviceconfigs[$name];
      $row["url"] = $def["url"];
      $row["title"] = $def["title"];
      $row["host"] =  $def["host"];
      $services[]=$row;
    }
  }
  $result['services'] = $services;
  $result['hosts'] = $hosts;
  return json_encode($result);
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
