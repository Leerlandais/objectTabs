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

if(isset($_GET["route"])) {
    switch ($_GET["route"]) {
        case "artist" :
            $id = $_GET["artId"];
            $oneArt = $songManager->selectAllByArtistId($id);
            break;
        case "song" :
            $slug = $_GET["songSlug"];
            $oneSong = $tabManager->selectTabBySlug($slug);
            break;
    }
}


$title = "Admin Only";
include PROJECT_DIRECTORY.'\view\private\private.home.view.php';