<?php

namespace Modules\Boundary\Request\Models;

use Modules\Boundary\Request\Transformers\SlugRequestTransformer;

class SlugRequestModel extends AbstractRequestModel
{
    /**
     * @var string
     */
    protected $slug;

    /**
     * SlugValue constructor.
     * @param SlugRequestTransformer $transformer
     */
    public function __construct(SlugRequestTransformer $transformer)
    {
        $this->slug = $transformer->getSlug();
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}
