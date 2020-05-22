<?php

namespace Modules\Article\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Article\Contracts\ArticleListServiceInterface;
use Modules\Article\Contracts\ArticleRepositoryInterface;

class ArticleListService implements ArticleListServiceInterface
{
    /**
     * @var ArticleRepositoryInterface
     */
    protected $repository;

    /**
     * @param ArticleRepositoryInterface $repository
     */
    public function __construct(
        ArticleRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return $this->repository->list();
    }
}
