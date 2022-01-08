<?php
namespace Wildfire;

$dash = new Core\Dash();
$admin = new Admin;
$theme = new Core\Theme();
$auth = new Auth();

$types = $dash->getTypes();
$menus = $dash->getMenus();
$currentUser = $auth->getCurrentUser();

if (!defined('ADMIN_THEME')) {
    define('ADMIN_THEME', __DIR__);
}

if (!$currentUser['wildfire_dashboard_access'] && $slug!='uploader') {
    header('Location: /user/login');
    die();
} else if(isset($_GET['type'])) {
    $type = $dash->do_unslugify($_GET['type']);
}