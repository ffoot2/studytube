<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin.admin');
    }
    
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
}
