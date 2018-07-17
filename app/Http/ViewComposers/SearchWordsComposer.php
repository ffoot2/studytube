<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Auth\Guard;
use App\SearchWord;

class SearchWordsComposer {
    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $searchWord = SearchWord::all();
        // dd($searchWord);
        // dd($searchWord[0]['word']);
        
        $view->with('searchWords', $searchWord);
    }
}