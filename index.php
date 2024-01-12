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
            case 2:
                $dashboard_admin_path = ADMIN_PATH . 'pages/products/update_author.php';
                break;
            case 3:
                $dashboard_admin_path = ADMIN_PATH . 'pages/vendor/index.php';
                break;
            case 4:
                $dashboard_admin_path = ADMIN_PATH . 'pages/vendor/edit.php';
                break;
            case 5:
                $dashboard_admin_path = ADMIN_PATH . 'pages/document/index.php';
                break;
            case 6:
                $dashboard_admin_path = ADMIN_PATH . 'pages/document/update.php';
                break;
            case 7:
                $dashboard_admin_path = ADMIN_PATH . 'pages/category/index.php';
                break;
            case 8:
                $dashboard_admin_path = ADMIN_PATH . 'pages/category/edit.php';
                break;
            case 9:
                $dashboard_admin_path = ADMIN_PATH . 'pages/accounts/index.php';
                break;
        }
    }
    include $dashboard_admin_path;
}
else if (isset($_COOKIE['maquyen']) && ($_COOKIE['maquyen']) == "1") {
    define('ADMIN_PATH', __DIR__ . '/View/admin/');
    if (isset($_COOKIE['slide_admin'])) {
        switch ($_COOKIE['slide_admin']) {
            case 0:
                $dashboard_admin_path = ADMIN_PATH . 'pages/dashboard/index.php';
                break;
            case 1:
                $dashboard_admin_path = ADMIN_PATH . 'pages/products/index.php';
                break;
            case 2:
                 $dashboard_admin_path = ADMIN_PATH . 'pages/products/update_author.php';
                break;
        }
    }
    include $dashboard_admin_path;
}
else if (isset($_SESSION['maquyen']) && ($_SESSION['maquyen']) == "2") {
    define('CLIENT_PATH', __DIR__ . '/View/client/');
    define('CSS_PATH', __DIR__ . '/public/css/');
    define('MODEL_PATH', __DIR__ . '/Model/');
    if (isset($_SESSION['slide_client'])) {
        switch ($_SESSION['slide_client']) {
            case 0:
                $htmlFilePath = CLIENT_PATH . 'pages/products/index.php';
                break;
            case 1:
                $htmlFilePath = CLIENT_PATH . 'pages/products/thongtincanhan.php';
                break;
        }
    }
    include $htmlFilePath;
}
else if (isset($_COOKIE['maquyen']) && ($_COOKIE['maquyen']) == "2") {
    define('CLIENT_PATH', __DIR__ . '/View/client/');
    define('CSS_PATH', __DIR__ . '/public/css/');
    define('MODEL_PATH', __DIR__ . '/Model/');
    if (isset($_COOKIE['slide_client'])) {
        switch ($_COOKIE['slide_client']) {
            case 0:
                $htmlFilePath = CLIENT_PATH . 'pages/products/index.php';
                break;
            case 1:
                $htmlFilePath = CLIENT_PATH . 'pages/products/thongtincanhan.php';
                break;
        }
    }
    include $htmlFilePath;
}
 else {
    define('CSS_PATH', __DIR__ . '/public/css/');
    define('MODEL_PATH', __DIR__ . '/Model/');
    define('CLIENT_PATH', __DIR__ . '/View/client/');
    $htmlFilePath = CLIENT_PATH . 'pages/products/index.php';
    include $htmlFilePath;
}
