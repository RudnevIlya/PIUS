<?php

namespace App\Domain\Film\Catalog\Actions;

use App\Http\v1\Modules\Films\Controllers\FilmsController;
use App\Domain\Film\Catalog\Models\Film;
use App\Http\v1\Modules\Films\Requests\PatchFilmRequest;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteFilmAction
{
    public function execute(int $id): Film
    {
        $film = Film::findOrFail($id);
        $film->delete();
        return $film;
    }
}
