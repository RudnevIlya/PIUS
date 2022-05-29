<?php

namespace App\Http\v1\Modules\Actors\Resources;

use App\Http\v1\Modules\Actors\Resources\BaseJsonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\v1\Modules\Actors\Controllers\ActorsController;

/** @mixin \App\Domain\Actors\Catalog\Models\Actor */

class ErrorPathResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'data' => null,
            'errors' => [
                'code' => '404',
                'message' => 'NOT FOUND',
                'meta' => null,
            ],
            'meta' => [
    
            ]
        ];
    }
}