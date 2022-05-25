<?php

namespace App\Http\ApiV1\Modules\Actors\Resources;

use App\Http\ApiV1\Modules\Actors\Resources\BaseJsonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\ApiV1\Modules\Actors\Controllers\ActorsController;
use App\Http\ApiV1\Modules\Actors\Controllers\EmptyResourceController;

/** @mixin \App\Domain\Actors\Catalog\Models\Actor */

class EmptyResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'data' => null,
            'errors' => [
                'code' => EmptyResourceController::$code,
                'message' => EmptyResourceController::$message,
                'meta' => null,
            ],
            'meta' => [
    
            ]
        ];
    }
}