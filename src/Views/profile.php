<?php
session_start();
if ($_SESSION['id'] == NULL) {
    header('Location: /?act=login');
    exit();
}

use Models\Model_perpus;

$perpusModel = new Model_perpus();

$books = $perpusModel->showBorrow($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="grid grid-cols-6">
    <?php if (empty($books)) : ?>
        <div class="flex flex h-screen w-screen items-center justify-center">
            <b>Tidak ada buku yang tersedia saat ini. Aku selalu ada untukmu kok! 😳</b>
        </div>
    <?php else : ?>
        <?php foreach ($books as $book) : ?>
            <form action="/?act=return" method="post">
                <div class="flex p-5 m-5 flex flex-col">
                    <img class="w-40 h-140 rounded-lg" src="<?= $book['cover']; ?>" alt="cover">
                    <b><?= $book['judul']; ?></b>
                    <input name="idbuku" type="text" value="<?= $book['idbuku']; ?>" hidden>
                    <p><?= $book['penulis']; ?></p>
                    <input name="idmember" type="text" value="<?= $_SESSION["id"]; ?>" hidden>
                    <button class="w-40 bg-yellow-500 text-white p-2 rounded-lg"><b>Return</b></button>
                </div>
            </form>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>