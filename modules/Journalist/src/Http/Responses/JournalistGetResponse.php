<?php

namespace Modules\Journalist\Http\Responses;

use Illuminate\Database\Eloquent\Model;
use Modules\Journalist\Models\Journalist;
use Slim\Psr7\Response;

class JournalistGetResponse extends Response
{
    /**
     * @param Journalist|Model $model
     * @return $this
     */
    public function toJson(Journalist $model)
    {
        parent::getBody()->write($this->transform($model));
        return $this;
    }

    /**
     * @param Journalist $model
     * @return string
     */
    protected function transform(Journalist $model): string
    {
        return json_encode([
            'id' => $model->id,
            'name' => $model->name,
            'alias' => $model->alias,
            'createdAt' => $model->created_at->timestamp,
            'updatedAt' => $model->updated_at->timestamp
        ]);
    }
}
