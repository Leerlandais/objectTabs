<?php

// This controller is not needed for this point of the EcoLibrary project but has been included for its necessity in future branches

$route = $_GET['route'] ?? 'home';
/*
var_dump($route);
*/
// set up controller calls here
/*
 * switch $route
 * case : Me
 * case : Visitor
 * case : etc
 */

require_once PROJECT_DIRECTORY.'/controller/publicController.php';

