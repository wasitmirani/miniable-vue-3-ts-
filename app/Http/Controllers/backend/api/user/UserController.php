<?php

namespace App\Http\Controllers\backend\api\user;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

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


    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['string',  'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user_name=!empty($request->username) ? $request->username  : strtolower(trim( $request->name)).rand(10,10000);

        $user =  $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'username'=>$user_name,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return response()->json(['user' => $user,'message' =>'User has been registration successfuly'], 200);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,id,'.$id],
            'username' => ['max:255', 'unique:users,id,'.$id],
        ]);
        if(!empty($request->password)){
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $user = User::find($id);
            $user->password = Hash::make($request->password);
        }
        $user_name=!empty($request->username) ? str_replace(' ', '',$request->username)  : str_replace(' ', '',strtolower($request->name)).rand(10,10000);
        $update_user=User::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$user_name,
        ]);
        return response()->json(['user' => $update_user,'message' =>'user has been updated successfully'], 200);
    }

    public function destroy($id)
    {

        $user=User::destroy($id);
        if($user)
          return response()->json(['message' => 'user has been destroyed successfully'], 200);
        else
            return response()->json(['message' => 'user has not been not found'], 400);
    }

}
