<?php

error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/functions.php';


// Load app config and put to container data
containerPut('config', require __DIR__ . '/config.php');

$appConfig = containerGet('config');
    
// ------------------------------ //
    
    // Connect database
    $config = new \Doctrine\DBAL\Configuration();

    $connectionParams = array(
        'dbname' => $appConfig['database']['database'],
        'user' => $appConfig['database']['username'],
        'password' => $appConfig['database']['password'],
        'host' => $appConfig['database']['host'],
        'driver' => 'pdo_mysql',
    );

    $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

    // Put database connection to container
    containerPut('database', $conn);

// ------------------------------ //
    
    // View manager
    $blade = new \Jenssegers\Blade\Blade('views', 'views-cache');

    // Put view manager to container
    containerPut('view', $blade);

// ------------------------------ //

