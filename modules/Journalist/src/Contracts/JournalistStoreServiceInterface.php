<?php

namespace Modules\Journalist\Contracts;

use Illuminate\Database\Eloquent\Model;
use Modules\Journalist\Requests\Models\JournalistStoreRequestModel;

interface JournalistStoreServiceInterface
{
    /**
     * @param JournalistStoreRequestModel $requestModel
     * @return Model|null
     */
    public function store(JournalistStoreRequestModel $requestModel): ?Model;
}
