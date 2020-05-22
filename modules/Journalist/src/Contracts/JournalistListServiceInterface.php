<?php

namespace Modules\Journalist\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface JournalistListServiceInterface
{
    /**
     * @return Collection
     */
    public function list(): Collection;
}
