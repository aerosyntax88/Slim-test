<?php

namespace Modules\Article\Http\Controllers;

use Modules\Article\Contracts\ArticleStoreServiceInterface;
use Modules\Article\Http\Responses\ArticleGetResponse;
use Modules\Article\Requests\Transformers\ArticleStoreRequestTransformer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ArticleStoreController
{
    /**
     * @var ArticleStoreServiceInterface
     */
    protected $storeService;

    /**
     * @var ArticleGetResponse
     */
    protected $response;

    /**
     * @var ArticleStoreRequestTransformer
     */
    protected $requestTransformer;

    /**
     * @param ArticleStoreServiceInterface $storeService
     * @param ArticleGetResponse $response
     * @param ArticleStoreRequestTransformer $requestTransformer
     */
    public function __construct(
        ArticleStoreServiceInterface $storeService,
        ArticleGetResponse $response,
        ArticleStoreRequestTransformer $requestTransformer
    ) {
        $this->storeService = $storeService;
        $this->response = $response;
        $this->requestTransformer = $requestTransformer;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $requestModel = $this->requestTransformer->httpTransform($request)->build();
        $model = $this->storeService->store($requestModel);
        return $this->response->toJson($model);
    }
}
