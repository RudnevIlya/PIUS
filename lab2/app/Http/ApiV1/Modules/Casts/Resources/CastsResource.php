<?php

namespace App\Http\ApiV1\Modules\Casts\Resources;

use App\Http\ApiV1\Modules\Actors\Resources\BaseJsonResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\ApiV1\Modules\Casts\Controllers\CastsController;
use App\Http\ApiV1\Modules\Actors\Controllers\ActorsController;
use App\Http\ApiV1\Modules\Actors\Controllers\EmptyResourceController;

/** @mixin \App\Domain\Casts\Catalog\Models\Cast*/
//protected $fillable = ['film_id', 'actor_id','role'];

class CastsResource extends BaseJsonResource
{
    public function toArray($request)
    {
        if (empty($this->id) && empty($this->film_id) && empty($this->actor_id))
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
                    'id_film' => $this->id_film,
                    'id_actor' => $this->id_actor,
                    'role' => $this->role,
                ],
                'errors' => [
                
                ],
                'meta' => [
    
                ]
            ];
        }
    }
}