<?php

namespace Models;

use Libraries\Database;

class Model_member
{
    private $databaseHandler;
    public function __construct()
    {
        $db = new Database();
        $this->databaseHandler = $db->getInstance();
    }

    function addBook($title, $author)
    {
        $rs = $this->databaseHandler->prepare("INSERT INTO buku (judul,penulis) VALUES (?,?)");
        $rs->execute([$title, $author]);
    }
}
