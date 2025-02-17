<?php
// Part of uPG
// Thanks to bootswatch for the bootstrap themes
// thanks to parsedown for the markdown parser

echo '<html>
<head>
<script src="depends/bootstrap.bundle.min.js"></script>';
require_once("depends/Parsedown.php");

if (!file_exists('config.php')) {
    echo 'UPG: Missing config.php, did you forget to rename config-sample.php?';
    exit;
}

require_once("config.php");

if (!defined("UPG_NAME")) {
    echo "UPG: Missing site name, set in config.php";
    exit;
}

if (!defined("UPG_ICON")) {
    define("UPG_ICON", "None");
}

if (UPG_ICON !== "None") {
    echo "<link rel='icon' href='" . UPG_ICON . "'>";
}

if (!file_exists('themes/' . UPG_THEME . '.css')) {
    echo "UPG: Missing theme, find available themes in themes/";
    exit;
} else {
    echo '<link rel="stylesheet" href="themes/' . UPG_THEME . '.css">';
}

if (!defined("UPG_BAR")) {
    define("UPG_BAR", true);
}

function upgParse($file) {
    $file = "pages/" . $file;
    $Parsedown = new Parsedown();
    $text = file_get_contents($file);
    $Parsedown->setSafeMode(true);
    echo $Parsedown->text($text);
}

echo '</head>';
echo '<body>';

if (UPG_BAR == true) {
    echo '
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">' . UPG_NAME . '</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
';

    $pages = array_diff(scandir('pages/'), array('.', '..'));
    foreach ($pages as $page) {
        echo '
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=' . $page . '">' . pathinfo($page, PATHINFO_FILENAME) . '</a>
        </li>
';
    }

    echo '
      </ul>
    </div>
  </div>
</nav>
';
}

$page = $_GET['page'] ?? 'default.md';

if (!file_exists('pages/' . $page)) {
    echo "UPG: Missing pages/" . $page;
    exit;
}

upgParse($page);

echo '</body>';
echo '</html>';
