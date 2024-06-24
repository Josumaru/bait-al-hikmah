<?php

namespace Models;

use Libraries\Database;

class Model_book
{
    private $databaseHandler;

    public function __construct()
    {
        $db = new Database();
        $this->databaseHandler = $db->getInstance();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function addBook($title, $author)
    {
        try {
            $rs = $this->databaseHandler->prepare("INSERT INTO buku (title, author) VALUES (?, ?)");
            $rs->execute([$title, $author]);
            return true;
        } catch (\PDOException $e) {
            // Handle database error
            return false;
        }
    }

    public function deleteBook($bookId)
    {
        try {
            $rs = $this->databaseHandler->prepare("DELETE FROM buku WHERE idbuku = ?");
            $rs->execute([$bookId]);
            return true;
        } catch (\PDOException $e) {
            // Handle database error
            return false;
        }
    }

    public function viewBook()
    {
        try {
            $rs = $this->databaseHandler->prepare("SELECT * FROM buku");
            $rs->execute();
            return $rs->fetchAll();
        } catch (\PDOException $e) {
            // Handle database error
            return null;
        }
    }
}
