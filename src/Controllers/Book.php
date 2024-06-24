<?php
namespace Controllers;

use Models\Model_member;

class Book{
    private $book;
    public function __construct()
    {
        $this->book = new Model_member();
    }

    public function index()
    {
        require_once 'src/Views/index.php';
    }
}