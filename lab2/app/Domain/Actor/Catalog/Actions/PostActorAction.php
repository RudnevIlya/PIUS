<?php

namespace App\Domain\Actor\Catalog\Actions;

use App\Domain\Actor\Catalog\Models\Actor;
use App\Http\v1\Modules\Actors\Requests\PatchActorRequest;

class PostActorAction
{
    public function execute(array $fields):Actor
    {
        $actor = Actor::create($fields);
        return $actor;
    }
}
