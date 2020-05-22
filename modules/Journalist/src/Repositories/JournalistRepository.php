<?php

namespace Modules\Journalist\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Journalist\Contracts\JournalistRepositoryInterface;
use Modules\Journalist\Models\Journalist;

class JournalistRepository implements JournalistRepositoryInterface
{
    /**
     * @var Journalist
     */
    protected $model;

    /**
     * @param Journalist $model
     */
    public function __construct(Journalist $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id): ?Model
    {
        return $this->model->newQuery()->findOrFail($id);
    }

    /**
     * @inheritDoc
     */
    public function findByField(string $field, string $value): Model
    {
        return $this->model
            ->newQuery()
            ->where($field, $value)
            ->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return $this->model->newQuery()->get();
    }

    /**
     * @inheritDoc
     */
    public function save(Journalist $journalist): Journalist
    {
        $journalist->save();
        return $journalist;
    }
}
