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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>

<body class="flex">
    <div class="border-r bg-gray-50 dark:bg-gray-900 w-1/3 h-screen">
        <form class="space-y-4 md:space-y-6 p-5" method="POST" action="/?act=add">
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="title" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="mail@mail.com" required="">
            </div>
            <div>
                <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                <input type="author" name="author" id="author" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Doraemon" required="">
            </div>
            <div>
                <label for="cover" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover</label>
                <input type="cover" name="cover" id="cover" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://example.com" required="">
            </div>
            <button type="submit" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save</button>
        </form>
    </div>
    <div class="border-r w-1/3 h-screen overflow-scroll grid grid-cols-2">
        <?php if (empty($books)) : ?>
            <div class="flex flex h-screen w-screen items-center justify-center">
                <b>Tidak ada buku yang tersedia saat ini. Aku selalu ada untukmu kok! 😳</b>
            </div>
        <?php else : ?>
            <?php foreach ($books as $book) : ?>
                <div class="flex p-5 m-5 flex flex-col">
                    <img class="w-40 h-140 rounded-lg" src="<?= $book['cover']; ?>" alt="cover">
                    <b><?= $book['judul']; ?></b>
                    <p><?= $book['penulis']; ?></p>
                    <form action="/?act=edit" method="post">
                        <button class="w-40 bg-green-500 my-2 text-white p-2 rounded-lg"><b>Edit</b></button>
                        <input name="idbuku" type="text" value="<?= $book['idbuku']; ?>" hidden>
                    </form>
                    <form action="/?act=delete" method="post">
                        <button class="w-40 bg-red-500 text-white p-2 rounded-lg"><b>Delete</b></button>
                        <input name="idbuku" type="text" value="<?= $book['idbuku']; ?>" hidden>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>

</html>