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

    public function addBook($title, $author)
    {
        $rs = $this->databaseHandler->prepare("INSERT INTO buku (judul, penulis) VALUES (?, ?)");
        $rs->execute([$title, $author]);
    }

    public function findBook($id)
    {
        $rs = $this->databaseHandler->prepare("SELECT * FROM buku WHERE id = ?");
        $rs->execute([$id]);
        return $rs->fetch();
    }

    public function updateBook($id, $title, $author)
    {
        $rs = $this->databaseHandler->prepare("UPDATE buku SET judul = ?, penulis = ? WHERE id = ?");
        $rs->execute([$title, $author, $id]);
    }

    public function deleteBook($id)
    {
        $rs = $this->databaseHandler->prepare("DELETE FROM buku WHERE id = ?");
        $rs->execute([$id]);
    }
}
