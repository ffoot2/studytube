<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SearchWord;
use Alaouy\Youtube\Facades\Youtube;
use Illuminate\Support\Facades\DB;

class SearchWordsController extends Controller
{
    public function index(){
        // トップページ差し替えにより下記ソースを削除
        /*
        $searchWord = SearchWord::first();
        $search = $this->useAPIfromYotube($searchWord['word']);
        return view('welcome',['videos' => $search, 'keyWords' => $searchWord]);
        */
        $searchWord = SearchWord::all();
        
        return view('top', ['categories' => $searchWord]);
        
    }
    
    public function onclickSearchWord(Request $req){
        $name = $req->name;
        $re = DB::table('search_words')->where('word', $name);
        $searchWord = $re->wheres[0]['value'];
        $search = $this->useAPIfromYotube($searchWord);
        return view('welcome',['videos' => $search, 'keyWords' => $searchWord]);
        
    }
    
    public function showMovie(Request $request){
        $id = $request->id;
        $video = Youtube::getVideoInfo($id);
        return view('movie',['video' => $video]);
    }
    
    /*
    *APIを使ってYouTubeより動画を取得する
    *@param     $searchWord 検索ワード
    *@return    $search     APIで取得した動画（オブジェクト）
    */
    private function useAPIfromYotube($searchWord){
        $params = [
            'q'                 => $searchWord . '入門',
            'type'              => 'video',
            'part'              => 'id, snippet',
            'regionCode'        => 'jp',
            'relevanceLanguage' => 'JA',
            // 'location'          => 38.258595, 137.6850225,
            // 'locationRadius'    => '000km',
            'maxResults'    => 8                        //動画取得件数
        ];
        $pageTokens = [];
        $search = Youtube::paginateResults($params, null);
        $pageTokens[] = $search['info']['nextPageToken'];
        $search = Youtube::paginateResults($params, $pageTokens[0]);
        return $search;
    }
    
}
