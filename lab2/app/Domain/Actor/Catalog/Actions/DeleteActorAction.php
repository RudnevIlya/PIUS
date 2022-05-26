<?php

namespace App\Domain\Actor\Catalog\Actions;

use App\Http\ApiV1\Modules\Actors\Controllers\ActorsController;
use App\Domain\Actor\Catalog\Models\Actor;
use App\Http\ApiV1\Modules\Actors\Requests\PatchActorRequest;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteActorAction
{
    public function execute(int $id):Actor
    {
        $actor = Actor::findOrFail($id);
        $actor->delete();

        return $actor;
    }
}
