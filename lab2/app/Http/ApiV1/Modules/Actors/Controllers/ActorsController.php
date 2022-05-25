<?php

namespace App\Http\ApiV1\Modules\Actors\Controllers;

use App\Http\ApiV1\Modules\Actors\Controllers\Controller;
use App\Domain\Actor\Catalog\Actions\PatchActorAction;
use App\Domain\Actor\Catalog\Actions\PostActorAction;
use App\Domain\Actor\Catalog\Actions\PutActorAction;
use App\Domain\Actor\Catalog\Actions\DeleteActorAction;
use App\Domain\Actor\Catalog\Actions\GetActorAction;
use App\Http\ApiV1\Modules\Actors\Queries\UsersQuery;
use App\Http\ApiV1\Modules\Actors\Requests\CreateActorRequest;
use App\Http\ApiV1\Modules\Actors\Requests\PatchActorRequest;
use App\Http\ApiV1\Modules\Actors\Requests\GetActorRequest;
use App\Http\ApiV1\Modules\Actors\Requests\PutActorRequest;
use App\Http\ApiV1\Modules\Actors\Requests\PostActorRequest;
use App\Http\ApiV1\Modules\Actors\Resources\ActorsResource;
use Illuminate\Http\Request;
use App\Domain\Actor\Catalog\Models\Actor;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ActorsController extends Controller
{
    public function patch(int $id, PatchActorRequest $request, PatchActorAction $action) {
        $actor = new ActorsResource(
            $action->execute($id, $request->validated())
        );

        return response()->json($actor, 200);
    }

    public function get(int $id, GetActorAction $action) {
        $actor = new ActorsResource($action->execute($id));

        return response()->json($actor, 200);
    }

    public function post(PostActorRequest $request, PostActorAction $action) {
        $actor = new ActorsResource(
            $action->execute($request->validated())
        );

        return response()->json($actor, 201);
    }

    public function delete(int $id, DeleteActorAction $action)
    {
        $actor = new ActorsResource($action->execute($id));
        return response()->json($actor, 200);
    }

    public function put(int $id, PutActorRequest $request, PutActorAction $action) {
        $actor = new ActorsResource(
            $action->execute($id, $request->validated())
        );

        return response()->json($actor, 200);
    }
}