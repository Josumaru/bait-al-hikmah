<?php

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

<body class="grid grid-cols-6">
    <?php foreach ($books as $book) : ?>
        <div class="flex p-5 m-5 flex flex-col ">
            <img class="w-40 h-140 rounded-lg" src=<?= $book['cover']; ?> alt="asdasdas">
            <b><?= $book['judul']; ?></b>
            <p><?= $book['penulis']; ?></p>
            <div class="flex">
                <button class="bg-blue-500 text-white p-2 rounded-lg" onclick="pinjamBuku(<?= $book['idbuku']; ?>, <?= $_SESSION['id']; ?>)"><b>Pinjam</b></button>
                <button class="bg-yellow-500 text-white p-2 rounded-lg"><b>Pinjam</b></button>
            </div>
        </div>
    <?php endforeach; ?>
</body>

</html>