<?php
session_start();

if (isset($_SESSION["errorMessage"])) {
    $errorMessage = $_SESSION["errorMessage"];
    unset($_SESSION["errorMessage"]);
}

use model\MyPDO;

require_once "../config.php";


spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY . '/' . $class . '.php';
});

try {
    echo 'hello'; // THIS TEST WORKS FINE
    $db = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET,
        DB_LOGIN,
        DB_PWD);

    $db->setAttribute(MyPDO::ATTR_ERRMODE, MyPDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    var_dump($db); // THIS DOES NOT SHOW ONLINE BUT WORKS FINE WITH WAMP
} catch (Exception $e) {
    die($e->getMessage());
}

require_once PROJECT_DIRECTORY . '/controller/routerController.php';

$db = null;

/*
 * THINGS FOR TOMORROW
 * Create the DB
 * Change the names of tables in sql requests
 * Set up the homepage correctly
 */