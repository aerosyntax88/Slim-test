<?php

namespace Modules\Article\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\Article\Contracts\ArticleRepositoryInterface;
use Modules\Article\Contracts\ArticleStoreServiceInterface;
use Modules\Article\Exceptions\PathNotUniqueException;
use Modules\Article\Models\Article;
use Modules\Article\Requests\Models\ArticleStoreRequestModel;
use Modules\Journalist\Contracts\JournalistRepositoryInterface;
use Modules\Journalist\Models\Journalist;

class ArticleStoreService implements ArticleStoreServiceInterface
{
    /**
     * @var Article
     */
    protected $model;

    /**
     * @var ArticleRepositoryInterface
     */
    protected $articleRepository;

    /**
     * @var JournalistRepositoryInterface
     */
    protected $journalistRepository;

    /**
     * @param Article $model
     * @param ArticleRepositoryInterface $articleRepository
     * @param JournalistRepositoryInterface $journalistRepository
     */
    public function __construct(
        Article $model,
        ArticleRepositoryInterface $articleRepository,
        JournalistRepositoryInterface $journalistRepository
    ) {
        $this->model = $model;
        $this->articleRepository = $articleRepository;
        $this->journalistRepository = $journalistRepository;
    }


    /**
     * @inheritDoc
     */
    public function store(ArticleStoreRequestModel $requestModel): ?Model
    {
        $this->validateAlias($requestModel);
        $journalist = $this->findJournalistById($requestModel->getUserId());
        $this->model->fill([
            'title' => $requestModel->getTitle(),
            'path' => $requestModel->getPath(),
            'user_id' => $requestModel->getUserId(),
            'journalist_alias' => $journalist->alias,
            'text' => $requestModel->getText(),
        ]);
        return $this->articleRepository->save($this->model);
    }

    /**
     * @param ArticleStoreRequestModel $requestModel
     * @throws PathNotUniqueException
     */
    private function validateAlias(ArticleStoreRequestModel $requestModel)
    {
        try {
            $this->articleRepository->findByField('path', $requestModel->getPath());
            throw new PathNotUniqueException();
        } catch (ModelNotFoundException $exception) {
            unset($exception);
        }
    }

    /**
     * @param int $userId
     * @return Journalist
     */
    private function findJournalistById(int $userId): Journalist
    {
        return $this->journalistRepository->findById($userId);
    }
}
