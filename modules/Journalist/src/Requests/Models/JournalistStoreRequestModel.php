<?php

namespace Modules\Journalist\Requests\Models;

use Modules\Boundary\Request\Models\AbstractRequestModel;
use Modules\Journalist\Requests\Transformers\JournalistStoreRequestTransformer;

class JournalistStoreRequestModel extends AbstractRequestModel
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
     * @param JournalistStoreRequestTransformer $transformer
     */
    public function __construct(JournalistStoreRequestTransformer $transformer)
    {
        $this->name = $transformer->getName();
        $this->alias = $transformer->getAlias();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return JournalistStoreRequestModel
     */
    public function setName(string $name): JournalistStoreRequestModel
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
     * @return JournalistStoreRequestModel
     */
    public function setAlias(string $alias): JournalistStoreRequestModel
    {
        $this->alias = $alias;
        return $this;
    }
}
