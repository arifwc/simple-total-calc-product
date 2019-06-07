<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use Auth;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function liatMenu(){
        $menu = Menu::all();
        return view('menuView',compact('menu'));
    }
}
