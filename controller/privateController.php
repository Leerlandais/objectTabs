<?php

use model\Manager\UserManager;
use model\Manager\TabManager;
use model\Manager\SongManager;
use model\Manager\ArtistManager;

$userManager = new UserManager($db);
$tabManager = new TabManager($db);
$songManager = new SongManager($db);
$artistManager = new ArtistManager($db);



// LOGOUT
if (isset($_GET["logout"])) {
    $userManager->logout();
}
$allArtists = $artistManager->selectAll();

if(isset($_POST["artistName"])) {
    $artistName = $_POST["artistName"];
    $addArtist = $artistManager->insert($artistName);
    if($addArtist) {
        header('Location: /');
    }else {
        $errorMessage = "Something went wrong with insert Artist";
    }
}

$title = "Admin Only";
include PROJECT_DIRECTORY.'\view\private\private.home.view.php';