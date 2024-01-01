<?php
session_start();
ob_start();
if (isset($_SESSION['maquyen']) && ($_SESSION['maquyen']) == "1") {
    define('ADMIN_PATH', __DIR__ . '/View/admin/');;
    $dashboard_admin_path = ADMIN_PATH . 'pages/products/index.php';
    include $dashboard_admin_path;
    $dashboard_admin_Image = ADMIN_PATH_Image . '/config/process-form.php';
    include $dashboard_admin_Image;
} else {
    define('CLIENT_PATH', __DIR__ . '/View/client/');
    define('CSS_PATH', __DIR__ . '/public/css/');
    define('MODEL_PATH', __DIR__ . '/Model/');
    $htmlFilePath = CLIENT_PATH . 'pages/products/index.php';
    include $htmlFilePath;
}
