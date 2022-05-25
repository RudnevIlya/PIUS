<?php

namespace App\Domain\Cast\Catalog\Actions;

use App\Http\ApiV1\Modules\Casts\Controllers\CastsController;
use App\Domain\Cast\Catalog\Models\Cast;
use App\Http\ApiV1\Modules\Casts\Requests\PatchCastRequest;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteCastAction
{
    public function execute(int $id):Cast
    {
        $cast = Cast::findOrFail($id);
        $cast->delete();
        return $cast;
    }
}
