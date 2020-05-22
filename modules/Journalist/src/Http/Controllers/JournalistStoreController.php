<?php

namespace Modules\Journalist\Http\Controllers;

use Modules\Journalist\Contracts\JournalistStoreServiceInterface;
use Modules\Journalist\Http\Responses\JournalistGetResponse;
use Modules\Journalist\Requests\Transformers\JournalistStoreRequestTransformer;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class JournalistStoreController
{
    /**
     * @var JournalistStoreServiceInterface
     */
    protected $storeService;

    /**
     * @var JournalistGetResponse
     */
    protected $response;

    /**
     * @var JournalistStoreRequestTransformer
     */
    protected $requestTransformer;

    /**
     * @param JournalistStoreServiceInterface $storeService
     * @param JournalistGetResponse $response
     * @param JournalistStoreRequestTransformer $requestTransformer
     */
    public function __construct(
        JournalistStoreServiceInterface $storeService,
        JournalistGetResponse $response,
        JournalistStoreRequestTransformer $requestTransformer
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
