<?php

namespace Modules\Article\Requests\Models;

use Modules\Article\Requests\Transformers\ArticleStoreRequestTransformer;
use Modules\Boundary\Request\Models\AbstractRequestModel;

class ArticleStoreRequestModel extends AbstractRequestModel
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
     * @param ArticleStoreRequestTransformer $transformer
     */
    public function __construct(ArticleStoreRequestTransformer $transformer)
    {
        $this->title = $transformer->getTitle();
        $this->path = $transformer->getPath();
        $this->userId = $transformer->getUserId();
        $this->text = $transformer->getText();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}
