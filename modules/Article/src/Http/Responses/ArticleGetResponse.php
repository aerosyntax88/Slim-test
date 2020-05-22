<?php

namespace Modules\Article\Http\Responses;

use Illuminate\Database\Eloquent\Model;
use Modules\Article\Models\Article;
use Slim\Psr7\Response;

class ArticleGetResponse extends Response
{
    /**
     * @param Article|Model $model
     * @return $this
     */
    public function toJson(Article $model)
    {
        parent::getBody()->write($this->transform($model));
        return $this;
    }

    /**
     * @param Article $model
     * @return string
     */
    protected function transform(Article $model): string
    {
        return json_encode([
            'id' => $model->id,
            'title' => $model->title,
            'path' => $model->path,
            'userId' => $model->user_id,
            'journalistAlias' => $model->journalist_alias,
            'text' => $model->text,
            'createdAt' => $model->created_at->timestamp,
            'updatedAt' => $model->updated_at->timestamp
        ]);
    }
}
