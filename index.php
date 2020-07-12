<?php
require_once('lib/functions.php');
require_once('lib/project_functions.php');
require_once('lib/lessphp/less.php');
require_once('lib/idiorm-master/idiorm.php');
require_once('lib/salabim/salabim.php');
require_once('lib/class_router.php');
require_once('lib/localisation/localisation.php');

require_once('cfg.php');

$user = new User();
$user->login();

$router = new Router();
if ($user->logged and
    (
        $user->data['role_name_en'] == 'director' or
        $user->data['role_name_en'] == 'staff')
) {
    $router->controllers_dir = CONTROLLERS . '/users';
} else {
    $router->controllers_dir = CONTROLLERS;
}


$router->controller_404 = CONTROLLERS . '/404.php';
$router->run();


include_once $router->patch_to_controller;



