<?php

namespace Modules\Article\Http\Responses;

use Illuminate\Database\Eloquent\Collection;
use Modules\Article\Models\Article;
use Slim\Psr7\Response;

class ArticleListResponse extends Response
{
    /**
     * @param Collection|Article[] $articles
     * @return $this
     */
    public function toJson(Collection $articles)
    {
        parent::getBody()->write($this->transform($articles));
        return $this;
    }

    /**
     * @param Collection|Article[] $articles
     * @return string
     */
    protected function transform(Collection $articles): string
    {
        $transformedCollection = [];
        foreach ($articles as $article) {
            $transformedCollection[] = [
                'id' => $article->id,
                'name' => $article->title,
                'path' => $article->path,
                'userId' => $article->user_id,
                'text' => $article->text,
                'createdAt' => $article->created_at->timestamp,
                'updatedAt' => $article->updated_at->timestamp
            ];
        }
        return json_encode($transformedCollection);
    }
}
