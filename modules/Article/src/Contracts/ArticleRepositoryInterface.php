<?php

namespace Modules\Article\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Article\Models\Article;

interface ArticleRepositoryInterface
{
    /**
     * @param string $field
     * @param string $value
     * @return Article|Model
     */
    public function findByField(string $field, string $value): Model;

    /**
     * @return Collection
     */
    public function list(): Collection;

    /**
     * @param Article $article
     * @return Article
     */
    public function save(Article $article): Article;
}
