<?php
echo '<html>
<head>
<script src="depends/bootstrap.bundle.min.js></script>"';
require_once("depends/Parsedown.php");
if (!file_exists('config.php')){
    echo 'UPG: Missing config.php, did you forgot to rename config-sample.php?';
    exit;
}
require_once("config.php");
if (!defined(UPG_ICON)) { 
    define("UPG_ICON", "None");
}
if (!defined(UPG_NAME)) {
    echo "UPG: Missing Site name, set in config.php";
    exit;
}
if (UPG_ICON !== "None") {
    echo "<link rel='icon' href='". UPG_ICON."'>";
}
if (!isset($_GET['site'])){
    
}