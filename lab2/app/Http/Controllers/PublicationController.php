<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Publication;

class PublicationController extends Controller
{
    /**
     * Показать всех пользователей приложения.
     *
     * @return \Illuminate\Http\Response
     */
    public function showWithFilter(Request $request)
    {
        $titleFilter = $request->input('titleFilter');
        $tagFilter = $request->input('tagFilter');
        $tokenFilter = $request->input('codeFilter');
        if($tagFilter!="" || $titleFilter!="" || $tokenFilter!="") {
            $publication = Publication::where('publication.title', 'like', '%' . $titleFilter . '%') 
            ->where('publication.token', 'like', '%' . $tokenFilter . '%')   
            ->whereHas('tag', function ($tags) use ($tagFilter) { $tags->where('title', 'like', '%' . $tagFilter . '%');})
            ->paginate(2);
            $publication->appends(['tagFilter' => $tagFilter]);
            $publication->appends(['codeFilter' => $tokenFilter]);
            $publication->appends(['titleFilter' => $titleFilter]);
        }
        else{
            $publication = Publication::paginate(15);
        }

        return view('publication')->with('publications', $publication);
    }

    public function showWithtoken($token) {
        $curPost = Publication::where('token', '=', $token)->firstOrFail();
        $tags = $curPost->tag()->orderBy('title', 'asc')->get();
        return view('tag')->with('curPost', $curPost)->with('tags', $tags);
    }
}
