<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateForm;
use Auth;

use App\SearchWord;

class ProfileController extends Controller
{
    public function editProfile(){
        // dd(Auth::user());
        $name = Auth::user()["name"];
        $id = Auth::user()["id"];
        
        $searchWords = SearchWord::all();
        // dd($searchWords);
        
        return view('profile',['name' => $name, 'id' => $id, 'searchWords' => $searchWords]);
    }
    
    public function updateProfile(ProfileUpdateForm $request)
    {
    
        return redirect()->back();
    }
}
