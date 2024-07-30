<?php

?>

<!doctype html>
<html lang="en">
<head>

    <script src="https://cdn.tailwindcss.com"></script>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?=$title?></title>
</head>
<body class="bg-gradient-to-r from-gray-300 via-gray-400 to-gray-300">

<div class="container mx-auto h-auto">
    <div class="pt-12 pb-6">
        <?php if(isset($errorMessage)) {
            ?>
            <h2 class="text-4xl text-red-600 text-center"><?=$errorMessage?></h2>
            <?php
        }
        ?>
        <div class="text-center px-3">
            <h1 class="my-4 text-2xl md:text-3xl lg:text-5xl">
                Guitar Tabs
            </h1>
            <p class="leading-normal text-gray-800 text-base md:text-xl lg:text-2xl mb-8">
                Everything I need in one handy spot
            </p>
            <?php
            if(isset($_SESSION["id"]) && $_SESSION["id"] === session_id()) {
                if(!isset($_GET["login"])) {
                    ?>
                    <a href="?logout">
                        <button class="mx-auto lg:mx-0 hover:underline text-gray-800 font-extrabold rounded my-2 py-4 px-8 shadow-lg w-[25%] bg-white bg-opacity-50">
                            Log Out
                        </button>
                    </a>
                    <a href="https://leerlandais.com" class="mx-auto lg:mx-0 hover:underline text-gray-800 font-extrabold rounded my-2 py-4 px-8 shadow-lg w-[25%] bg-white bg-opacity-50">
                        Visit Home Site
                    </a>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <?php
    if (!isset($_GET['route'])) {
        ?>
        <div class="container mx-auto h-auto text-center w-[50%]">
            <h3 class="text-3xl underline mx-auto">
                Artists
            </h3>
            <ul class="flex flex-row mt-6">
                <?php
                foreach ($allArtists as $artist) {
                    ?>
                    <a href="?route=artist&artId=<?=$artist->getArtId()?>"><li class="py-1 my-1"><?=html_entity_decode($artist->getArtName())?></li></a>
                    <?php
                }
                ?>
            </ul>
            <form action="#" method="post" class="w-25">
                <div class="mb-4">
                    <label for="artistName" class="block text-sm font-medium text-black dark:text-gray-300 mb-2">Artist</label>
                    <input type="text" name="artistName" class="bg-gray-200 shadow-sm text-center rounded-md w-auto px-3 py-2 border border-black focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Add new Artist" required>
                </div>
                <button type="submit" class="w-auto mx-auto flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add</button>
            </form>
        </div>
        <?php
    }else if ($_GET['route'] == "artist") {
        ?>
        <div class="container mx-auto h-auto text-center">
            <?php
            $i = 0;
            foreach ($oneArt as $art) {
            if($i < 1) {
                ?>
                <h3 class="text-3xl underline mx-auto">
                    <?=html_entity_decode($art->getArtName())?>
                </h3>
                <?php
                $i++;
            }
            ?>
            <ul>
                <a href="?route=song&songSlug=<?=$art->getSongSlug()?>"><li class="py-1 my-1"><?=html_entity_decode($art->getSongName())?></li></a>
                <?php
                }
                ?>
            </ul>
            <?php
            $i = 0;
            foreach ($oneArt as $art) {
            if($i < 1) {
            ?>
            <form action="#" method="post" class="w-25">
                <div class="hidden">
                    <input type="text" name="artId" value="<?=$art->getArtName()?>">
                </div>
                <div class="mb-4">
                    <label for="songName" class="block text-sm font-medium text-black dark:text-gray-300 mb-2">Song Title</label>
                    <input type="text" name="songName" class="bg-gray-200 shadow-sm text-center rounded-md w-auto px-3 py-2 border border-black focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Add new Song" required>
                </div>
                <div class="mb-4">
                    <label for="songTab" class="block text-sm font-medium text-black dark:text-gray-300 mb-2">Song Tab</label>
                    <textarea name="songTab" cols="30" rows="10" required></textarea>
                </div>
                <button type="submit" class="w-auto mx-auto flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add</button>
            </form>
                <?php
                $i++;
            }
            ?>
        </div>
        <?php
    }}
    ?>
</body>
</html>

