<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SearchWord;
use Alaouy\Youtube\Facades\Youtube;

class SearchWordsController extends Controller
{
    public function index(){
        $searchWord = SearchWord::first();
        $params = [
            'q'             => $searchWord,
            'type'          => 'video',
            'part'          => 'id, snippet',
            'maxResults'    => 8
        ];
        $pageTokens = [];
        $search = Youtube::paginateResults($params, null);
        $pageTokens[] = $search['info']['nextPageToken'];
        $search = Youtube::paginateResults($params, $pageTokens[0]);
        
       /*
        // $videoList = Youtube::searchVideos($searchWord);
        // $videoList = Youtube::searchVideos($searchWord);
        
        // $results = Youtube::search($searchWord);
         dd($results);
        */
        return view('welcome',['videos' => $search,]);
    }
}
