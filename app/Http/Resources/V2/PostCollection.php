<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    // Usar PostResorce para dar formato a la respuesta
    public $collects = PostResorce::class;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'organization' => 'Michinded',
                'authors' => [
                    'name' => 'Michinded',
                    'email' => 'michinded@gmail.com'
                ],
            ]
        ];
    }
}
