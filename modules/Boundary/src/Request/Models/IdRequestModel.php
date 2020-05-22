<?php

namespace Modules\Boundary\Request\Models;

use Modules\Boundary\Request\Transformers\IdRequestTransformer;

class IdRequestModel extends AbstractRequestModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * IdRequestModel constructor.
     * @param IdRequestTransformer $transformer
     */
    public function __construct(IdRequestTransformer $transformer)
    {
        $this->id = $transformer->getId();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
