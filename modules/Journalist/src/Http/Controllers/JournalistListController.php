<?php

namespace Modules\Journalist\Http\Controllers;

use Modules\Journalist\Contracts\JournalistListServiceInterface;
use Modules\Journalist\Http\Responses\JournalistGetResponse;
use Modules\Journalist\Http\Responses\JournalistListResponse;
use Psr\Http\Message\ResponseInterface;

class JournalistListController
{
    /**
     * @var JournalistListServiceInterface
     */
    protected $listService;

    /**
     * @var JournalistListResponse
     */
    protected $response;

    /**
     * @param JournalistListServiceInterface $listService
     * @param JournalistListResponse $response
     */
    public function __construct(JournalistListServiceInterface $listService, JournalistListResponse $response)
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
