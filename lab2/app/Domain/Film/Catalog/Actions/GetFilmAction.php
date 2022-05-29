<?php

namespace App\Domain\Film\Catalog\Actions;
use App\Domain\Film\Catalog\Models\Film;
use App\Http\v1\Modules\Films\Requests\PatchFilmRequest;

class GetFilmAction
{
    public function execute(int $id): Film
    {
        $film = Film::findOrFail($id);
        return $film;
    }
}