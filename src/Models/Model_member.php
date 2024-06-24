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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login($email, $password)
    {
        $rs = $this->databaseHandler->prepare("SELECT * FROM member WHERE email = ? AND password = ?");
        $rs->execute([$email, $password]);
        $user = $rs->fetchObject();
        
        if ($user) {
            // Simpan informasi pengguna dalam session
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            return true;
        } else {
            return false;
        }
    }

    public function register($email, $password, $username)
    {
        $rs = $this->databaseHandler->prepare("INSERT INTO member (username, email, password, role) VALUES(?, ?, ?, 'member')");
        $rs->execute([$username, $email, $password]);
        echo "
        <script language='JavaScript'>
        window.location.href = '/?act=login';
        </script>";
    }
    // public function addBook($title, $author)
    // {
    //     $rs = $this->databaseHandler->prepare("INSERT INTO buku (judul, penulis) VALUES (?, ?)");
    //     $rs->execute([$title, $author]);
    // }

    // public function findBook($id)
    // {
    //     $rs = $this->databaseHandler->prepare("SELECT * FROM buku WHERE id = ?");
    //     $rs->execute([$id]);
    //     return $rs->fetch();
    // }

    // public function updateBook($id, $title, $author)
    // {
    //     $rs = $this->databaseHandler->prepare("UPDATE buku SET judul = ?, penulis = ? WHERE id = ?");
    //     $rs->execute([$title, $author, $id]);
    // }

    // public function deleteBook($id)
    // {
    //     $rs = $this->databaseHandler->prepare("DELETE FROM buku WHERE id = ?");
    //     $rs->execute([$id]);
    // }
}
