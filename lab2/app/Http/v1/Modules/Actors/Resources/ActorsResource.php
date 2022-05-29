<?php

namespace App\Http\v1\Modules\Actors\Resources;

use App\Http\v1\Modules\Actors\Resources\BaseJsonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\v1\Modules\Actors\Controllers\ActorsController;
use App\Http\v1\Modules\Actors\Controllers\EmptyResourceController;

/** @mixin \App\Domain\Actors\Catalog\Models\Actor */

class ActorsResource extends BaseJsonResource
{
    public function toArray($request)
    {
        if (empty($this->id) && empty($this->full_name) && empty($this->height))
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
        else 
        {
            return [
                'data' => [
                    'id' => $this->id,
                    'full_name' => $this->full_name,
                    'height' => $this->height,
                    'birthdate' => $this->birthdate,
                ],
                'errors' => [
                
                ],
                'meta' => [
    
                ]
            ];
        }
    }
}