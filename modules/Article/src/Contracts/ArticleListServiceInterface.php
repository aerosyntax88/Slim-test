<?php

namespace Modules\Article\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ArticleListServiceInterface
{
    /**
     * @return Collection
     */
    public function list(): Collection;
}
