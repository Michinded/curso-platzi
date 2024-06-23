<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResorce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'post_name' => $this->title,
            'content' => $this->body,
            'slug' => $this->slug,
            'release' => $this->created_at->format('d-m-Y'),
            'author' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
                ]
        ];
    }
}
