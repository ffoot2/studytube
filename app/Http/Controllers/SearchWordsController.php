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
        
        // dd($search);
        // return view('welcome',['videos' => $search,]);
        return view('welcome',['videos' => $search, 'keyWords' => $searchWord]);
    
    }
    
    public function show(){
        return view('movie');
    }
}
