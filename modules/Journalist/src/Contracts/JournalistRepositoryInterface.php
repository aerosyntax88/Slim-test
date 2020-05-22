<?php

namespace Modules\Journalist\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Journalist\Models\Journalist;

interface JournalistRepositoryInterface
{
    /**
     * @param int $id
     * @return Journalist|Model|null
     */
    public function findById(int $id): ?Model;

    /**
     * @param string $field
     * @param string $value
     * @return Model
     */
    public function findByField(string $field, string $value): Model;

    /**
     * @return Collection
     */
    public function list(): Collection;

    /**
     * @param Journalist $journalist
     * @return Journalist
     */
    public function save(Journalist $journalist): Journalist;
}
