<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SearchWord;
use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Support\Facades\DB;

class SearchWordsController extends Controller
{
    public function index(){
        $searchWord = SearchWord::first();
        $search = $this->ytApi($searchWord);
        // return view('welcome',['videos' => $search,]);
        dd($search);
        return view('welcome',['videos' => $search, 'keyWords' => $searchWord]);
    
    }
    
    public function index2(Request $req){
        $name = $req->name;
        $re = DB::table('search_words')->where('word', $name);
        $searchWord = $re->wheres[0]['value'];
        $search = $this->ytApi($searchWord);
        return view('welcome',['videos' => $search, 'keyWords' => $searchWord]);
        
    }
    
    public function show(Request $request){
        $id = $request->id;
        $video = Youtube::getVideoInfo($id);
        return view('movie',['video' => $video]);
    }
    
    /*
    *APIを使ってYouTubeより動画を取得する
    *引数 $searchWord 検索ワード
    *return $search   APIで取得した動画（オブジェクト）
    */
    private function ytApi($searchWord){
        $params = [
            'q'             => $searchWord,
            'type'          => 'video',
            'part'          => 'id, snippet',
            'maxResults'    => 8                        //動画取得件数
        ];
        $pageTokens = [];
        $search = Youtube::paginateResults($params, null);
        $pageTokens[] = $search['info']['nextPageToken'];
        $search = Youtube::paginateResults($params, $pageTokens[0]);
        return $search;
    }
    
}
