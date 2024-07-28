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

<div class="container mx-auto h-screen">
    <div class="text-center px-3">
        <h1 class="my-4 text-2xl md:text-3xl lg:text-5xl">
            Guitar Tabs
        </h1>
        <p class="leading-normal text-gray-800 text-base md:text-xl lg:text-2xl mb-8">
            Everything I need in one handy spot
        </p>

        <button class="mx-auto lg:mx-0 hover:underline text-gray-800 font-extrabold rounded my-2 py-4 px-8 shadow-lg w-[25%]">
            Log In
        </button>
        <a href="?ADD_A_ROUTE_HERE" class="inline-block mx-auto bg-transparent hover:underline text-gray-600 font-extrabold my-2 py-2 lg:py-4 px-6">
            Visit Home Site
        </a>
    </div>
</div>


</body>
</html>

