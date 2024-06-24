<?php

use Controllers\Book;

require_once __DIR__ . '/vendor/autoload.php';
$controller = new Book;


//tentukan bagaimana halaman akan di-load
if (!isset($_GET['act'])) {
    //pemanggilan method yang akan di-run
    $controller->index();
}
