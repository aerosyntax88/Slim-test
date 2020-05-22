<?php

namespace Modules\Boundary\Request\Transformers;

use Modules\Boundary\Contracts\RequestModelInterface;
use Modules\Boundary\Request\Models\SlugRequestModel;

class SlugRequestTransformer extends AbstractRequestTransformer
{
    /**
     * @var string
     */
    protected $slug;

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return SlugRequestTransformer
     */
    public function setSlug(string $slug): SlugRequestTransformer
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return SlugRequestModel
     */
    public function build(): RequestModelInterface
    {
        return new SlugRequestModel($this);
    }
}
