<?php

namespace Models;

use Libraries\Database;

class Model_perpus
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
        // (Code remains the same for adding books)
    }

    public function deleteBook($bookId)
    {
        // (Code remains the same for deleting books)
    }

    public function viewBook()
    {
        // (Code remains the same for viewing books)
    }

    public function borrowBook($bookId, $userId)
    {
        try {
            $currentTime = date('Y-m-d H:i:s'); // Get current date and time
            $rs = $this->databaseHandler->prepare("INSERT INTO peminjaman (member_idmember, buku_idbuku, waktumeminjam) VALUES (?, ?, ?)");
            $rs->execute([$bookId, $userId, $currentTime]);
            return true;
        } catch (\PDOException $e) {
            // Handle database error
            return false;
        }
    }

    public function returnBook($borrowingId)
    {
        try {
            $currentTime = date('Y-m-d H:i:s'); // Get current date and time
            $rs = $this->databaseHandler->prepare("
                UPDATE peminjaman SET tgl_kembali = ?
                WHERE idpeminjaman = ?
            ");
            $rs->execute([$currentTime, $borrowingId]);
            return true;
        } catch (\PDOException $e) {
            // Handle database error
            return false;
        }
    }

    public function viewBorrowingHistory()
    {
        try {
            $rs = $this->databaseHandler->prepare("
                SELECT b.*, u.username FROM peminjaman p
                JOIN buku b ON p.idbuku = b.idbuku
                JOIN user u ON p.iduser = u.iduser
            ");
            $rs->execute();
            return $rs->fetchAll();
        } catch (\PDOException $e) {
            // Handle database error
            return null;
        }
    }
}