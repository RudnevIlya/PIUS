<?php

namespace App\Http\v1\Modules\Films\Controllers;

use App\Http\v1\Modules\Actors\Controllers\Controller;
use App\Domain\Film\Catalog\Actions\PatchFilmAction;
use App\Domain\Film\Catalog\Actions\PostFilmAction;
use App\Domain\Film\Catalog\Actions\PutFilmAction;
use App\Domain\Film\Catalog\Actions\DeleteFilmAction;
use App\Domain\Film\Catalog\Actions\GetFilmAction;
use App\Http\v1\Modules\Films\Queries\UsersQuery;
use App\Http\v1\Modules\Films\Requests\CreateFilmRequest;
use App\Http\v1\Modules\Films\Requests\PatchFilmRequest;
use App\Http\v1\Modules\Films\Requests\GetFilmRequest;
use App\Http\v1\Modules\Films\Requests\PutFilmRequest;
use App\Http\v1\Modules\Films\Requests\PostFilmRequest;
use App\Http\v1\Modules\Films\Resources\FilmsResource;
use Illuminate\Http\Request;
use App\Domain\Film\Catalog\Models\Film;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class FilmsController extends Controller
{
    public function patch(int $id, PatchFilmRequest $request, PatchFilmAction $action) {
        $film = new FilmsResource(
            $action->execute($id, $request->validated())
        );

        return response()->json($film, 200);
    }

    public function get(int $id, GetFilmAction $action) {
        $film = new FilmsResource($action->execute($id));

        return response()->json($film, 200);
    }

    public function post(PostFilmRequest $request, PostFilmAction $action) {
        $film = new FilmsResource(
            $action->execute($request->validated())
        );

        return response()->json($film, 201);
    }

    public function delete(int $id, DeleteFilmAction $action)
    {
        $film = new FilmsResource($action->execute($id));
        return response()->json($film, 200);
    }

    public function put(int $id, PutFilmRequest $request, PutFilmAction $action) {
        $film = new FilmsResource(
            $action->execute($id, $request->validated())
        );

        return response()->json($film, 200);
    }
}