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
<body>

<div class="container mx-auto h-auto">
    <div class="py-12">
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
        <a href="?login">
            <button class="mx-auto lg:mx-0 hover:underline text-gray-800 font-extrabold rounded my-2 py-4 px-8 shadow-lg w-[25%]">
            Log In
            </button>
        </a>
        <a href="https://leerlandais.com" class="mx-auto lg:mx-0 hover:underline text-gray-800 font-extrabold rounded my-2 py-4 px-8 shadow-lg w-[25%]">
            Visit Home Site
        </a>
    </div>
</div>
<?php
if (isset($_GET['login'])) {
    ?>
    <p>Add login form</p>
<?php
}
?>
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
</div>
    <?php
    }else if ($_GET['route'] == "artist") {
?>
        <div class="container mx-auto h-auto text-center">
            <h3 class="text-3xl underline mx-auto">
                Songs
            </h3>
            <ul>
                <?php
                foreach ($oneArt as $art) {
                    ?>
                    <a href="?route=song&songSlug=<?=$art->getSongSlug()?>"><li class="py-1 my-1"><?=html_entity_decode($art->getSongName())?></li></a>
                    <?php
                }
                ?>
            </ul>
        </div>
    <?php
    }else if ($_GET['route'] == "song") {
        foreach ($oneSong as $song) {
    ?>
        <pre class="text-center">
            <?=$song->getTabTab()?>
        </pre>
    <?php
        }
    }
    ?>
</body>
</html>

