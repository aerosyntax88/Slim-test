<?php

namespace Modules\Journalist\Requests\Transformers;

use Modules\Boundary\Contracts\RequestModelInterface;
use Modules\Boundary\Request\Transformers\AbstractRequestTransformer;
use Modules\Journalist\Requests\Models\JournalistStoreRequestModel;

class JournalistStoreRequestTransformer extends AbstractRequestTransformer
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return JournalistStoreRequestTransformer
     */
    public function setName(string $name): JournalistStoreRequestTransformer
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return $this->alias;
    }

    /**
     * @param string $alias
     * @return JournalistStoreRequestTransformer
     */
    public function setAlias(string $alias): JournalistStoreRequestTransformer
    {
        $this->alias = $alias;
        return $this;
    }

    /**
     * @return RequestModelInterface
     */
    public function build(): RequestModelInterface
    {
        return new JournalistStoreRequestModel($this);
    }
}
