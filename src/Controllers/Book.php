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
        $idmember =  $_POST['idmember'];
        $idbuku =  $_POST['idbuku'];
        $this->perpus->borrowBook($idmember, $idbuku);
        echo "<script language='JavaScript'>
            window.location.href = '/';
            </script>";
    }

    public function showBorrow()
    {
        require_once 'src/Views/profile.php';
        $idmember =  $_POST['idmember'];
        $this->perpus->returnBook($idmember);
    }

    public function kembalikan()
    {
        $idmember =  $_POST['idmember'];
        $idbuku =  $_POST['idbuku'];
        $this->perpus->deleteBorrow($idbuku);
        $this->perpus->addPengembalian($idbuku, $idmember);
        echo "<script language='JavaScript'>
            window.location.href = '/?act=profile';
            </script>";

    }
}
