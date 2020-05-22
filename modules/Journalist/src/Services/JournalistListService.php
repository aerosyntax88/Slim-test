<?php

namespace Modules\Journalist\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Journalist\Contracts\JournalistListServiceInterface;
use Modules\Journalist\Contracts\JournalistRepositoryInterface;

class JournalistListService implements JournalistListServiceInterface
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
    public function list(): Collection
    {
        return $this->repository->list();
    }
}
