<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SearchWord;
use Auth;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $searchWords = SearchWord::all();
            return view('admin.admin',['$searchWords' => $searchWords]);
        }else{
            return redirect('/admin/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            $searchWord = new SearchWord;
            return view('admin.create',[
                'searchWord' => $searchWord,
            ]);
        }else{
            return redirect('/admin/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        if(Auth::check()){
            $this->validate($req,[
                'word' => 'required',
                'sort' => 'required|integer'
            ]);
            $searchWord = new SearchWord;
            $searchWord->word = $req->word;
            $searchWord->sort = $req->sort;
            $searchWord->save();
            
            return redirect('/admin');
        }else{
            return redirect('/admin/login');
        }
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
        if(Auth::check()){
            $id = $req->id;
            $searchWord = SearchWord::find($id);
            return view('admin.edit', [
                'searchWord' => $searchWord,
            ]);
        }else{
            return redirect('/admin/login');
        }
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
        if(Auth::check()){
            $this->validate($request,[
                'word' => 'required',
                'sort' => 'required|integer'
            ]);
            $searchWord = SearchWord::find($id);
            $searchWord->word = $request->word;
            $searchWord->sort = $request->sort;
            
            $searchWord->save();
    
            return redirect('/admin');
        }else{
            return redirect('/admin/login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(Auth::check()){
            $id = $request->id;
            $message = SearchWord::find($id);
            $message->delete();
    
            return redirect('/admin');
        }else{
            return redirect('/admin/login');
        }
    }
}
