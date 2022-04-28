<?php
require_once('functions.php');
if (!isset($_SESSION['com_carsit_adm_email'])) {
    $view = 'login';
} else {
    if (isset($_GET['view'])) {
        $view = $_GET['view'];
    } else {
        $view = 'home';
    }
}
switch ($view) {
    case 'login':
        $content = 'login.php';
        break;
    case 'logout':
        $content = 'logout.php';
        break;
    case 'settings':
        $content = 'settings.php';
        break;
    case 'partner':
        $content = 'dbt_slider.php';
        break;
    case 'profile':
        $content = 'profile.php';
        break;
    case 'about_us':
    case 'about_DBA_PPA':
    case 'collaboration':
    case 'research_topics':
    case 'publications':
        $content = 'pages.php';
        break;
    default:
        $content = 'home.php';
}
?>