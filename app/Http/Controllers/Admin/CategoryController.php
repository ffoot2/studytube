<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SearchWord;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchWords = SearchWord::all();
        return view('admin.admin',['$searchWords' => $searchWords]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $searchWord = new SearchWord;
        return view('admin.create',[
            'searchWord' => $searchWord,
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $this->validate($req,[
            'word' => 'required',
            'sort' => 'required|integer'
        ]);
        $searchWord = new SearchWord;
        $searchWord->word = $req->word;
        $searchWord->sort = $req->sort;
        $searchWord->save();
        
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    public function edit(Request $req)
    {
        $id = $req->id;
        $searchWord = SearchWord::find($id);
        return view('admin.edit', [
            'searchWord' => $searchWord,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'word' => 'required',
            'sort' => 'required|integer'
        ]);
        $searchWord = SearchWord::find($id);
        $searchWord->word = $request->word;
        $searchWord->sort = $request->sort;
        
        $searchWord->save();

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $message = SearchWord::find($id);
        $message->delete();

        return redirect('/admin');
    }
}
