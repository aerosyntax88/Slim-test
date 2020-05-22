<?php

namespace Modules\Article\Http\Controllers;

use Modules\Article\Contracts\ArticleListServiceInterface;
use Modules\Article\Http\Responses\ArticleListResponse;
use Psr\Http\Message\ResponseInterface;

class ArticleListController
{
    /**
     * @var ArticleListServiceInterface
     */
    protected $listService;

    /**
     * @var ArticleListResponse
     */
    protected $response;

    /**
     * @param ArticleListServiceInterface $listService
     * @param ArticleListResponse $response
     */
    public function __construct(ArticleListServiceInterface $listService, ArticleListResponse $response)
    {
        $this->listService = $listService;
        $this->response = $response;
    }

    /**
     * @return ResponseInterface
     */
    public function __invoke(): ResponseInterface
    {
        $model = $this->listService->list();
        return $this->response->toJson($model);
    }
}
