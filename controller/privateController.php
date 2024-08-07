<?php

use model\Manager\UserManager;
use model\Manager\TabManager;
use model\Manager\SongManager;
use model\Manager\ArtistManager;
use model\Mapping\SongMapping;
use model\Mapping\TabMapping;

$userManager = new UserManager($db);
$tabManager = new TabManager($db);
$songManager = new SongManager($db);
$artistManager = new ArtistManager($db);

// CHECK SESSION ACTIVITY OR LOGOUT AUTOMATICALLY
if (isset($_SESSION["active"]) && time() - $_SESSION["active"] > 10) {
    // $_SESSION["errorMessage"] = "Session Timed Out. Please log back in to access that page"; // This, of course, won't work as logout() destroys all Session information
    $userManager->logout();
    exit();
}
$_SESSION["active"] = time();


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

if (isset($_POST["songName"],
        $_POST["songTab"],
        $_POST["artId"]))
{
    $songName = $_POST["songName"];
    $songTab = $_POST["songTab"];
    $artId = $_POST["artId"];
    $addSong = $songManager->insert($songName, $artId);
    $addTab = $tabManager->addNewTab($songName, $songTab);
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