<?php

namespace Modules\Article\Services;

use Illuminate\Database\Eloquent\Model;
use Modules\Article\Contracts\ArticleGetServiceInterface;
use Modules\Article\Contracts\ArticleRepositoryInterface;
use Modules\Boundary\Request\Models\SlugRequestModel;

class ArticleGetService implements ArticleGetServiceInterface
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
    public function get(SlugRequestModel $requestModel): ?Model
    {
        return $this->repository->findByField('path', $requestModel->getSlug());
    }
}
