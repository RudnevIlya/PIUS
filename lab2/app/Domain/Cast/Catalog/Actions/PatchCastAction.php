<?php

namespace App\Domain\Cast\Catalog\Actions;

use App\Http\ApiV1\Modules\Casts\Controllers\CastsController;
use App\Domain\Cast\Catalog\Models\Cast;
use App\Http\ApiV1\Modules\Casts\Requests\PatchCastRequest;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class PatchCastAction
{
    public function execute(int $id, array $fields): Cast
    {
        $cast = Cast::findOrFail($id);
        $cast->update($fields);
        return $cast;
    }
}
