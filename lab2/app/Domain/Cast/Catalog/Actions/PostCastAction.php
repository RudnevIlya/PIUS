<?php

namespace App\Domain\Cast\Catalog\Actions;

use App\Domain\Cast\Catalog\Models\Cast;
use App\Http\ApiV1\Modules\Casts\Requests\PatchCastRequest;

class PostCastAction
{
    public function execute(array $fields):Cast
    {
        $cast = Cast::create($fields);
        return $cast;
    }
}
