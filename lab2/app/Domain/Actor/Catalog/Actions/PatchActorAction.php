<?php

namespace App\Domain\Actor\Catalog\Actions;

use App\Http\ApiV1\Modules\Actors\Controllers\ActorsController;
use App\Domain\Actor\Catalog\Models\Actor;
use App\Http\ApiV1\Modules\Actors\Requests\PatchActorRequest;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class PatchActorAction
{
    public function execute(int $id, array $fields): Actor
    {
        $actor = Actor::findOrFail($id);
        $actor->update($fields);
        
        return $actor;
    }
}
