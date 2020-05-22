<?php

namespace Modules\Boundary\Request\Transformers;

use Modules\Boundary\Contracts\RequestModelInterface;
use Modules\Boundary\Request\Models\IdRequestModel;

class IdRequestTransformer extends AbstractRequestTransformer
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return IdRequestTransformer
     */
    public function setId(int $id): IdRequestTransformer
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return IdRequestModel
     */
    public function build(): RequestModelInterface
    {
        return new IdRequestModel($this);
    }
}
