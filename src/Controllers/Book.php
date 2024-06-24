<?php

namespace Controllers;

use Models\Model_book;
use Models\Model_perpus;

class Book
{
    private $book;
    private $perpus;

    public function __construct()
    {
        $this->book = new Model_book();
        $this->perpus = new Model_perpus();
    }


    public function pinjam()
    {
        require_once 'src/Views/dashboard.php';
        $idMember =  $_GET['idMember'];
        $idBuku =  $_GET['idBuku'];
        echo $idBuku;
        echo $idMember;
        echo "asdadsadsa\n\n\n\asdsad";
        return $this->perpus->borrowBook($idMember, $idBuku);
        // if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // }
    }
}
