<?php

namespace Modules\Boundary\Contracts;

use Psr\Http\Message\ServerRequestInterface;

interface RequestTransformerInterface
{
    /**
     * @param array $data
     * @return RequestTransformerInterface
     */
    public function transform(array $data): RequestTransformerInterface;

    /**
     * @param ServerRequestInterface $request
     * @return RequestTransformerInterface
     */
    public function httpTransform(ServerRequestInterface $request): RequestTransformerInterface;

    /**
     * @return RequestModelInterface
     */
    public function build(): RequestModelInterface;
}
