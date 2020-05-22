<?php

namespace Modules\Journalist\Services;

use Illuminate\Database\Eloquent\Model;
use Modules\Boundary\Request\Models\IdRequestModel;
use Modules\Journalist\Contracts\JournalistGetServiceInterface;
use Modules\Journalist\Contracts\JournalistRepositoryInterface;

class JournalistGetService implements JournalistGetServiceInterface
{
    /**
     * @var JournalistRepositoryInterface
     */
    protected $repository;

    /**
     * @param JournalistRepositoryInterface $repository
     */
    public function __construct(
        JournalistRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    public function get(IdRequestModel $requestModel): ?Model
    {
        return $this->repository->findById($requestModel->getId());
    }
}
