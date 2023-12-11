<?php

namespace Modules\Blog\app\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'name'         => $this->name,
            'image'        => $this->getFirstMediaUrl('image'),
            'description'  => $this->description,
            'content'      => $this->content,
            'slug'         => $this->slug,
            'is_published' => $this->is_published,
        ];
    }
}
