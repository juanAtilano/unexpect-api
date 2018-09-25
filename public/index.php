<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Register routes
require __DIR__ . '/../src/routes.php';

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db']= function($container) use ($capsule){
    return $capsule;
};

$container['UsersController'] = function ($container){
    return new \src\Controllers\UsersController($container);
};

$usersRoutes = new \src\Routes\UsersRoutes($app);
$usersRoutes->setRoutes($app);

$container['MessagesController'] = function ($container){
    return new \src\Controllers\MessagesController($container);
};

$messagesRoutes = new \src\Routes\MessagesRoutes($app);
$messagesRoutes->setRoutes($app);

$container['LoginController'] = function ($container){
    return new \src\Controllers\LoginController($container);
};

$loginRoutes = new \src\Routes\LoginRoutes($app);
$loginRoutes->setRoutes($app);

// Run app
$app->run();
