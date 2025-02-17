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
if (!file_exists('themes/'. UPG_THEME .'.css')) {
    echo "UPG: Missing theme, find available themes in themes/";
    exit;
} else {
    echo '<link rel="stylesheet" href="themes/'. UPG_THEME .'.css">';
}
if (!isset($_GET['site'])){
    echo '</head>';
    if (!file_exists('pages/default.md')) {
        echo 'UPG: Missing pages/default.php, Missing "site" variable in GET';
        exit;
    }
    echo '<body>';
    upgParse('pages/default.md');
    echo '</body>';
} else {
    echo '</head>';
    if (!file_exists($_GET['site'])){
        echo "UPG: Missing ". $_GET['site'];
        exit;
    }
    echo '<body>';
    upgParse($_GET['site']);
    echo '</body>';
}
