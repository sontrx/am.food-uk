<?php

require 'common/bootstrap.php';

$action = @$_GET['action'] ? $_GET['action'] : 'home';

$view = containerGet('view');

if ($action === 'home') {
    // ...
}