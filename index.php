<?php
session_start();
ob_start();
if (isset($_SESSION['maquyen']) && ($_SESSION['maquyen']) == "1") {
    define('ADMIN_PATH', __DIR__ . '/View/admin/');
    if (isset($_SESSION['slide_admin'])) {
        switch ($_SESSION['slide_admin']) {
            case 0:
                $dashboard_admin_path = ADMIN_PATH . 'pages/dashboard/index.php';
                break;
            case 1:
                $dashboard_admin_path = ADMIN_PATH . 'pages/products/index.php';
                break;
        }
    }
    include $dashboard_admin_path;
} else {
    define('CLIENT_PATH', __DIR__ . '/View/client/');
    define('CSS_PATH', __DIR__ . '/public/css/');
    define('MODEL_PATH', __DIR__ . '/Model/');
    $htmlFilePath = CLIENT_PATH . 'pages/products/index.php';
    include $htmlFilePath;
}
