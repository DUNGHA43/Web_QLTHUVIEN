<?php
define('CLIENT_PATH', __DIR__ . '/View/client/');
define('ADMIN_PATH', __DIR__ . 'View/admin/');
define('CSS_PATH', __DIR__ . '/public/css/');
define('MODEL_PATH', __DIR__ . '/Model/');
$htmlFilePath = CLIENT_PATH . 'pages/products/index.php';
include $htmlFilePath;
?>