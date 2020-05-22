<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Modules\Article\Contracts\ArticleGetServiceInterface;
use Modules\Article\Contracts\ArticleListServiceInterface;
use Modules\Article\Contracts\ArticleRepositoryInterface;
use Modules\Article\Contracts\ArticleStoreServiceInterface;
use Modules\Article\Repositories\ArticleRepository;
use Modules\Article\Services\ArticleGetService;
use Modules\Article\Services\ArticleListService;
use Modules\Article\Services\ArticleStoreService;
use Modules\Journalist\Contracts\JournalistGetServiceInterface;
use Modules\Journalist\Contracts\JournalistListServiceInterface;
use Modules\Journalist\Contracts\JournalistRepositoryInterface;
use Modules\Journalist\Contracts\JournalistStoreServiceInterface;
use Modules\Journalist\Repositories\JournalistRepository;
use Modules\Journalist\Services\JournalistGetService;
use Modules\Journalist\Services\JournalistListService;
use Modules\Journalist\Services\JournalistStoreService;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        JournalistRepositoryInterface::class => DI\get(JournalistRepository::class),
        JournalistGetServiceInterface::class => DI\get(JournalistGetService::class),
        JournalistListServiceInterface::class => DI\get(JournalistListService::class),
        JournalistStoreServiceInterface::class => DI\get(JournalistStoreService::class),

        ArticleRepositoryInterface::class => DI\get(ArticleRepository::class),
        ArticleGetServiceInterface::class => DI\get(ArticleGetService::class),
        ArticleListServiceInterface::class => DI\get(ArticleListService::class),
        ArticleStoreServiceInterface::class => DI\get(ArticleStoreService::class),
    ]);
};
