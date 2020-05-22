<?php

namespace Modules\Journalist\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Journalist\Contracts\JournalistRepositoryInterface;
use Modules\Journalist\Contracts\JournalistStoreServiceInterface;
use Modules\Journalist\Exceptions\AliasNotUniqueException;
use Modules\Journalist\Models\Journalist;
use Modules\Journalist\Requests\Models\JournalistStoreRequestModel;

class JournalistStoreService implements JournalistStoreServiceInterface
{
    /**
     * @var Journalist
     */
    protected $model;

    /**
     * @var JournalistRepositoryInterface
     */
    protected $repository;

    /**
     * @param Journalist $model
     * @param JournalistRepositoryInterface $repository
     */
    public function __construct(Journalist $model, JournalistRepositoryInterface $repository)
    {
        $this->model = $model;
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     * @throws AliasNotUniqueException
     */
    public function store(JournalistStoreRequestModel $requestModel): ?Model
    {
        $this->validateAlias($requestModel);
        $this->model->fill([
            'name' => $requestModel->getName(),
            'alias' => $requestModel->getAlias(),
        ]);
        return $this->repository->save($this->model);
    }

    /**
     * @param JournalistStoreRequestModel $requestModel
     * @throws AliasNotUniqueException
     */
    private function validateAlias(JournalistStoreRequestModel $requestModel)
    {
        try {
            $this->repository->findByField('alias', $requestModel->getAlias());
            throw new AliasNotUniqueException();
        } catch (ModelNotFoundException $exception) {
            unset($exception);
        }
    }
}
