<?php

namespace App\Domain\Actor\Catalog\Actions;
use App\Domain\Actor\Catalog\Models\Actor;
use App\Http\ApiV1\Modules\Actors\Requests\PatchActorRequest;

class GetActorAction
{
    public function execute(int $id):Actor
    {
        $actor = Actor::findOrFail($id);
        return $actor;
    }
}