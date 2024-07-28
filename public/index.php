<?php
session_start(); // always start with the session :)
// my new way of handling error messages - this permits message to exist even after page reload
if (isset($_SESSION["errorMessage"])) {
    $errorMessage = $_SESSION["errorMessage"];
    unset($_SESSION["errorMessage"]);
}

use model\MyPDO; // then set up a DB connection

require_once "../config.php"; // always need the config and ALWAYS MAKE SURE THERE'S A .GITIGNORE

// autoload the Classes
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require PROJECT_DIRECTORY . '/' . $class . '.php';
});

try {
// connect to the DB
    $db = MyPDO::getInstance(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=" . DB_CHARSET,
        DB_LOGIN,
        DB_PWD);
// set attributes for error handling and fetch modes
    $db->setAttribute(MyPDO::ATTR_ERRMODE, MyPDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die($e->getMessage());
}

// Call the first router - handles basic necessities and directs to other controllers
require_once PROJECT_DIRECTORY . '/controller/routerController.php';


$db = null;