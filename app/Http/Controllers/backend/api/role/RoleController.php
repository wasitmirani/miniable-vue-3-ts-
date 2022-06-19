<?php

namespace App\Http\Controllers\backend\api\role;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //

    public function index(Request $request){
        $q=request('query');
        $roles=Role::latest()
        ->where('name', 'like', '%' . $q . '%')
        ->paginate((int)env('PER_PAGE'));
        $user= new User();
        $users=$user->getUsers($request,false);
        return response()->json(['roles'=>$roles,'users'=>$users]);
    }
}
