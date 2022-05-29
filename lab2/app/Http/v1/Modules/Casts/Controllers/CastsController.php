<?php

namespace App\Http\v1\Modules\Casts\Controllers;

use App\Http\v1\Modules\Actors\Controllers\Controller;
use App\Domain\Cast\Catalog\Actions\PatchCastAction;
use App\Domain\Cast\Catalog\Actions\PostCastAction;
use App\Domain\Cast\Catalog\Actions\PutCastAction;
use App\Domain\Cast\Catalog\Actions\DeleteCastAction;
use App\Domain\Cast\Catalog\Actions\GetCastAction;
use App\Http\v1\Modules\Casts\Queries\UsersQuery;
use App\Http\v1\Modules\Casts\Requests\CreateCastRequest;
use App\Http\v1\Modules\Casts\Requests\PatchCastRequest;
use App\Http\v1\Modules\Casts\Requests\GetCastRequest;
use App\Http\v1\Modules\Casts\Requests\PutCastRequest;
use App\Http\v1\Modules\Casts\Requests\PostCastRequest;
use App\Http\v1\Modules\Casts\Resources\CastsResource;
use Illuminate\Http\Request;
use App\Domain\Cast\Catalog\Models\Cast;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class CastsController extends Controller
{
    public function patch(int $id, PatchCastRequest $request, PatchCastAction $action) {
        $cast = new CastsResource(
            $action->execute($id, $request->validated())
        );

        return response()->json($cast, 200);
    }

    public function get(int $id, GetCastAction $action) {
        $cast = new CastsResource($action->execute($id));

        return response()->json($cast, 200);
    }

    public function post(PostCastRequest $request, PostCastAction $action) {
        $cast = new CastsResource(
            $action->execute($request->validated())
        );

        return response()->json($cast, 201);
    }

    public function delete(int $id, DeleteCastAction $action)
    {
        $cast = new CastsResource($action->execute($id));
        return response()->json($cast, 200);
    }

    public function put(int $id, PutCastRequest $request, PutCastAction $action) {
        $cast = new CastsResource(
            $action->execute($id, $request->validated())
        );

        return response()->json($cast, 200);
    }
}