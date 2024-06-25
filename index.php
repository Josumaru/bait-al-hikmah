<?php

require_once __DIR__ . '/vendor/autoload.php';

use Controllers\Book;
use Controllers\Member;

$memberController = new Member();
$bookController = new Book();


if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'dashboard':
            $memberController->dashboard();
            break;
        case 'login':
            $memberController->login();
            break;
        case 'register':
            $memberController->register();
            break;
        case 'pinjam':
            $bookController->pinjam();
            break;
        case 'profile':
            $bookController->showBorrow();
            break;
        case 'return':
            $bookController->kembalikan();
            break;
        case 'dashboard':
            $bookController->kembalikan();
            break;
        default:
            $memberController->index();
            break;
    }
} else {
    $memberController->index();
}
