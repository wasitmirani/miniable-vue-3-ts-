<?php

namespace App\Http\Controllers\backend\api\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    private $user;
    public function __construct(){
        $this->user =new User();
    }
    public function index(Request $request){

        $users=$this->user->getUsers($request);
        return response()->json(['users'=>$users]);
    }
}
