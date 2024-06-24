<?php

require_once __DIR__ . '/vendor/autoload.php';
use Controllers\Book;

$controller = new Book();


//tentukan bagaimana halaman akan di-load
if (!isset($_GET['act'])) {
    $controller->index();
    //pemanggilan method yang akan di-run
}
