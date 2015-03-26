<?php

// host(s) running AlphaServiceMenu
$hosts = array();
$hosts["kum"] = "http://kum.nu/menu";
$hosts["amilo"] = "http://kum.nu/amilo/menu";


// daemon management platform, currently supported: "init.d" , "systemctl"
$platform = "systemctl";

// only these services will be shown, in the order as listed:
$servicelist = array(
	"plex",
	"transmission",
	"flitsdex",
	"motionweb",
	"sickbeard",
	"sabnzbd",
	"teamspeak",
	"icinga",
	"murmur",
	"btsync",
	"nzbmegasearch",
	"monitorix",
	"jboss",
	"owncloud"
	);

// array containing service definitions
$services = array();

// Predefined service definitions, customize to your needs
$services["plex"] = array();
$services["plex"]["url"] = "/web";
$services["plex"]["title"] = "Plex";
$services["plex"]["host"] = "kum";
$services["plex"]["service"] = "plexmediaserver";

$services["transmission"] = array();
$services["transmission"]["url"] = "/transmission";
$services["transmission"]["title"] = "Transmission";
$services["transmission"]["host"] = "kum";
$services["transmission"]["service"] = "transmission";

$services["motionweb"] = array();
$services["motionweb"]["url"] = "/amilo/angular/";
$services["motionweb"]["title"] = "MotionWeb";
$services["motionweb"]["host"] = "amilo";
$services["motionweb"]["service"] = "httpd";

$services["sickbeard"] = array();
$services["sickbeard"]["url"] = "/sickbeard";
$services["sickbeard"]["title"] = "Sickbeard";
$services["sickbeard"]["host"] = "kum";
$services["sickbeard"]["service"] = "sickbeard";

$services["sabnzbd"] = array();
$services["sabnzbd"]["url"] = "/sabnzbd/";
$services["sabnzbd"]["title"] = "Sabnzbd";
$services["sabnzbd"]["host"] = "kum";
$services["sabnzbd"]["service"] = "sabnzbd";

$services["teamspeak"] = array();
$services["teamspeak"]["url"] = "http://www.tsviewer.com/index.php?page=ts_viewer&ID=972489";
$services["teamspeak"]["title"] = "Icinga";
$services["teamspeak"]["host"] = "kum";
$services["teamspeak"]["service"] = "teamspeak3-server";

$services["icinga"] = array();
$services["icinga"]["url"] = "/icinga-web/";
$services["icinga"]["title"] = "Icinga";
$services["icinga"]["host"] = "kum";
$services["icinga"]["service"] = "httpd";

$services["murmur"] = array();
$services["murmur"]["url"] = "#";
$services["murmur"]["title"] = "Murmur";
$services["murmur"]["host"] = "kum";
$services["murmur"]["service"] = "murmur";

$services["btsync"] = array();
$services["btsync"]["url"] = "http://kum.nu:8888/";
$services["btsync"]["title"] = "Bittorrent Sync";
$services["btsync"]["host"] = "kum";
$services["btsync"]["service"] = "btsync";

$services["nzbmegasearch"] = array();
$services["nzbmegasearch"]["url"] = "/nzbmegasearch";
$services["nzbmegasearch"]["title"] = "NZBMegaSearch";
$services["nzbmegasearch"]["host"] = "kum";
$services["nzbmegasearch"]["service"] = "nzbmegasearch";

$services["monitorix"] = array();
$services["monitorix"]["url"] = "/monitorix/cgi/monitorix.cgi?mode=localhost&graph=all&when=3week&color=black";
$services["monitorix"]["title"] = "Monitorix";
$services["monitorix"]["host"] = "kum";
$services["monitorix"]["service"] = "httpd";

$services["jboss"] = array();
$services["jboss"]["url"] = "http://kum.nu:9990/";
$services["jboss"]["title"] = "JBoss Application Server";
$services["jboss"]["host"] = "kum";
$services["jboss"]["service"] = "jboss-as";

$services["flitsdex"] = array();
$services["flitsdex"]["url"] = "/flits";
$services["flitsdex"]["title"] = "FlitsDex";
$services["flitsdex"]["host"] = "kum";
$services["flitsdex"]["service"] = "httpd";

$services["owncloud"] = array();
$services["owncloud"]["url"] = "/owncloud";
$services["owncloud"]["title"] = "Owncloud";
$services["owncloud"]["host"] = "kum";
$services["owncloud"]["service"] = "httpd";

?>