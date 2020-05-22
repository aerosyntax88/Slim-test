<?php
declare(strict_types=1);

use DI\Bridge\Slim\Bridge as SlimAppFactory;
use DI\ContainerBuilder;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

if (false) { // Should be set to true in production
    $containerBuilder->enableCompilation(__DIR__ . '/../var/cache');
}
Dotenv::createImmutable('../')->load();
$settings = require __DIR__ . '/../app/settings.php';
$settings($containerBuilder);

$logger = require __DIR__ . '/../app/logger.php';
$logger($containerBuilder);

$serviceProvider = require __DIR__ . '/../app/serviceProvider.php';
$serviceProvider($containerBuilder);



$container = $containerBuilder->build();

$container->set('JournalistGetServiceInterface', \DI\create('JournalistGetService'));

$app = SlimAppFactory::create($container);
$middleware = require __DIR__ . '/../app/middleware.php';
$middleware($app);

$routes = require __DIR__ . '/../bootstrap/database.php';
$routes = require __DIR__ . '/../app/routes.php';

$routes($app);


$app->run();
