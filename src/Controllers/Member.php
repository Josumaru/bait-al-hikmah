<?php

namespace Controllers;

use Models\Model_member;

class Member
{
    private $member;

    public function __construct()
    {
        $this->member = new Model_member();
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email =  $_POST['email'];
            $password = $_POST['password'];
            $this->member->login($email, $password);
        }
    }
    
    public function register()
    {
        
        require_once 'src/Views/register.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email =  $_POST['email'];
            $password = $_POST['password'];
            $this->member->register($username, $email, $password);
        }
    }
}



// if (isset($_POST['submit'])) {
    
// }
