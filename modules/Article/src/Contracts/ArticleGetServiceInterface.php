<?php

namespace Modules\Article\Contracts;

use Illuminate\Database\Eloquent\Model;
use Modules\Boundary\Request\Models\SlugRequestModel;

interface ArticleGetServiceInterface
{
    /**
     * @param SlugRequestModel $requestModel
     * @return Model|null
     */
    public function get(SlugRequestModel $requestModel): ?Model;
}
