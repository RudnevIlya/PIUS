<?php

namespace App\Domain\Cast\Catalog\Actions;
use App\Domain\Cast\Catalog\Models\Cast;
use App\Http\ApiV1\Modules\Casts\Requests\PatchCastRequest;

class GetCastAction
{
    public function execute(int $id):Cast
    {
        $cast = Cast::findOrFail($id);
        return $cast;
    }
}