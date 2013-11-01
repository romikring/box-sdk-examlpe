<?php

defined('DS') || define('DS', DIRECTORY_SEPARATOR);

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';
require_once 'Zend/Loader/Autoloader.php';

$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->registerNamespace('Rabox_');

/**
 * Add autoloader for the Box SDK library
 */
$autoloader->pushAutoloader(function($class) {
    if (strpos($class, 'Box\\') === 0) {
        $filename = realpath(APPLICATION_PATH.'/../vendor/romikring/rabox/'. (str_replace('\\', '/', substr($class, 4))).'.php');
        if (!$filename) {
            throw new Exception("Class $class not found");
        }

        require_once $filename;
    }
});

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

$application->bootstrap()
            ->run();