<?php
session_start();
if ($_SESSION['id'] == NULL) {
    header('Location: /?act=login');
    exit();
}

use Models\Model_book;

$bookModel = new Model_book();

$books = $bookModel->viewBook();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/assets/js/scripts.js"></script>

</head>

<body class="grid grid-cols-6 relative">
    <div class="absolute w-screen flex justify-end p-5">
        <form action="/?act=profile" method="post">
                <div class="bg-blue-300 w-10 h-10 rounded-full flex items-center justify-center">
                    <input name="idmember" type="text" value="<?= $_SESSION['id']; ?>" hidden>
                    <button type="submit" name="submit"><?= strtoupper($_SESSION['username'][0]); ?></button>
                </div>
        </form>
    </div>
    <?php if (empty($books)) : ?>
        <div class="flex flex h-screen w-screen items-center justify-center">
            <b>Tidak ada buku yang tersedia saat ini. Aku selalu ada untukmu kok! 😳</b>
        </div>
    <?php else : ?>
        <?php foreach ($books as $book) : ?>
            <form action="/?act=pinjam" method="post">
                <div class="flex p-5 m-5 flex flex-col">
                    <img class="w-40 h-140 rounded-lg" src="<?= $book['cover']; ?>" alt="cover">
                    <b><?= $book['judul']; ?></b>
                    <input name="idbuku" type="text" value="<?= $book['idbuku']; ?>" hidden>
                    <p><?= $book['penulis']; ?></p>
                    <input name="idmember" type="text" value="<?= $_SESSION["id"]; ?>" hidden>
                    <button class="w-40 bg-blue-500 text-white p-2 rounded-lg"><b>Borrow</b></button>
                </div>
            </form>
        <?php endforeach; ?>
    <?php endif; ?>

</body>

</html>