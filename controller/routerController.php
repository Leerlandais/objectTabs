<?php

// This controller is not needed for this point of the EcoLibrary project but has been included for its necessity in future branches

$route = $_GET['route'] ?? 'home';

if(isset($_SESSION["id"]) && $_SESSION["id"] = session_id()){
    require_once PROJECT_DIRECTORY.'/controller/privateController.php';
}else {
require_once PROJECT_DIRECTORY.'/controller/publicController.php';

}


