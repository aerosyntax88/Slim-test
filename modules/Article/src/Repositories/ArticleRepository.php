<?php

namespace Modules\Article\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Article\Contracts\ArticleRepositoryInterface;
use Modules\Article\Models\Article;

class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * @var Article
     */
    protected $model;

    /**
     * @param Article $model
     */
    public function __construct(Article $model)
    {
        $this->model = $model;
    }

    /**
     * @inheritDoc
     */
    public function findByField(string $field, string $value): Model
    {
        return $this->model
            ->newQuery()
            ->where($field, $value)
            ->firstOrFail();
    }

    /**
     * @inheritDoc
     */
    public function list(): Collection
    {
        return $this->model
            ->newQuery()
            ->get();
    }

    /**
     * @inheritDoc
     */
    public function save(Article $article): Article
    {
        $article->save();
        return $article;
    }
}
