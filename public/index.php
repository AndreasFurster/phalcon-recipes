<?php
use Phalcon\Di\FactoryDefault;

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try {
    // Use default di from Phalcon
    $di = new FactoryDefault();

    // Handle routing
    include APP_PATH . '/config/router.php';

    // Setup services
    include APP_PATH . '/config/services.php';
    $config = $di->getConfig();


    // Autoload controllers and models
    $loader = new \Phalcon\Loader();
    $loader->registerDirs(
        [
            $config->application->controllersDir,
            $config->application->modelsDir
        ]
    );
    $loader->register();

    // Run the whole thing
    $application = new \Phalcon\Mvc\Application($di);

    // Output result
    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
