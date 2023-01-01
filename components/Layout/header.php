<?php define('ROOT_PATH', dirname(__DIR__) . '/'); ?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <title><?= $title; ?></title>
</head>

<body>

    <div class="flex">
        <?php include_once(ROOT_PATH . 'SideBar/index.php') ?>
        <div class="flex-1 bg-gray-50">
            <?php include_once(ROOT_PATH . 'NavBar/index.php') ?>