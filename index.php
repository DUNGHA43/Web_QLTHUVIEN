<?php
define('CLIENT_PATH', __DIR__ . '/View/client/');
define('ADMIN_PATH', __DIR__ . '/View/admin/');
define('CSS_PATH', __DIR__ . '/public/css/');
$htmlFilePath = CLIENT_PATH . 'pages/products/index.php';
$dashboard_admin_path = ADMIN_PATH . "pages/dashboard/index.php";
// include $htmlFilePath;
include $dashboard_admin_path;

