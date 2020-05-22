<?php

namespace Modules\Article\Contracts;

use Illuminate\Database\Eloquent\Model;
use Modules\Article\Requests\Models\ArticleStoreRequestModel;

interface ArticleStoreServiceInterface
{
    /**
     * @param ArticleStoreRequestModel $requestModel
     * @return Model|null
     */
    public function store(ArticleStoreRequestModel $requestModel): ?Model;
}
