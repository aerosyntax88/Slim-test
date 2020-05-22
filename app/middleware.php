<?php
declare(strict_types=1);

use Slim\App;
use Zeuxisoo\Whoops\Slim\WhoopsMiddleware;

return function (App $app) {
    if (getenv('APP_DEBUG') === 'true') {
        $app->add(new WhoopsMiddleware());
        $app->addBodyParsingMiddleware();
    }
};
