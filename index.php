<?php

require 'common/bootstrap.php';

use Classes\Models as Model;

$action = @$_GET['action'] ? $_GET['action'] : 'home';

// Action home
// Show home content
if ($action === 'home') {

    $userX = Model\User::find(1);

    echo view(getTheme().'.controllers.index.home', [
        'pageTitle' => 'This is index controller - action home'
    ]);

} 

// Action test
// Just for fun

elseif ($action === 'action-test') {

    echo view(getTheme().'.controllers.index.action-test', [
        'pageTitle' => 'This is action test'
    ]);

}