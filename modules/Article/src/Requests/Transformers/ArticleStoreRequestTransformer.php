<?php

namespace Modules\Article\Requests\Transformers;

use Modules\Article\Requests\Models\ArticleStoreRequestModel;
use Modules\Boundary\Contracts\RequestModelInterface;
use Modules\Boundary\Request\Transformers\AbstractRequestTransformer;

class ArticleStoreRequestTransformer extends AbstractRequestTransformer
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return ArticleStoreRequestTransformer
     */
    public function setTitle(string $title): ArticleStoreRequestTransformer
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return ArticleStoreRequestTransformer
     */
    public function setPath(string $path): ArticleStoreRequestTransformer
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return ArticleStoreRequestTransformer
     */
    public function setUserId(int $userId): ArticleStoreRequestTransformer
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return ArticleStoreRequestTransformer
     */
    public function setText(string $text): ArticleStoreRequestTransformer
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return RequestModelInterface
     */
    public function build(): RequestModelInterface
    {
        return new ArticleStoreRequestModel($this);
    }
}
