<?php

namespace App\Domain\Film\Catalog\Actions;

use App\Http\v1\Modules\Films\Controllers\FilmsController;
use App\Domain\Film\Catalog\Models\Film;
use App\Http\v1\Modules\Films\Requests\PatchFilmRequest;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class PutFilmAction
{
    public function execute(int $id, array $fields): Film
    {
        $film = Film::findOrFail($id);
        $film->update($fields);
        return $film;
    }
}
