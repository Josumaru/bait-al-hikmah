<?php

require_once __DIR__ . '/vendor/autoload.php';

use Controllers\Book;

$controller = new Book();


if (isset($_GET['act'])) {
    echo "Hello";

    switch ($_GET['act']) {
        case 'dashboard':
            $controller->dashboard();
            break;
        case 'login':
            $controller->login();
            break;
        case 'register':
            $controller->register();
            break;
        default:
            $controller->index();
            break;
    }
} else {
    $controller->index();
}
