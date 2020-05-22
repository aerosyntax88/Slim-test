<?php

namespace Modules\Journalist\Http\Responses;

use Illuminate\Database\Eloquent\Collection;
use Modules\Journalist\Models\Journalist;
use Slim\Psr7\Response;

class JournalistListResponse extends Response
{
    /**
     * @param Collection|Journalist[] $journalists
     * @return $this
     */
    public function toJson(Collection $journalists)
    {
        parent::getBody()->write($this->transform($journalists));
        return $this;
    }

    /**
     * @param Collection|Journalist[] $journalists
     * @return string
     */
    protected function transform(Collection $journalists): string
    {
        $transformedCollection = [];
        foreach ($journalists as $journalist) {
            $transformedCollection[] = [
                'id' => $journalist->id,
                'name' => $journalist->name,
                'alias' => $journalist->alias,
                'createdAt' => $journalist->created_at->timestamp,
                'updatedAt' => $journalist->updated_at->timestamp
            ];
        }
        return json_encode($transformedCollection);
    }
}
