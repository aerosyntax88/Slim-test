<?php
declare(strict_types=1);

use Modules\Article\Http\Controllers\ArticleGetController;
use Modules\Article\Http\Controllers\ArticleListController;
use Modules\Article\Http\Controllers\ArticleStoreController;
use Modules\Journalist\Http\Controllers\JournalistGetController;
use Modules\Journalist\Http\Controllers\JournalistListController;
use Modules\Journalist\Http\Controllers\JournalistStoreController;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return function (App $app) {
    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->group('/journalist', function (RouteCollectorProxy $group) {
            $group->get('/{id:[0-9]+}', JournalistGetController::class);
            $group->get('', JournalistListController::class);
            $group->post('', JournalistStoreController::class);
        });

        $group->group('/article', function (RouteCollectorProxy $group) {
            $group->get('/{path}', ArticleGetController::class);
            $group->get('', ArticleListController::class);
            $group->post('', ArticleStoreController::class);
        });
    });
};
