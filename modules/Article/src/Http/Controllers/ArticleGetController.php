<?php

namespace Modules\Article\Http\Controllers;

use Modules\Article\Contracts\ArticleGetServiceInterface;
use Modules\Article\Http\Responses\ArticleGetResponse;
use Modules\Boundary\Request\Transformers\SlugRequestTransformer;
use Psr\Http\Message\ResponseInterface;

class ArticleGetController
{
    /**
     * @var SlugRequestTransformer
     */
    protected $requestTransformer;

    /**
     * @var ArticleGetServiceInterface
     */
    protected $getService;

    /**
     * @var ArticleGetResponse
     */
    protected $response;

    /**
     * @param SlugRequestTransformer $requestTransformer
     * @param ArticleGetServiceInterface $getService
     * @param ArticleGetResponse $response
     */
    public function __construct(
        SlugRequestTransformer $requestTransformer,
        ArticleGetServiceInterface $getService,
        ArticleGetResponse $response
    ) {
        $this->requestTransformer = $requestTransformer;
        $this->getService = $getService;
        $this->response = $response;
    }

    /**
     * @param string $path
     * @return ResponseInterface
     */
    public function __invoke(string $path): ResponseInterface
    {
        $requestModel = $this->requestTransformer
            ->setSlug($path)
            ->build();

        $model = $this->getService->get($requestModel);
        return $this->response->toJson($model);
    }
}
