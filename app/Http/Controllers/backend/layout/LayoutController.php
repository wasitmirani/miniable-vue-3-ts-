<?php

namespace App\Http\Controllers\backend\layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayoutController extends Controller
{
    //
    public function getSideBarMenu(Request $request){
        // Sidebar Menu helper funtction load menu for backend
        $sidebar_menu=sideBarMenu();

        return response()->json(['sidebar_menu'=>$sidebar_menu]);
    }
}
