<?php

namespace Modules\Journalist\Contracts;

use Illuminate\Database\Eloquent\Model;
use Modules\Boundary\Request\Models\IdRequestModel;

interface JournalistGetServiceInterface
{
    /**
     * @param IdRequestModel $requestModel
     * @return Model|null
     */
    public function get(IdRequestModel $requestModel): ?Model;
}
