<?php

use model\Manager\ArtistManager;

use model\Manager\UserManager;

use model\Manager\SongManager;

use model\Manager\TabManager;

$userManager = new UserManager($db);
$artistManager = new ArtistManager($db);
$songManager = new SongManager($db);
$tabManager = new TabManager($db);

$allArtists = $artistManager->selectAll();
$allSongs = $songManager->selectAll();




// CREATE NEW USER
if(isset($_POST["createUserName"],
         $_POST["createUserEmail"],
         $_POST["createUserLogin"],
         $_POST["createUserPassword"],
         $_POST["createUserPassVerify"])) {
    // first test if the two passwords inputted match
    if ($_POST["createUserPassword"] !== $_POST["createUserPassVerify"]) {
        $_SESSION["errorMessage"] = "Passwords do not match!";
        header("location: /");
        die();
        // then check if the username already exists
    }else if ($userManager->testUserName($_POST["createUserLogin"]) === true) {
        $_SESSION["errorMessage"] = "Login already exists!";
        header("location: /");
        die();
    }
    // collect necessary info (cleaning done inside the function)
    $name = $_POST["createUserName"];
    $email = $_POST["createUserEmail"];
    $login = $_POST["createUserLogin"];
    $password = $_POST["createUserPassword"];
    // and attempt user creation
    $createUser = $userManager->register($login, $password, $name, $email);
    if (!$createUser) {
        $_SESSION["errorMessage"] = "Error creating user!";
        header("location: /");
        die();
    }else {
        $userManager->login($name, $password);
    }
}

// ATTEMPT USER LOGIN
if(isset($_POST["username"],
         $_POST["password"])) {
    $name = $_POST["username"];
    $password = $_POST["password"];
    $attemptLogin = $userManager->login($name, $password);

    if (!$attemptLogin) {
        $_SESSION["errorMessage"] = "Invalid login!";
    }
    header("location: /");
}

// GET SONGS FOR ONE ARTIST
if(isset($_GET["route"])) {
 switch($_GET["route"]) {
     case "artist" :
         $id = $_GET["artId"];
         $oneArt = $songManager->selectAllByArtistId($id);
         break;
     case "song" :
         $slug = $_GET["songSlug"];
         $oneSong = $tabManager->selectTabBySlug($slug);
         break;
 }

    if ($_GET["route"] == "artist"){
        $id = $_GET["artId"];
        $oneArt = $songManager->selectAllByArtistId($id);
    }

}

$title = "HomePage";
include PROJECT_DIRECTORY."/view/public/public.home.view.php";

