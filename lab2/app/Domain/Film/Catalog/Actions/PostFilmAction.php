<?php

namespace App\Domain\Film\Catalog\Actions;

use App\Domain\Film\Catalog\Models\Film;
use App\Http\ApiV1\Modules\Films\Requests\PatchFilmRequest;

class PostFilmAction
{
    public function execute(array $fields): Film
    {
        $film = Film::create($fields);
        return $film;
    }
}
