<?php

$whitelist = array(
	"sabnzbd",
	"sickbeard",
	"httpd",
	"transmission",
	"teamspeak3-server",
	"plexmediaserver",
	"btsync",
	"nzbmegasearch",
	"murmur",
	"jboss-as"
	);

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