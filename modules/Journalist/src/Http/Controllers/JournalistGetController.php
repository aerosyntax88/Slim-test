<?php

namespace Modules\Journalist\Http\Controllers;

use Modules\Boundary\Request\Transformers\IdRequestTransformer;
use Modules\Journalist\Contracts\JournalistGetServiceInterface;
use Modules\Journalist\Http\Responses\JournalistGetResponse;
use Psr\Http\Message\ResponseInterface;

class JournalistGetController
{
    /**
     * @var IdRequestTransformer
     */
    protected $requestTransformer;

    /**
     * @var JournalistGetServiceInterface
     */
    protected $getService;

    /**
     * @var JournalistGetResponse
     */
    protected $response;

    /**
     * @param IdRequestTransformer $requestTransformer
     * @param JournalistGetServiceInterface $getService
     * @param JournalistGetResponse $response
     */
    public function __construct(
        IdRequestTransformer $requestTransformer,
        JournalistGetServiceInterface $getService,
        JournalistGetResponse $response
    ) {
        $this->requestTransformer = $requestTransformer;
        $this->getService = $getService;
        $this->response = $response;
    }

    /**
     * @param int $id
     * @return ResponseInterface
     */
    public function __invoke(int $id): ResponseInterface
    {
        $requestModel = $this->requestTransformer
            ->setId($id)
            ->build();

        $model = $this->getService->get($requestModel);
        return $this->response->toJson($model);
    }
}
