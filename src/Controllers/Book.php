<?php

namespace Controllers;

use Models\Model_member;

class Book
{
    private $book;

    public function __construct()
    {
        $this->book = new Model_member();
    }

    public function index()
    {
        require_once 'src/Views/index.php';
    }

    public function dashboard()
    {
        require_once 'src/Views/dashboard.php';
    }
    
    public function login()
    {
        require_once 'src/Views/login.php';
    }
    public function register()
    {
        require_once 'src/Views/register.php';
    }
}
