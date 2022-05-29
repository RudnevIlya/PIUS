<?php

namespace App\Http\v1\Modules\Films\Resources;

use App\Http\v1\Modules\Actors\Resources\BaseJsonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\v1\Modules\Films\Controllers\FilmsController;
use App\Http\v1\Modules\Actors\Controllers\ActorsController;
use App\Http\v1\Modules\Actors\Controllers\EmptyResourceController;

/** @mixin \App\Domain\Films\Catalog\Models\Film */
class FilmsResource extends BaseJsonResource
{
    public function toArray($request)
    {
        if (empty($this->id) && empty($this->title) && empty($this->duration) && empty($this->premiere_date))
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
                    'title' => $this->title,
                    'rate' => $this->rate,
                    'duration' => $this->duration,
                    'premiere_date' => $this->premiere_date,
                ],
                'errors' => [
                
                ],
                'meta' => [
    
                ]
            ];
        }
    }
}